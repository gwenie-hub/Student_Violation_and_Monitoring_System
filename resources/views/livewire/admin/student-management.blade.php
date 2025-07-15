<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white py-8">
    <div class="w-full max-w-5xl bg-white rounded-xl shadow-lg border border-blue-100 p-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
                <i class="bi bi-people-fill text-blue-500 text-3xl"></i>
                Student Management
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:underline">
                <i class="bi bi-arrow-left-circle text-blue-500 text-xl mr-2"></i>
                <span class="font-semibold">Back to Dashboard</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="bg-blue-50 rounded-lg p-6 flex flex-col items-center shadow">
                <div class="relative mb-4">
                    <img src="{{ $selectedStudent->profile_photo_url ?? asset('images/default-profile.png') }}" alt="Profile Photo" class="h-28 w-28 rounded-full border-4 border-blue-200 object-cover">
                    <form wire:submit.prevent="uploadPhoto" class="absolute bottom-0 right-0">
                        <label class="cursor-pointer bg-blue-600 text-white rounded-full p-2 shadow hover:bg-blue-700 transition">
                            <i class="bi bi-camera"></i>
                            <input type="file" wire:model="photo" class="hidden" accept="image/*">
                        </label>
                    </form>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-semibold text-blue-800">{{ $selectedStudent->name ?? 'Select a student' }}</h3>
                    <p class="text-blue-500">{{ $selectedStudent->email ?? '' }}</p>
                </div>
            </div>
            <div class="md:col-span-2 bg-white rounded-lg p-6 shadow flex flex-col gap-6">
                @if($selectedStudent)
                    <div class="flex flex-col gap-2">
                        <span class="font-semibold text-blue-700">Settings</span>
                        @livewire('profile.update-profile-information-form', ['user' => $selectedStudent], key('profile-info-'.$selectedStudent->id))
                        @livewire('profile.update-password-form', ['user' => $selectedStudent], key('profile-password-'.$selectedStudent->id))
                        @livewire('profile.two-factor-authentication-form', ['user' => $selectedStudent], key('profile-2fa-'.$selectedStudent->id))
                    </div>
                @else
                    <div class="text-gray-500 text-center">Select a student to view and edit settings.</div>
                @endif
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-blue-100 rounded-lg shadow-sm">
                <thead class="bg-blue-100 text-blue-800">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold">#</th>
                        <th class="py-3 px-4 text-left font-semibold">Photo</th>
                        <th class="py-3 px-4 text-left font-semibold">Name</th>
                        <th class="py-3 px-4 text-left font-semibold">Email</th>
                        <th class="py-3 px-4 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                    <tr class="border-t hover:bg-blue-50 transition">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">
                            <img src="{{ $student->profile_photo_url ?? asset('images/default-profile.png') }}" alt="Profile" class="h-10 w-10 rounded-full object-cover border-2 border-blue-200">
                        </td>
                        <td class="py-2 px-4 font-medium flex items-center gap-2">
                            <i class="bi bi-person-circle text-blue-400"></i>
                            {{ $student->name }}
                        </td>
                        <td class="py-2 px-4">{{ $student->email }}</td>
                        <td class="py-2 px-4 flex gap-2">
                            <button wire:click="selectStudent({{ $student->id }})" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition flex items-center gap-1">
                                <i class="bi bi-gear"></i> Settings
                            </button>
                            <button wire:click="deleteStudent({{ $student->id }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition flex items-center gap-1">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
