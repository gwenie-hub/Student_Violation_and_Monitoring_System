<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="p-6 bg-white shadow-lg rounded-2xl hover:shadow-xl transition duration-300">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5V4H2v16h5m10 0v-6h-4v6m4 0H7"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                <p class="text-2xl text-blue-600 font-bold">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white shadow-lg rounded-2xl hover:shadow-xl transition duration-300">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-green-100 text-green-600 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.292.534 6.121 1.474M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Students</h3>
                <p class="text-2xl text-green-600 font-bold">{{ $totalStudents }}</p>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white shadow-lg rounded-2xl hover:shadow-xl transition duration-300">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-red-100 text-red-600 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18.364 5.636l-1.414 1.414M6.343 17.657l-1.415 1.415M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9S3 16.97 3 12 7.03 3 12 3s9 4.03 9 9z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Violations</h3>
                <p class="text-2xl text-red-600 font-bold">{{ $totalViolations }}</p>
            </div>
        </div>
    </div>
</div>
