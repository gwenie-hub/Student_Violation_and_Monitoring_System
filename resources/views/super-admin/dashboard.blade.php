@extends('layouts.app')

@section('content')
<style>
  /* Adjust when sidebar is toggled */
  @media (min-width: 992px) {
      main.with-sidebar {
          margin-left: 250px; /* same width as your sidebar */
      }
  }

  /* Ensure content is centered and never overflows */
  main {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      transition: margin-left 0.3s ease;
  }
</style>

<main class="bg-light text-black w-100 px-3 py-5 with-sidebar">
    <div class="container">
        <h1 class="fw-bold mb-4 fs-2 text-center text-md-start">Super Admin Dashboard</h1>

        <div class="row justify-content-center g-4">
            <!-- Total Users -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                <div class="bg-white rounded-4 shadow-sm p-4 border h-100 text-center">
                    <h3 class="fs-5 fw-semibold mb-2 text-secondary">Total Users</h3>
                    <p class="display-5 fw-bold text-primary mb-0">{{ $totalUsers }}</p>
                </div>
            </div>

            <!-- Total Student Violations -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                <div class="bg-white rounded-4 shadow-sm p-4 border h-100 text-center">
                    <h3 class="fs-5 fw-semibold mb-2 text-secondary">Total Student Violations</h3>
                    <p class="display-5 fw-bold text-danger mb-0">{{ $totalViolations }}</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
