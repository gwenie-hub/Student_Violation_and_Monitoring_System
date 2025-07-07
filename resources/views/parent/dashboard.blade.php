<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>

            @if($student)
                <h2 class="text-xl mb-2">Your Child: {{ $student->name }}</h2>
                <ul class="list-disc ml-6">
                    @foreach ($student->violations as $violation)
                        <li>{{ $violation->violation_type }} - {{ $violation->status }}</li>
                    @endforeach
                </ul>
            @else
                <p>No student record linked to your account.</p>
            @endif
        </div>
    </div>
</x-app-layout>
