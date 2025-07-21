<div>
@php
    $myPending = \App\Models\StudentViolation::where('submitted_by', auth()->id())
        ->where('status', 'Pending')->latest()->get();
@endphp

@if($myPending->count())
    <div class="alert alert-warning mb-4">
        <div class="d-flex align-items-center mb-1">
            <i class="bi bi-hourglass-split me-2"></i>
            You have {{ $myPending->count() }} violation{{ $myPending->count() > 1 ? 's' : '' }} pending approval:
        </div>
        <ul class="mb-0 ps-4">
            @foreach($myPending as $pending)
                <li>
                    <strong>{{ $pending->Violation }}</strong> for <strong>{{ $pending->Student_ID }}</strong>
                    ({{ $pending->Offense_Record ?? '1st Offense' }}, {{ $pending->Sanction ?? '' }})
                    <span class="text-muted small">submitted {{ \Carbon\Carbon::parse($pending->created_at)->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

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
    .blue-layer {
        background: var(--main-light-blue);
        border-radius: 1.2rem;
        padding: 2rem 0 1rem 0;
    }
    .card-wrapper {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.07);
        background: var(--main-white);
        border: 1.5px solid var(--main-blue);
    }
    .card-header-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--main-blue);
        margin-top: 0.5rem;
    }
    .violation-summary-card {
        background: var(--main-light-blue);
        border-radius: 1rem;
        border: 1.5px solid var(--main-blue);
        box-shadow: 0 1px 6px 0 rgba(29,53,87,0.06);
    }
    .violation-summary-card h5 {
        color: var(--main-blue) !important;
    }
    .list-group-item {
        background: transparent;
        border: none;
        color: var(--main-dark);
        font-size: 1.01rem;
    }
    .summary-label {
        font-weight: 600;
        color: var(--main-blue);
    }
    .summary-value {
        color: var(--main-dark);
        font-weight: 500;
    }
    .btn-theme {
        font-size: 1.08rem;
        font-weight: 600;
        border-radius: 2rem;
        border: 2px solid #1d3557;
        background: #1d3557;
        color: #fff;
        padding: 0.5rem 1.5rem;
        margin-right: 0.5rem;
        transition: background 0.2s, color 0.2s, border 0.2s;
        box-shadow: 0 1px 2px rgba(29,53,87,0.04);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-theme:last-child { margin-right: 0; }
    .btn-theme.cancel {
        border-color: #1d3557;
        color: #1d3557;
        background: #fff;
    }
    .btn-theme.cancel:hover {
        background: #1d3557;
        color: #fff;
    }
    .btn-theme.submit {
        border-color: #e63946;
        color: #fff;
        background: #e63946;
    }
    .btn-theme.submit:hover {
        background: #b71c2a;
        border-color: #b71c2a;
        color: #fff;
    }
    .btn-theme.next {
        border-color: #1d3557;
        color: #fff;
        background: #1d3557;
    }
    .btn-theme.next:hover {
        background: #16304a;
        border-color: #16304a;
        color: #fff;
    }
    .btn-theme[disabled], .btn-theme:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>
<div class="blue-layer">
    <div class="card card-wrapper">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center mb-4">
                <i class="bi bi-exclamation-octagon-fill" style="font-size: 2rem; color: var(--main-red);"></i>
                <div class="card-header-title">Report Student Violation</div>
            </div>

            {{-- Alerts --}}
            @if (session()->has('success'))
                <div class="alert alert-success"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger"><i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="submit" id="violationForm">
                {{-- Form Section --}}
                <div id="formSection" @if($showConfirmDialog) style="display:none;" @endif>
                    <div class="mb-3">
                        <label for="studentIdInput" class="form-label"><i class="bi bi-person-badge me-2"></i>Student ID</label>
                        <input type="text" id="studentIdInput" wire:model.lazy="Student_ID"
                            class="form-control form-control-lg border border-secondary-subtle rounded-3"
                            placeholder="e.g. 2025-12345" maxlength="10"
                            inputmode="numeric" pattern="[0-9]{4}-[0-9]{5}"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\d{4})(\d{0,5})/, '$1-$2').slice(0,10);" required>

                        @if(strlen($Student_ID) > 0)
                            @if($studentRecord)
                                <div class="text-success mt-2 small">
                                    <i class="bi bi-check-circle-fill me-1"></i> Student found.
                                </div>
                            @else
                                <div class="text-danger mt-2 small">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Student ID not found or invalid format.
                                </div>
                            @endif
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="violationSelect" class="form-label"><i class="bi bi-shield-exclamation me-2"></i>Violation</label>
                        <select wire:model="Violation" id="violationSelect"
                            class="form-select form-select-lg border border-secondary-subtle rounded-3" required>
                            <option value="">Select Violation</option>
                            @foreach($violationOptions as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="button-wrapper d-flex justify-content-center">
                        <button type="submit" class="btn-theme next" wire:loading.attr="disabled"
                            @if(!isset($studentRecord) || !$studentRecord) disabled @endif>
                            <span wire:loading.remove><i class="bi bi-arrow-right-circle me-2"></i>Next</span>
                            <span wire:loading><i class="spinner-border spinner-border-sm me-2"></i>Checking...</span>
                        </button>
                    </div>
                </div>

                {{-- Confirmation Section --}}
                <div id="confirmSection" @if(!$showConfirmDialog) style="display:none;" @endif>
                    <div class="mt-4">
                        <div class="violation-summary-card p-4">
                            <h5 class="text-center fw-bold text-primary mb-4"><i class="bi bi-list-check me-2"></i>Violation Summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="summary-label">Student ID:</span> <span class="summary-value">{{ $studentRecord->Student_ID ?? '' }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Name:</span> <span class="summary-value">{{ $studentRecord->First_Name ?? '' }} {{ $studentRecord->Middle_Name ?? '' }} {{ $studentRecord->Last_Name ?? '' }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Course:</span> <span class="summary-value">{{ $studentRecord->Course ?? '' }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Major:</span> <span class="summary-value">{{ $studentRecord->Major ?? '' }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Year & Section:</span> <span class="summary-value">{{ $studentRecord->Year_and_Section ?? '' }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Violation:</span> <span class="summary-value">{{ $Violation }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Offense Record:</span> <span class="summary-value">{{ $Offense_Record }}</span></li>
                                <li class="list-group-item"><span class="summary-label">Sanction:</span> <span class="summary-value">{{ $Sanction }}</span></li>
                            </ul>
                        </div>

                        <style>
                            .btn-theme {
                                font-size: 1.08rem;
                                font-weight: 600;
                                border-radius: 2rem;
                                border: 2px solid #1d3557;
                                background: #1d3557;
                                color: #fff;
                                padding: 0.5rem 1.5rem;
                                margin-right: 0.5rem;
                                transition: background 0.2s, color 0.2s, border 0.2s;
                                box-shadow: 0 1px 2px rgba(29,53,87,0.04);
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                            }
                            .btn-theme:last-child { margin-right: 0; }
                            .btn-theme.cancel {
                                border-color: #1d3557;
                                color: #1d3557;
                                background: #fff;
                            }
                            .btn-theme.cancel:hover {
                                background: #1d3557;
                                color: #fff;
                            }
                            .btn-theme.submit {
                                border-color: #e63946;
                                color: #fff;
                                background: #e63946;
                            }
                            .btn-theme.submit:hover {
                                background: #b71c2a;
                                border-color: #b71c2a;
                                color: #fff;
                            }
                            .btn-theme[disabled], .btn-theme:disabled {
                                opacity: 0.7;
                                cursor: not-allowed;
                            }
                        </style>
                        <div class="button-wrapper mt-4 d-flex justify-content-center gap-3">
                            <button type="button" wire:click="cancelSubmit"
                                class="btn-theme cancel"
                                title="Cancel"
                                onclick="document.getElementById('violationForm').reset(); Livewire.emit('resetForm');">
                                <span wire:loading.remove><i class="bi bi-send-fill me-2"></i>Cancel</span>
                                <span wire:loading><i class="spinner-border spinner-border-sm me-2"></i>Cancelling...</span>
                            </button>

                            <button type="button" wire:click="confirmSubmit"
                                class="btn-theme submit"
                                wire:loading.attr="disabled"
                                title="Confirm & Submit"
                                @if(!isset($studentRecord) || !$studentRecord || empty($Violation)) disabled @endif>
                                <span wire:loading.remove><i class="bi bi-send-fill me-2"></i>Confirm & Submit</span>
                                <span wire:loading><i class="spinner-border spinner-border-sm me-2"></i>Submitting...</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
