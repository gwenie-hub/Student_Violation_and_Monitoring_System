<div class="p-6">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif

    <h2 class="text-xl font-bold mb-4">Request Violation</h2>

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block">Student</label>
            <select wire:model="student_id" class="w-full border p-2 rounded">
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Violation Type</label>
            <select wire:model="type" class="w-full border p-2 rounded">
                <option value="minor">Minor</option>
                <option value="major">Major</option>
            </select>
            @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Description</label>
            <textarea wire:model="description" class="w-full border p-2 rounded" rows="3"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit Violation</button>
    </form>
</div>
