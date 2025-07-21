<!-- Bootstrap 5 (if not already added) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Font: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Custom Styles -->
<style>
    body, .sidebar, a, h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto', sans-serif;
    }

    .sidebar a {
        transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover {
        background-color: #f1f1f1;
    }

    .sidebar .active {
        background-color: #e7f1ff;
        font-weight: 500;
    }

    .card-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
    }

    .card-box {
        transition: all 0.3s ease;
    }
</style>


@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar for School Admin --}}
    <aside class="w-64 bg-white shadow-sm p-4 border-end min-vh-100 sidebar">
        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16 mx-auto">
        </div>

        {{-- Navigation --}}
        <h2 class="h5 fw-bold text-center text-primary mb-4">School Admin</h2>
        <ul class="nav flex-column text-dark">
            <li class="nav-item mb-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link px-3 py-2 {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard Overview
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('admin.violations') }}" class="nav-link px-3 py-2">
                    <i class="bi bi-exclamation-triangle me-2"></i> View Unreviewed Violations
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-tags me-2"></i> Categorize Violations
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-pencil-square me-2"></i> Update Violation Status
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-bar-chart-line me-2"></i> Reports
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-bell me-2"></i> Notifications
                </a>
            </li>
            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>
@endsection

@section('content')
<main class="flex-1 p-4 bg-white rounded-xl shadow-md">
    <h2 class="mb-4 fw-bold text-primary">All Students</h2>

    @if (session('success'))
        <div class="alert alert-success" style="background:var(--main-light-blue);color:var(--main-blue);border:1.5px solid var(--main-blue);font-weight:600;">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="background:var(--main-light-red);color:var(--main-red);border:1.5px solid var(--main-red);font-weight:600;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="loadingOverlay" class="loading-overlay" style="display:none;">
        <div class="text-center">
            <div class="spinner-border text-primary mb-3" style="width:3rem;height:3rem;"></div>
            <div class="fw-bold text-primary">Loading student records...</div>
        </div>
    </div>
    <style>
        :root {
            --main-blue: #1d3557;
            --main-red: #e63946;
            --main-white: #fff;
            --main-light-blue: #e3eafc;
            --main-light-red: #fde7eb;
            --main-gray: #f1f3f5;
            --main-dark: #22223b;
        }
        .violation-table {
            border-radius: 1.1rem !important;
            overflow: hidden;
            box-shadow: 0 2px 12px 0 rgba(29,53,87,0.07);
        }
        .violation-table th, .violation-table td {
            vertical-align: middle !important;
            padding-top: 0.55rem !important;
            padding-bottom: 0.55rem !important;
            font-size: 1rem;
        }
        .violation-table td {
            border-radius: 0.5rem !important;
        }
        .violation-table th {
            background: var(--main-blue);
            color: var(--main-white);
            font-weight: 700;
            border-bottom: 2.5px solid var(--main-red) !important;
            letter-spacing: 0.03em;
        }
        .violation-table tr {
            background: var(--main-white);
            border-bottom: 1.5px solid var(--main-gray);
            transition: background 0.2s;
        }
        .violation-table tbody tr:hover {
            background: var(--main-light-blue);
        }
        .violation-table tr:last-child {
            border-bottom: none;
        }
        .violation-table td {
            color: var(--main-dark);
        }
        .violation-table .badge {
            background: var(--main-light-blue);
            color: var(--main-blue);
            font-weight: 600;
            border-radius: 0.35rem;
            padding: 0.22rem 0.8rem;
            font-size: 0.97em;
            box-shadow: 0 1px 2px rgba(29,53,87,0.06);
        }
        .violation-table .status-pending {
            color: var(--main-red);
            font-size: 0.97em;
            font-weight: 600;
        }
        .violation-table .student-id {
            font-weight: 700;
            color: var(--main-blue);
            font-size: 1.01em;
        }
        .violation-table .student-name {
            font-weight: 600;
            color: var(--main-dark);
        }
        .violation-table .date-cell {
            color: #64748b;
            font-size: 0.96em;
        }
        .violation-table .empty-row {
            background: var(--main-light-blue);
            border-radius: 0.7rem !important;
        }

        /* Modal theme styling */
        .modal-content {
            border-radius: 1.1rem;
            border: 2.5px solid var(--main-blue);
            box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        }
        .modal-header {
            background: var(--main-blue);
            color: var(--main-white);
            border-top-left-radius: 1.1rem;
            border-top-right-radius: 1.1rem;
            border-bottom: 2.5px solid var(--main-red);
        }
        .modal-title {
            color: var(--main-white);
            font-weight: 700;
        }
        .modal-footer {
            background: var(--main-light-blue);
            border-bottom-left-radius: 1.1rem;
            border-bottom-right-radius: 1.1rem;
        }
        .modal-body label {
            color: var(--main-blue);
            font-weight: 600;
        }
        .modal-body input.form-control {
            border: 1.5px solid var(--main-blue);
            border-radius: 0.5rem;
        }
        .modal-body input.form-control:focus {
            border-color: var(--main-red);
            box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
        }
        .modal-footer .btn-primary {
            background: var(--main-blue);
            border-color: var(--main-blue);
        }
        .modal-footer .btn-primary:hover {
            background: var(--main-red);
            border-color: var(--main-red);
        }
        .modal-footer .btn-secondary {
            background: var(--main-gray);
            color: var(--main-blue);
            border: none;
        }
        .modal-footer .btn-secondary:hover {
            background: var(--main-light-blue);
            color: var(--main-red);
        }
    </style>
    <div class="table-responsive rounded-3 border shadow-sm bg-white p-2">
        <table class="table violation-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">Student ID</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Year &amp; Section</th>
                    <th>Student Email</th>
                    <th>Parent Email</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td class="student-id text-center">{{ $student->Student_ID }}</td>
                        <td class="student-name">{{ $student->Last_Name }}, {{ $student->First_Name }} {{ $student->Middle_Name }}</td>
                        <td>{{ $student->Course }}</td>
                        <td>{{ $student->Major ?? 'None' }}</td>
                        <td>{{ $student->Year_and_Section }}</td>
                        <td>{{ $student->Student_Email }}</td>
                        <td>{{ $student->Parent_Email }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-primary me-1 edit-student-btn"
                                data-bs-toggle="modal" data-bs-target="#editStudentModal"
                                data-student='@json($student)'>
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <form action="{{ route('admin.students.delete', $student->Student_ID) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="8" class="text-center py-4">
                            <span class="fw-semibold text-secondary">No student records found.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Edit Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="editStudentForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="editStudentModalLabel">Edit Student Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row g-3">
              <div class="col-md-4">
                <label for="editStudentID" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="editStudentID" name="Student_ID" maxlength="10" pattern="[0-9]{4}-[0-9]{5}" required autocomplete="off" inputmode="numeric" placeholder="0000-00000">
                <div class="form-text">Format: 0000-00000</div>
              </div>
              <div class="col-md-4">
                <label for="editLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="editLastName" name="Last_Name" required>
              </div>
              <div class="col-md-4">
                <label for="editFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="editFirstName" name="First_Name" required>
              </div>
              <div class="col-md-4">
                <label for="editMiddleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="editMiddleName" name="Middle_Name">
              </div>
              <div class="col-md-4">
                <label for="editCourse" class="form-label">Course</label>
                <select class="form-select" id="editCourse" name="Course" required>
                  <option value="">Select Course</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSBA">BSBA</option>
                  <option value="BSAIS">BSAIS</option>
                  <option value="BSED">BSED</option>
                </select>
              </div>
              <div class="col-md-4" id="majorFieldWrapper" style="display:none;">
                <label for="editMajor" class="form-label">Major</label>
                <select class="form-select" id="editMajor" name="Major">
                  <option value="">Select Major</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="editYear" class="form-label">Year</label>
                <select class="form-select" id="editYear" required>
                  <option value="">Select Year</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="editSection" class="form-label">Section</label>
                <select class="form-select" id="editSection" required>
                  <option value="">Select Section</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                  <option value="G">G</option>
                </select>
              </div>
              <input type="hidden" name="Year_and_Section" id="editYearSection" required>
              <div class="col-md-6">
                <label for="editStudentEmail" class="form-label">Student Email</label>
                <input type="email" class="form-control" id="editStudentEmail" name="Student_Email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
              </div>
              <div class="col-md-6">
                <label for="editParentEmail" class="form-label">Parent Email</label>
                <input type="email" class="form-control" id="editParentEmail" name="Parent_Email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="modalSaveBtn">
                <span id="modalSaveBtnText">Save Changes</span>
                <span id="modalSaveBtnSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="mt-4">
        {{ $students->links() }}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Loading overlay
            const overlay = document.getElementById('loadingOverlay');
            overlay.style.display = 'flex';
            setTimeout(() => overlay.style.display = 'none', 800);

            // Edit Student Modal logic
            const editModal = document.getElementById('editStudentModal');
            const editForm = document.getElementById('editStudentForm');
            let currentStudentId = null;
            const courseSelect = document.getElementById('editCourse');
            const majorSelect = document.getElementById('editMajor');
            const majorFieldWrapper = document.getElementById('majorFieldWrapper');
            const yearSelect = document.getElementById('editYear');
            const sectionSelect = document.getElementById('editSection');
            const yearSectionInput = document.getElementById('editYearSection');
            const studentIdInput = document.getElementById('editStudentID');

            // Major options
            const majors = {
                BSBA: [
                    { value: 'MM', text: 'MM' },
                    { value: 'HRM', text: 'HRM' },
                    { value: 'FM', text: 'FM' }
                ],
                BSED: [
                    { value: 'ENG', text: 'ENG' },
                    { value: 'MATH', text: 'MATH' },
                    { value: 'FIL', text: 'FIL' },
                    { value: 'SCI', text: 'SCI' }
                ]
            };

            function updateMajorField(course, selectedMajor = '') {
                if (course === 'BSBA' || course === 'BSED') {
                    majorFieldWrapper.style.display = '';
                    majorSelect.innerHTML = '<option value="">Select Major</option>';
                    majors[course].forEach(opt => {
                        const option = document.createElement('option');
                        option.value = opt.value;
                        option.text = opt.text;
                        if (selectedMajor === opt.value) option.selected = true;
                        majorSelect.appendChild(option);
                    });
                } else {
                    majorFieldWrapper.style.display = 'none';
                    majorSelect.innerHTML = '<option value="">Select Major</option>';
                }
            }

            // Student ID input mask: 0000-00000, only numbers, allow leading zeros
            studentIdInput.addEventListener('input', function(e) {
                let value = this.value.replace(/[^\d]/g, '');
                if (value.length > 4) {
                    value = value.slice(0, 4) + '-' + value.slice(4, 9);
                }
                this.value = value.slice(0, 10);
            });

            // Update Year_and_Section hidden input
            function updateYearSection() {
                if (yearSelect.value && sectionSelect.value) {
                    yearSectionInput.value = yearSelect.value + sectionSelect.value;
                } else {
                    yearSectionInput.value = '';
                }
            }
            yearSelect.addEventListener('change', updateYearSection);
            sectionSelect.addEventListener('change', updateYearSection);

            // Show/hide and populate major field on course change
            courseSelect.addEventListener('change', function() {
                updateMajorField(this.value);
            });

            document.querySelectorAll('.edit-student-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const student = JSON.parse(this.getAttribute('data-student'));
                    currentStudentId = student.Student_ID;
                    // Fill form fields
                    studentIdInput.value = student.Student_ID;
                    document.getElementById('editLastName').value = student.Last_Name;
                    document.getElementById('editFirstName').value = student.First_Name;
                    document.getElementById('editMiddleName').value = student.Middle_Name || '';
                    courseSelect.value = student.Course;
                    updateMajorField(student.Course, student.Major);
                    // Parse Year_and_Section (e.g., 3B)
                    let year = '', section = '';
                    if (student.Year_and_Section && student.Year_and_Section.length >= 2) {
                        year = student.Year_and_Section.slice(0, -1);
                        section = student.Year_and_Section.slice(-1);
                    }
                    yearSelect.value = year;
                    sectionSelect.value = section;
                    updateYearSection();
                    document.getElementById('editStudentEmail').value = student.Student_Email;
                    document.getElementById('editParentEmail').value = student.Parent_Email;
                    // Set form action
                    editForm.action = `/admin/students/${student.Student_ID}`;
                    // Reset save button
                    document.getElementById('modalSaveBtn').disabled = false;
                    document.getElementById('modalSaveBtnSpinner').classList.add('d-none');
                    document.getElementById('modalSaveBtnText').classList.remove('d-none');
                });
            });

            // Add loading spinner on submit
            editForm.addEventListener('submit', function() {
                document.getElementById('modalSaveBtn').disabled = true;
                document.getElementById('modalSaveBtnSpinner').classList.remove('d-none');
                document.getElementById('modalSaveBtnText').classList.add('d-none');
            });
        });
    </script>
</main>
@endsection
