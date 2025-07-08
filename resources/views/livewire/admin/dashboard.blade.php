<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
