
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
    <h2 class="h4 mb-2" style="color: var(--main-red)"><i class="bi bi-trash me-2"></i>Delete Account</h2>
    <p class="mb-3 text-muted small">Permanently delete your account.</p>
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
