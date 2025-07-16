<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Str;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\ConfirmTwoFactorAuthentication;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Jetstream\ConfirmsPasswords;
use Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm as BaseForm;

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
            return;
        }

        $enable($this->user);

        $this->enabled = true;
        $this->showingQrCode = true;
        $this->showingConfirmation = true;
        $this->showingRecoveryCodes = false;
    }

    public function confirmTwoFactorAuthentication(ConfirmTwoFactorAuthentication $confirm)
    {
        $this->ensurePasswordIsConfirmed();

        $confirm($this->user, $this->code);

        $this->showingConfirmation = false;
        $this->showingRecoveryCodes = true;
    }

    public function showRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();

        $this->showingRecoveryCodes = true;
    }

    public function regenerateRecoveryCodes(GenerateNewRecoveryCodes $generate)
    {
        $this->ensurePasswordIsConfirmed();

        $generate($this->user);

        $this->showingRecoveryCodes = true;
    }

    public function disableTwoFactorAuthentication(DisableTwoFactorAuthentication $disable)
    {
        $this->ensurePasswordIsConfirmed();

        $disable($this->user);

        $this->enabled = false;
        $this->showingQrCode = false;
        $this->showingRecoveryCodes = false;
        $this->showingConfirmation = false;
    }

    public function render()
    {
        return view('profile.two-factor-authentication-form');
    }
}
