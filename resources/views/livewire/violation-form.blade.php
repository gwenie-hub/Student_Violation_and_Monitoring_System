<div class="container pt-1 pb-5" style="background: #f8fafc; min-height: 30vh;">
    @if (session()->has('success'))
        <div class="alert alert-success mb-4 text-center" style="font-size: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mx-auto p-4 border-0 mt-2" style="max-width: 600px; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
        <h4 class="mb-4 text-center fw-semibold" style="color: #222;">Report Student Violation</h4>
        <form wire:submit.prevent="submit" class="row g-3">
            {{-- Student ID --}}
            <div class="col-md-6">
                <label class="form-label">Student ID</label>
                <input type="number" wire:model.defer="student_id" class="form-control" required placeholder="Student ID">
                @error('student_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Last Name --}}
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" wire:model.defer="last_name" class="form-control" required placeholder="Last Name">
                @error('last_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- First Name --}}
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" wire:model.defer="first_name" class="form-control" required placeholder="First Name">
                @error('first_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Middle Name --}}
            <div class="col-md-6">
                <label class="form-label">Middle Name</label>
                <input type="text" wire:model.defer="middle_name" class="form-control" placeholder="Middle Name (optional)">
            </div>
            {{-- Course --}}
            <div class="col-md-6">
                <label class="form-label">Course</label>
                <input type="text" wire:model.defer="course" class="form-control" required placeholder="Course">
                @error('course') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Year and Section --}}
            <div class="col-md-6">
                <label class="form-label">Year and Section</label>
                <input type="text" wire:model.defer="year_section" class="form-control" required placeholder="e.g. 3A, 4B">
                @error('year_section') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Violation --}}
            <div class="col-12">
                <label class="form-label">Violation</label>
                <input type="text" wire:model.defer="violation" class="form-control" required placeholder="Describe the violation">
                @error('violation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Offense Type --}}
            <div class="col-12">
                <label class="form-label">Offense Type</label>
                <select wire:model.defer="offense_type" class="form-select" required>
                    <option value="">Select Offense Type</option>
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                </select>
                @error('offense_type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            {{-- Submit Button --}}
            <div class="col-12 text-end mt-3">
                <button type="submit"
                    class="btn btn-primary px-4"
                    style="font-weight: 500;"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Submit Violation</span>
                    <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    </div>
</div>
