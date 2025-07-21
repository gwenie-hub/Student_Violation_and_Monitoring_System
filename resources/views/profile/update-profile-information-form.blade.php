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
    <h2 class="h4 mb-2"><i class="bi bi-person-circle me-2"></i>Profile Information</h2>
    <p class="mb-3 text-muted small">Update your account's profile information and email address.</p>
    <form wire:submit.prevent="updateProfileInformation">
        <div class="row g-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="col-12 d-flex flex-column align-items-center mb-3">
                        <input type="file" id="photo" class="d-none"
                               wire:model.live="photo"
                               x-ref="photo"
                               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                               " />
                        <label for="photo" class="form-label mb-1">Photo</label>
                        <div class="mb-2" x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle border border-2 border-primary shadow-sm" style="width: 90px; height: 90px; object-fit: cover;">
                        </div>
                        <div class="mb-2" x-show="photoPreview" style="display: none;">
                            <span class="d-block rounded-circle bg-cover bg-no-repeat bg-center border border-2 border-primary shadow-sm" style="width: 90px; height: 90px;" x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-primary btn-sm me-2" x-on:click.prevent="$refs.photo.click()">
                                <i class="bi bi-upload me-1"></i>Select A New Photo
                            </button>
                            @if ($this->user->profile_photo_path)
                                <button type="button" class="btn btn-outline-danger btn-sm" wire:click="deleteProfilePhoto">
                                    <i class="bi bi-trash me-1"></i>Remove Photo
                                </button>
                            @endif
                        </div>
                        <x-input-error for="photo" class="mt-2" />
                    </div>
                @endif
                <div class="col-md-4">
                    <label for="fname" class="form-label">First Name</label>
                    <input id="fname" type="text" class="form-control rounded-3 shadow-sm" wire:model.defer="state.fname" required>
                    <x-input-error for="state.fname" class="mt-2" />
                </div>
                <div class="col-md-4">
                    <label for="mname" class="form-label">Middle Name</label>
                    <input id="mname" type="text" class="form-control rounded-3 shadow-sm" wire:model.defer="state.mname">
                    <x-input-error for="state.mname" class="mt-2" />
                </div>
                <div class="col-md-4">
                    <label for="lname" class="form-label">Last Name</label>
                    <input id="lname" type="text" class="form-control rounded-3 shadow-sm" wire:model.defer="state.lname" required>
                    <x-input-error for="state.lname" class="mt-2" />
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control rounded-3 shadow-sm" wire:model="state.email" required autocomplete="username">
                    <x-input-error for="state.email" class="mt-2" />
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                        <p class="text-danger small mt-2">
                            {{ __('Your email address is unverified.') }}
                            <button type="button" class="btn btn-link p-0 align-baseline" wire:click.prevent="sendEmailVerification">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                        @if ($this->verificationLinkSent)
                            <p class="mt-2 text-success small">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center gap-2 mt-4">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <button type="submit" class="btn btn-primary px-4 fw-semibold rounded-3 shadow-sm" wire:loading.attr="disabled" wire:target="photo">
                    <i class="bi bi-save me-1"></i>Save
                </button>
            </div>
        </form>
    </div>
</div>
