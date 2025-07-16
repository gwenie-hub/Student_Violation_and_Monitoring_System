<div class="d-flex flex-column align-items-center">
    @if ($currentPhoto)
        <img 
            src="{{ asset('storage/' . $currentPhoto) }}" 
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

    {{-- ✅ Full Name Display --}}
    <div class="fw-semibold text-center mb-2">
        {{ Auth::user()->fname }} {{ Auth::user()->mname }} {{ Auth::user()->lname }}
    </div>

    <form wire:submit.prevent="updatedPhoto" class="w-100 text-center">
        <label for="photoUpload" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-upload"></i> Change Photo
        </label>
        <input type="file" wire:model="photo" id="photoUpload" class="d-none">
        @error('photo') 
            <div class="text-danger small mt-1">{{ $message }}</div> 
        @enderror
    </form>

</div>
