<div>
    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

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

        {{-- Submit Button --}}
        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
            wire:loading.attr="disabled">
            <span wire:loading.remove>Submit Violation</span>
            <span wire:loading class="flex items-center">
                <svg class="animate-spin h-5 w-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                    </path>
                </svg>
                Loading...
            </span>
        </button>
    </form>
</div>
