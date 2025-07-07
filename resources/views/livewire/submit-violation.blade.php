<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="student" class="form-label">Select Student</label>
            <select id="student" wire:model="student_id" class="form-control">
                <option value="">-- Select Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Violation Description</label>
            <textarea id="description" wire:model="description" class="form-control" rows="4"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit Violation</button>
    </form>
</div>
