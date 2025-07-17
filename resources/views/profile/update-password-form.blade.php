
<div class="card shadow border-0 mb-4" style="max-width: 500px; margin: 0 auto;">
    <div class="card-header bg-white border-bottom-0 pb-0">
        <h5 class="mb-1 fw-semibold text-primary"><i class="bi bi-key me-2"></i>Update Password</h5>
        <p class="mb-0 text-muted small">Ensure your account is using a long, random password to stay secure.</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="updatePassword">
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input id="current_password" type="password" class="form-control" wire:model="state.current_password" autocomplete="current-password">
                <x-input-error for="current_password" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input id="password" type="password" class="form-control" wire:model="state.password" autocomplete="new-password">
                <x-input-error for="password" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" wire:model="state.password_confirmation" autocomplete="new-password">
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>
            <div class="d-flex justify-content-end align-items-center gap-2">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    <i class="bi bi-save me-1"></i>Save
                </button>
            </div>
        </form>
    </div>
</div>
