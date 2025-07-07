<h2>Add New Student</h2>
<input type="text" wire:model="name" placeholder="Student Name">
<input type="text" wire:model="section" placeholder="Section">
<input type="email" wire:model="parent_email" placeholder="Parent Email">
<button wire:click="addStudent">Add</button>

<hr>

<h3>Student List</h3>
<ul>
    @foreach($students as $student)
        <li>{{ $student->name }} - {{ $student->section }} - {{ $student->parent_email }}</li>
    @endforeach
</ul>
