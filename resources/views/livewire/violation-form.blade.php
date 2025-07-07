<div>
    @if (session()->has('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label>Description</label>
            <textarea wire:model.defer="description" class="w-full border p-2"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Severity Level</label>
            <select wire:model="severity_level" class="w-full border p-2">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Violation</button>
    </form>
</div>
