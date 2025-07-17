<?php
namespace App\Http\Livewire\Profile;

use App\Models\SystemLog;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\ConfirmTwoFactorAuthentication;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Jetstream\ConfirmsPasswords;
use Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm as BaseForm;
use Illuminate\Support\Facades\Session;

class TwoFactorAuthenticationForm extends BaseForm
{
    use ConfirmsPasswords;

    public $enabled;
    public $showingQrCode = false;
    public $showingConfirmation = false;
    public $showingRecoveryCodes = false;
    public $code = '';

    public function mount()
    {
        $this->enabled = ! is_null($this->user->two_factor_secret);
    }

    public function enableTwoFactorAuthentication(EnableTwoFactorAuthentication $enable)
    {
        $this->ensurePasswordIsConfirmed();

        if ($this->enabled) {
            Session::flash('message', 'Two-factor authentication is already enabled.');
            return;
        }

        try {
            $enable($this->user);
            $this->enabled = true;
            $this->showingQrCode = true;
            $this->showingConfirmation = true;
            $this->showingRecoveryCodes = false;
            Session::flash('message', 'Two-factor authentication enabled.');
            // Log 2FA enable
            SystemLog::create([
                'user_id' => $this->user->id,
                'name' => $this->user->name ?? ($this->user->fname . ' ' . $this->user->lname),
                'action' => 'enabled two-factor authentication',
            ]);
        } catch (\Exception $e) {
            Session::flash('error', 'Failed to enable two-factor authentication.');
        }
    }

    public function confirmTwoFactorAuthentication(ConfirmTwoFactorAuthentication $confirm)
    {
        $this->ensurePasswordIsConfirmed();
        try {
            $confirm($this->user, $this->code);
            $this->showingConfirmation = false;
            $this->showingRecoveryCodes = true;
            Session::flash('message', 'Two-factor authentication confirmed.');
            // Log 2FA confirm
            SystemLog::create([
                'user_id' => $this->user->id,
                'name' => $this->user->name ?? ($this->user->fname . ' ' . $this->user->lname),
                'action' => 'confirmed two-factor authentication',
            ]);
        } catch (\Exception $e) {
            Session::flash('error', 'Invalid authentication code.');
        }
    }

    public function showRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();
        $this->showingRecoveryCodes = true;
    }

    public function regenerateRecoveryCodes(GenerateNewRecoveryCodes $generate)
    {
        $this->ensurePasswordIsConfirmed();
        try {
            $generate($this->user);
            $this->showingRecoveryCodes = true;
            Session::flash('message', 'Recovery codes regenerated.');
            // Log 2FA recovery code regeneration
            SystemLog::create([
                'user_id' => $this->user->id,
                'name' => $this->user->name ?? ($this->user->fname . ' ' . $this->user->lname),
                'action' => 'regenerated two-factor recovery codes',
            ]);
        } catch (\Exception $e) {
            Session::flash('error', 'Failed to regenerate recovery codes.');
        }
    }

    public function disableTwoFactorAuthentication(DisableTwoFactorAuthentication $disable)
    {
        $this->ensurePasswordIsConfirmed();
        try {
            $disable($this->user);
            $this->enabled = false;
            $this->showingQrCode = false;
            $this->showingRecoveryCodes = false;
            $this->showingConfirmation = false;
            Session::flash('message', 'Two-factor authentication disabled.');
            // Log 2FA disable
            SystemLog::create([
                'user_id' => $this->user->id,
                'name' => $this->user->name ?? ($this->user->fname . ' ' . $this->user->lname),
                'action' => 'disabled two-factor authentication',
            ]);
        } catch (\Exception $e) {
            Session::flash('error', 'Failed to disable two-factor authentication.');
        }
    }

    public function render()
    {
        return view('profile.two-factor-authentication-form');
    }
}
