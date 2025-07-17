<div class="d-flex flex-column align-items-center">

    @php
        $photoPath = Auth::user()->profile_photo_path;
    @endphp

    @if ($photoPath && file_exists(public_path('storage/' . $photoPath)))
        <img 
            src="{{ asset('storage/' . $photoPath) . '?' . time() }}" 
            alt="Profile Photo" 
            class="rounded-circle shadow mb-2"
            style="width: 80px; height: 80px; object-fit: cover;"
        >
    @else
        <div 
            class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white shadow mb-2"
            style="width: 80px; height: 80px;">
            <i class="bi bi-person-fill fs-2"></i>
        </div>
    @endif

    {{-- Full Name --}}
    <div class="fw-semibold text-center mb-2">
        {{ Auth::user()->fname }} {{ Auth::user()->mname }} {{ Auth::user()->lname }}
    </div>

    {{-- Upload Form --}}
    <form wire:submit.prevent="updatedPhoto" class="w-100 text-center">
        <label for="photoUpload" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-upload"></i> Change Photo
        </label>
        <input type="file" wire:model="photo" id="photoUpload" class="d-none">

        @error('photo') 
            <div class="text-danger small mt-1">{{ $message }}</div> 
        @enderror
    </form>

    {{-- Flash Messages --}}
    @if (session()->has('success'))
        <div class="text-success small mt-2">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="text-danger small mt-2">
            {{ session('error') }}
        </div>
    @endif

</div>
