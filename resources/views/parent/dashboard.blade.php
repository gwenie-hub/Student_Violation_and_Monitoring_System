<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
    </x-slot>

    @section('content')
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r min-h-screen p-6">
            <!-- Logo -->
            <div class="mb-6">
                <img src="{{ asset('images/logo5.png') }}" alt="Logo" class="h-12 mx-auto mb-4">
                <h2 class="text-xl font-bold text-center text-black">Parent Menu</h2>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2 text-black">
                <a href="{{ route('parent.dashboard') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">View Child Violations</a>
                <a href="{{ route('notifications.index') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Notifications</a>
                <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-danger bg-transparent border-0 p-0">
                    Logout
                </button>
            </form>
        </li>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }}</h1>

            @if ($student)
                <h2 class="mt-4 text-lg font-semibold text-gray-700">Child: {{ $student->student_number }}</h2>

                @if ($violations->isEmpty())
                    <p class="mt-3 text-gray-600">No violations recorded for your child.</p>
                @else
                    <div class="overflow-x-auto mt-4">
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">Date</th>
                                    <th class="border px-4 py-2">Violation</th>
                                    <th class="border px-4 py-2">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($violations as $violation)
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td class="border px-4 py-2">{{ $violation->created_at->format('Y-m-d') }}</td>
                                        <td class="border px-4 py-2">{{ $violation->type }}</td>
                                        <td class="border px-4 py-2">{{ $violation->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @else
                <p class="mt-4 text-gray-600">No student linked to your account.</p>
            @endif
        </main>
    </div>
    @endsection
</x-app-layout>
