<div>
    <h2 class="text-xl font-bold mb-3">Import Students from CSV</h2>

    @if (session()->has('message'))
        <div class="p-2 bg-green-200 text-green-800 rounded mb-3">
            {{ session('message') }}
        </div>
    @endif

    <input type="file" wire:model="csv_file" accept=".csv" class="mb-2">
    @error('csv_file') <span class="text-red-600">{{ $message }}</span> @enderror

    <button wire:click="import" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">Import</button>

    <hr class="my-4">

    <h3 class="font-semibold">Current Students:</h3>
    <ul class="list-disc list-inside">
        @foreach (\App\Models\Student::all() as $student)
            <li>{{ $student->name }} – {{ $student->section }} – {{ $student->parent_email }}</li>
        @endforeach
    </ul>
</div>
