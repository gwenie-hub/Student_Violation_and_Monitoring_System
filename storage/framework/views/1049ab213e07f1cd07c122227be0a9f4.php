<?php $__env->startSection('content'); ?>
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
    .add-student-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .add-student-card h1 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .add-student-card .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .add-student-card .form-control, .add-student-card .form-select {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
    }
    .add-student-card .form-control:focus, .add-student-card .form-select:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
    }
    .add-student-card .btn-primary {
        background: var(--main-blue);
        border-color: var(--main-blue);
        font-weight: 600;
        letter-spacing: 0.03em;
    }
    .add-student-card .btn-primary:hover {
        background: var(--main-red);
        border-color: var(--main-red);
    }
    .add-student-card .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border: 1.5px solid var(--main-blue);
        font-weight: 600;
    }
    .add-student-card .alert-danger {
        background: var(--main-light-red);
        color: var(--main-red);
        border: 1.5px solid var(--main-red);
        font-weight: 600;
    }
</style>
<div class="add-student-card mt-5 mb-5">
    <h1 class="h3 mb-4">➕ Add Student</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.students.store')); ?>" id="addStudentForm">
        <?php echo csrf_field(); ?>
        <div class="row g-3">
            <div class="col-md-4">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="studentId" name="Student_ID" maxlength="10" pattern="[0-9]{4}-[0-9]{5}" required autocomplete="off" inputmode="numeric" placeholder="0000-00000" value="<?php echo e(old('Student_ID')); ?>">
                <div class="form-text">Format: 0000-00000</div>
            </div>
            <div class="col-md-4">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="Last_Name" required value="<?php echo e(old('Last_Name')); ?>">
            </div>
            <div class="col-md-4">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="First_Name" required value="<?php echo e(old('First_Name')); ?>">
            </div>
            <div class="col-md-4">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="Middle_Name" value="<?php echo e(old('Middle_Name')); ?>">
            </div>
            <div class="col-md-4">
                <label for="course" class="form-label">Course</label>
                <select class="form-select" id="course" name="Course" required>
                    <option value="">Select Course</option>
                    <option value="BSIT" <?php if(old('Course')=='BSIT'): ?> selected <?php endif; ?>>BSIT</option>
                    <option value="BSBA" <?php if(old('Course')=='BSBA'): ?> selected <?php endif; ?>>BSBA</option>
                    <option value="BSAIS" <?php if(old('Course')=='BSAIS'): ?> selected <?php endif; ?>>BSAIS</option>
                    <option value="BSED" <?php if(old('Course')=='BSED'): ?> selected <?php endif; ?>>BSED</option>
                </select>
            </div>
            <div class="col-md-4" id="majorFieldWrapper">
                <label for="major" class="form-label">Major</label>
                <select class="form-select" id="major" name="Major" disabled style="background-color: #f1f3f5; color: #adb5bd;">
                    <option value="">Select Major</option>
                </select>
            </div>
            <style>
                #majorFieldWrapper { transition: all 0.2s; }
                #majorFieldWrapper label {
                    color: var(--main-blue);
                    font-weight: 600;
                }
                #majorFieldWrapper .form-select {
                    border: 1.5px solid var(--main-blue);
                    border-radius: 0.5rem;
                    color: var(--main-blue);
                    background: var(--main-white);
                    font-weight: 500;
                    transition: background 0.2s, color 0.2s;
                }
                #majorFieldWrapper .form-select:focus {
                    border-color: var(--main-red);
                    box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
                }
                #majorFieldWrapper .form-select:disabled {
                    background: #f1f3f5;
                    color: #adb5bd;
                }
            </style>
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <select class="form-select" id="year" required>
                    <option value="">Select Year</option>
                    <option value="1" <?php if(old('Year_and_Section') && old('Year_and_Section')[0]=='1'): ?> selected <?php endif; ?>>1</option>
                    <option value="2" <?php if(old('Year_and_Section') && old('Year_and_Section')[0]=='2'): ?> selected <?php endif; ?>>2</option>
                    <option value="3" <?php if(old('Year_and_Section') && old('Year_and_Section')[0]=='3'): ?> selected <?php endif; ?>>3</option>
                    <option value="4" <?php if(old('Year_and_Section') && old('Year_and_Section')[0]=='4'): ?> selected <?php endif; ?>>4</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="section" class="form-label">Section</label>
                <select class="form-select" id="section" required>
                    <option value="">Select Section</option>
                    <option value="A" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='A'): ?> selected <?php endif; ?>>A</option>
                    <option value="B" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='B'): ?> selected <?php endif; ?>>B</option>
                    <option value="C" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='C'): ?> selected <?php endif; ?>>C</option>
                    <option value="D" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='D'): ?> selected <?php endif; ?>>D</option>
                    <option value="E" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='E'): ?> selected <?php endif; ?>>E</option>
                    <option value="F" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='F'): ?> selected <?php endif; ?>>F</option>
                    <option value="G" <?php if(old('Year_and_Section') && old('Year_and_Section')[1]=='G'): ?> selected <?php endif; ?>>G</option>
                </select>
            </div>
            <input type="hidden" name="Year_and_Section" id="yearSection" value="<?php echo e(old('Year_and_Section')); ?>" required>
            <div class="col-md-6">
                <label for="studentEmail" class="form-label">Student Email</label>
                <input type="email" class="form-control" id="studentEmail" name="Student_Email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" value="<?php echo e(old('Student_Email')); ?>">
            </div>
            <div class="col-md-6">
                <label for="parentEmail" class="form-label">Parent Email</label>
                <input type="email" class="form-control" id="parentEmail" name="Parent_Email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" value="<?php echo e(old('Parent_Email')); ?>">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary" id="addStudentBtn">
                <span id="addStudentBtnText">Add Student</span>
                <span id="addStudentBtnSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
        const courseSelect = document.getElementById('course');
        const majorSelect = document.getElementById('major');
        const majorFieldWrapper = document.getElementById('majorFieldWrapper');
        const yearSelect = document.getElementById('year');
        const sectionSelect = document.getElementById('section');
        const yearSectionInput = document.getElementById('yearSection');
        const studentIdInput = document.getElementById('studentId');
        // Show/hide and populate major field on course change
        function updateMajorField(course, selectedMajor = '') {
            if (course === 'BSBA' || course === 'BSED') {
                majorSelect.disabled = false;
                majorSelect.style.backgroundColor = '';
                majorSelect.style.color = '';
                majorSelect.innerHTML = '<option value="">Select Major</option>';
                majors[course].forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.text = opt.text;
                    if (selectedMajor === opt.value) option.selected = true;
                    majorSelect.appendChild(option);
                });
            } else {
                majorSelect.disabled = true;
                majorSelect.style.backgroundColor = '#f1f3f5';
                majorSelect.style.color = '#adb5bd';
                majorSelect.innerHTML = '<option value="">Select Major</option>';
            }
        }
        courseSelect.addEventListener('change', function() {
            updateMajorField(this.value);
        });
        // Set initial major field if old value exists
        updateMajorField(courseSelect.value, majorSelect.value);
        // Student ID input mask: 0000-00000, only numbers
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
        // Add loading spinner on submit
        document.getElementById('addStudentForm').addEventListener('submit', function() {
            document.getElementById('addStudentBtn').disabled = true;
            document.getElementById('addStudentBtnSpinner').classList.remove('d-none');
            document.getElementById('addStudentBtnText').classList.add('d-none');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/admin/student-violations/index.blade.php ENDPATH**/ ?>