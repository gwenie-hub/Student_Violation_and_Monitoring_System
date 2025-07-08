<div>
    @if (session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <select wire:model="student_id" class="border rounded w-full p-2 mb-2">
            <option value="">Select Student</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>

        <input wire:model="offense" type="text" class="border rounded w-full p-2 mb-2" placeholder="Offense" />

        <select wire:model="type" class="border rounded w-full p-2 mb-2">
            <option value="">Select Type</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
        </select>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
