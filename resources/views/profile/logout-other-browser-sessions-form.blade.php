<div class="card shadow-sm border mb-4 bg-white" style="max-width: 650px; margin: 0 auto;">
    <div class="card-header bg-white border-bottom pb-2">
        <h5 class="mb-1 fw-semibold text-primary"><i class="bi bi-laptop me-2"></i>Browser Sessions</h5>
        <p class="mb-0 text-muted small">Manage and log out your active sessions on other browsers and devices.</p>
    </div>
    <div class="card-body p-4">
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
