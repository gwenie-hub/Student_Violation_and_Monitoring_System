<div>
<a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:underline mb-4">
    <!-- Back arrow icon -->
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
    </svg>
    Back to Dashboard
</a>

<h2>User Management</h2>
@foreach($users as $user)
<div class="border p-2 mb-2">
    <p><strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
    <select wire:model="selectedRole.{{ $user->id }}">
        <option value="">-- select role --</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <button wire:click="assignRole({{ $user->id }})">Assign</button>
</div>
@endforeach
