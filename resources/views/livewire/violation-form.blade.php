<form wire:submit.prevent="submit" class="space-y-4 bg-white p-6 rounded shadow max-w-2xl mx-auto">
    {{-- Student ID --}}
    <div>
        <label class="block font-medium">Student ID</label>
        <input type="number" wire:model.defer="student_id" class="w-full border rounded px-3 py-2" required>
        @error('student_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Last Name --}}
    <div>
        <label class="block font-medium">Last Name</label>
        <input type="text" wire:model.defer="last_name" class="w-full border rounded px-3 py-2" required>
        @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- First Name --}}
    <div>
        <label class="block font-medium">First Name</label>
        <input type="text" wire:model.defer="first_name" class="w-full border rounded px-3 py-2" required>
        @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Middle Name --}}
    <div>
        <label class="block font-medium">Middle Name</label>
        <input type="text" wire:model.defer="middle_name" class="w-full border rounded px-3 py-2">
    </div>

    {{-- Course --}}
    <div>
        <label class="block font-medium">Course</label>
        <input type="text" wire:model.defer="course" class="w-full border rounded px-3 py-2" required>
        @error('course') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Year & Section --}}
    <div>
        <label class="block font-medium">Year and Section</label>
        <input type="text" wire:model.defer="year_section" class="w-full border rounded px-3 py-2" required>
        @error('year_section') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Violation --}}
    <div>
        <label class="block font-medium">Violation</label>
        <input type="text" wire:model.defer="violation" class="w-full border rounded px-3 py-2" required>
        @error('violation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Offense Type --}}
    <div>
        <label class="block font-medium">Offense Type</label>
        <select wire:model.defer="offense_type" class="w-full border rounded px-3 py-2" required>
            <option value="">Select Offense Type</option>
            <option value="Minor">Minor</option>
            <option value="Major">Major</option>
        </select>
        @error('offense_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Submit Violation
    </button>
</form>
