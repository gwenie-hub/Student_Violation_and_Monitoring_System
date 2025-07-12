<div class="p-6">
    {{-- ✅ Back Button --}}
    <div class="mb-4">
        <a href="{{ route('professor.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
    </div>

    {{-- ✅ Livewire Violation Form --}}
    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block font-medium">Last Name</label>
            <input type="text" wire:model.defer="last_name" class="w-full border rounded px-3 py-2" required>
            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">First Name</label>
            <input type="text" wire:model.defer="first_name" class="w-full border rounded px-3 py-2" required>
            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Middle Name</label>
            <input type="text" wire:model.defer="middle_name" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Course</label>
            <input type="text" wire:model.defer="course" class="w-full border rounded px-3 py-2" required>
            @error('course') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Year and Section</label>
            <input type="text" wire:model.defer="year_section" class="w-full border rounded px-3 py-2" required>
            @error('year_section') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Violation</label>
            <input type="text" wire:model.defer="violation" class="w-full border rounded px-3 py-2" required>
            @error('violation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

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
</div>
