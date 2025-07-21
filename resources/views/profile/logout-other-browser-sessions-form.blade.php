<style>
    :root {
        --main-blue: #1d3557;
        --main-red: #e63946;
        --main-white: #fff;
        --main-light-blue: #e3eafc;
        --main-light-red: #fde7eb;
        --main-gray: #f1f3f5;
        --main-dark: #22223b;
    }
    .profile-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .profile-card h2 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .profile-card .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .profile-card .form-control, .profile-card .form-select {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
    }
    .profile-card .form-control:focus, .profile-card .form-select:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
    }
</style>

<div class="profile-card mt-5 mb-5">
    <h2 class="h4 mb-2"><i class="bi bi-laptop me-2"></i>Browser Sessions</h2>
    <p class="mb-3 text-muted small">Manage and log out your active sessions on other browsers and devices.</p>
        <div class="mb-3 text-muted small">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>
        @if (count($this->sessions) > 0)
            <div class="mb-4">
                @foreach ($this->sessions as $session)
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            @if ($session->agent->isDesktop())
                                <i class="bi bi-laptop fs-4 text-secondary"></i>
                            @else
                                <i class="bi bi-phone fs-4 text-secondary"></i>
                            @endif
                        </div>
                        <div class="ms-3">
                            <div class="fw-semibold small">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                            </div>
                            <div class="text-muted small">
                                {{ $session->ip_address }},
                                @if ($session->is_current_device)
                                    <span class="text-success fw-semibold">{{ __('This device') }}</span>
                                @else
                                    {{ __('Last active') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="d-flex align-items-center gap-2 mt-3">
            <button type="button" class="btn btn-warning fw-semibold" wire:click="confirmLogout" wire:loading.attr="disabled">
                <i class="bi bi-box-arrow-right me-1"></i>{{ __('Log Out Other Browser Sessions') }}
            </button>
            <x-action-message class="ms-3" on="loggedOut">
                {{ __('Done.') }}
            </x-action-message>
        </div>
        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __('Log Out Other Browser Sessions') }}
            </x-slot>
            <x-slot name="content">
                {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input type="password" class="form-control w-50 d-inline-block" autocomplete="current-password" placeholder="{{ __('Password') }}" x-ref="password" wire:model="password" wire:keydown.enter="logoutOtherBrowserSessions" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </button>
                <button type="button" class="btn btn-warning ms-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    <i class="bi bi-box-arrow-right me-1"></i>{{ __('Log Out Other Browser Sessions') }}
                </button>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
