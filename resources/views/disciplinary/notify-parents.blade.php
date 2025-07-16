@extends('layouts.app')

@section('content')
<main class="p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Notify Parents via Email</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('disciplinary.notify.parents.send') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block font-semibold mb-1">Parent Email Address</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label for="summary" class="block font-semibold mb-1">Violation Summary</label>
            <textarea name="summary" id="summary" rows="5" class="w-full border border-gray-300 p-2 rounded" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Send Email
        </button>
    </form>
</main>
@endsection
