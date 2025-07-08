<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Super Admin Dashboard</h1>

    @error('load')
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">{{ $message }}</div>
    @enderror

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Total Students</h2>
            <p class="text-3xl">{{ $totalStudents }}</p>
        </div>
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Total Violations</h2>
            <p class="text-3xl">{{ $totalViolations }}</p>
        </div>
    </div>
</div>
