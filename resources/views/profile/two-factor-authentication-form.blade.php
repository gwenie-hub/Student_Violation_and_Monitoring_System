
<div class="card shadow-sm border mb-4 bg-white" style="max-width: 650px; margin: 0 auto;">
    <div class="card-header bg-white border-bottom pb-2">
        <h5 class="mb-1 fw-semibold text-primary"><i class="bi bi-shield-lock me-2"></i>Two Factor Authentication</h5>
        <p class="mb-0 text-muted small">Add additional security to your account using two factor authentication.</p>
    </div>
    <div class="card-body p-4">
        <h6 class="fw-semibold mb-2">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Finish enabling two factor authentication.') }}
                @else
                    {{ __('You have enabled two factor authentication.') }}
                @endif
            @else
                {{ __('You have not enabled two factor authentication.') }}
            @endif
        </h6>
        <div class="mb-3 text-muted small">
            {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
        </div>
        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mb-3">
                    <div class="mb-2 fw-semibold">
                        @if ($showingConfirmation)
                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                        @else
                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                        @endif
                    </div>
                    <div class="p-2 bg-white border rounded d-inline-block">
                        {!! $this->user->twoFactorQrCodeSvg() !!}
                    </div>
                    <div class="mt-2 text-muted small">
                        <span class="fw-semibold">{{ __('Setup Key') }}:</span> {{ decrypt($this->user->two_factor_secret) }}
                    </div>
                </div>
                @if ($showingConfirmation)
                    <div class="mb-3">
                        <label for="code" class="form-label">{{ __('Code') }}</label>
                        <input id="code" type="text" name="code" class="form-control w-50" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />
                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif
            @if ($showingRecoveryCodes)
                <div class="mb-3">
                    <div class="fw-semibold mb-2">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </div>
                    <div class="row g-1 bg-light rounded p-3 font-monospace text-sm">
                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                            <div class="col-6 col-md-4">{{ $code }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <div class="d-flex flex-wrap gap-2 mt-4">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <button type="button" class="btn btn-primary" wire:loading.attr="disabled">
                        <i class="bi bi-shield-plus me-1"></i>{{ __('Enable') }}
                    </button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <button type="button" class="btn btn-outline-primary" wire:loading.attr="disabled">
                            <i class="bi bi-arrow-repeat me-1"></i>{{ __('Regenerate Recovery Codes') }}
                        </button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <button type="button" class="btn btn-success" wire:loading.attr="disabled">
                            <i class="bi bi-check2-circle me-1"></i>{{ __('Confirm') }}
                        </button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <button type="button" class="btn btn-outline-secondary" wire:loading.attr="disabled">
                            <i class="bi bi-key me-1"></i>{{ __('Show Recovery Codes') }}
                        </button>
                    </x-confirms-password>
                @endif
                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <button type="button" class="btn btn-secondary" wire:loading.attr="disabled">
                            <i class="bi bi-x-circle me-1"></i>{{ __('Cancel') }}
                        </button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <button type="button" class="btn btn-danger" wire:loading.attr="disabled">
                            <i class="bi bi-shield-x me-1"></i>{{ __('Disable') }}
                        </button>
                    </x-confirms-password>
                @endif
            @endif
        </div>
    </div>
</div>
