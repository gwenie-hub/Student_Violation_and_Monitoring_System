<nav class="bg-white shadow-md px-6 py-3">
    <div class="flex justify-between items-center">
        <!-- Left: Role-Based Dashboard Title -->
        <h1 class="text-xl font-bold text-black">
            @php
                $user = auth()->user();
            @endphp

            @if($user->hasRole('super_admin'))
                Super Admin Dashboard
            @elseif($user->hasRole('school_admin'))
                School Admin Dashboard
            @elseif($user->hasRole('professor'))
                Professor Dashboard
            @elseif($user->hasRole('disciplinary_committee'))
                Disciplinary Committee Dashboard
            @elseif($user->hasRole('guidance_counselor'))
                Guidance Counselor Dashboard
            @elseif($user->hasRole('parent'))
                Parent Dashboard
            @else
                Dashboard
            @endif
        </h1>

        <!-- Right: Navigation -->
        <ul class="flex items-center space-x-6 text-gray-800">
            {{-- Optional Profile Link --}}
            {{-- <li><a href="/profile" class="hover:text-blue-600">Profile</a></li> --}}

            <!-- Logout -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
