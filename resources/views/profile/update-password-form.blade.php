
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
    <h2 class="h4 mb-2"><i class="bi bi-key me-2"></i>Update Password</h2>
    <p class="mb-3 text-muted small">Ensure your account is using a long, random password to stay secure.</p>
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
