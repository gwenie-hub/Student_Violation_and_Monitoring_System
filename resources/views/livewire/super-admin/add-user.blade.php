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
    .add-user-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .add-user-card h1 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .add-user-card .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .add-user-card .form-control,
    .add-user-card .form-select {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
    }
    .add-user-card .form-control:focus,
    .add-user-card .form-select:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.13);
    }
    .add-user-card .btn-primary {
        background: var(--main-blue);
        border-color: var(--main-blue);
        font-weight: 600;
        letter-spacing: 0.03em;
    }
    .add-user-card .btn-primary:hover {
        background: var(--main-red);
        border-color: var(--main-red);
    }
    .add-user-card .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border: 1.5px solid var(--main-blue);
        font-weight: 600;
    }
    .add-user-card .alert-danger {
        background: var(--main-light-red);
        color: var(--main-red);
        border: 1.5px solid var(--main-red);
        font-weight: 600;
    }
    .add-user-card .alert-danger ul {
        margin: 0;
        padding-left: 1.25rem;
    }
    .add-user-card .alert-danger li {
        list-style-type: disc;
    }
</style>

@if (session()->has('success'))
    <div class="alert alert-success flash-message" id="flashSuccess">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger flash-message" id="flashError">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger flash-message" id="flashErrorList">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="add-user-card mt-5 mb-5">
    <h1 class="h3 mb-4">➕ Add User</h1>

    <form wire:submit.prevent="addUser" id="addUserForm" novalidate>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" wire:model.defer="email" name="email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" wire:model.defer="role" name="role" required>
                    <option value="">-- Select Role --</option>
                    @foreach ($availableRoles as $availableRole)
                        <option value="{{ $availableRole }}">{{ ucfirst(str_replace('_', ' ', $availableRole)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" wire:model.defer="fname" name="fname" required autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="mname" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="mname" wire:model.defer="mname" name="mname" autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" wire:model.defer="lname" name="lname" required autocomplete="off">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary" id="addUserBtn" wire:loading.attr="disabled">
                <span id="addUserBtnText">Add User</span>
                <span id="addUserBtnSpinner" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                <span id="addUserBtnLoading" class="d-none">Loading...</span>
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('addUserForm');
            const btn = document.getElementById('addUserBtn');
            const btnText = document.getElementById('addUserBtnText');
            const btnSpinner = document.getElementById('addUserBtnSpinner');
            const btnLoading = document.getElementById('addUserBtnLoading');

            // Hide spinner and loading by default
            btnSpinner.classList.add('d-none');
            btnLoading.classList.add('d-none');

            // Flash message auto-hide
            ['flashSuccess', 'flashError', 'flashErrorList'].forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    setTimeout(() => {
                        el.style.transition = 'opacity 0.5s';
                        el.style.opacity = 0;
                        setTimeout(() => el.remove(), 500);
                    }, 3500);
                }
            });

            form.addEventListener('submit', function (e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    form.classList.add('was-validated');
                    return false;
                }
                btn.disabled = true;
                btnSpinner.classList.remove('d-none');
                btnLoading.classList.remove('d-none');
                btnText.classList.add('d-none');
            });
        });
    </script>
</div>
