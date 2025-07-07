<h2>User Role Management</h2>
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
