@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar-disciplinary')
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Notify Parents</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('parents.notify.send') }}" class="space-y-4 max-w-lg">
        @csrf

        {{-- Student Name (Read-only Input) --}}
        <div>
            <label class="block mb-1 font-medium">Student Name</label>
            <input type="text" name="student_name" value="{{ old('student_name') }}" class="w-full border rounded px-4 py-2" placeholder="Enter student name" required>
        </div>

        {{-- Parent Email --}}
        <div>
            <label class="block mb-1 font-medium">Parent Email</label>
            <input type="email" name="parent_email" value="{{ old('parent_email') }}" class="w-full border rounded px-4 py-2" placeholder="Enter parent email" required>
        </div>

        {{-- Message to Parent --}}
        <div>
            <label class="block mb-1 font-medium">Message</label>
            <textarea name="message" rows="4" class="w-full border rounded px-4 py-2" placeholder="Enter message to parent..." required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Send Notification</button>
    </form>
</div>
@endsection
