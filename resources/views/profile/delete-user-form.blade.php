
<div class="card shadow-sm border mb-4 bg-white" style="max-width: 650px; margin: 0 auto;">
    <div class="card-header bg-white border-bottom pb-2">
        <h5 class="mb-1 fw-semibold text-danger"><i class="bi bi-trash me-2"></i>Delete Account</h5>
        <p class="mb-0 text-muted small">Permanently delete your account.</p>
    </div>
    <div class="card-body p-4">
        <div class="mb-3 text-muted small">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>
        <div class="mb-4">
            <button type="button" class="btn btn-danger fw-semibold" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                <i class="bi bi-trash me-1"></i>{{ __('Delete Account') }}
            </button>
        </div>
        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>
            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input type="password" class="form-control w-50 d-inline-block" autocomplete="current-password" placeholder="{{ __('Password') }}" x-ref="password" wire:model="password" wire:keydown.enter="deleteUser" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </button>
                <button type="button" class="btn btn-danger ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    <i class="bi bi-trash me-1"></i>{{ __('Delete Account') }}
                </button>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
