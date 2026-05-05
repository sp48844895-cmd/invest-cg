@extends('admin.layouts.app')

@section('title', 'Edit User Manual')
@section('page-title', 'Edit User Manual')

@section('content')
<div class="admin-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Edit User Manual</h5>
        <a href="{{ route('admin.user-manuals.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.user-manuals.update', $userManual) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Department & Service --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Department Name <span class="text-danger">*</span></label>
                    <input type="text"
                           name="dept_name"
                           class="form-control @error('dept_name') is-invalid @enderror"
                           value="{{ old('dept_name', $userManual->dept_name) }}"
                           required>
                    @error('dept_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Service Name <span class="text-danger">*</span></label>
                    <input type="text"
                           name="service_name"
                           class="form-control @error('service_name') is-invalid @enderror"
                           value="{{ old('service_name', $userManual->service_name) }}"
                           required>
                    @error('service_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
            {{-- Manual Type --}}
        <div class="form-group">
            <label class="form-label">Manual Type <span class="text-danger">*</span></label>
            <input type="text"
                   name="type"
                   class="form-control @error('type') is-invalid @enderror"
                   value="{{ old('type', $userManual->type) }}"
                   placeholder="Web / Mobile / Process"
                   required>
            @error('type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
            </div>
        </div>

      


        {{-- File & Order --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">PDF File</label>
                    <input type="file"
                           name="file"
                           class="form-control @error('file') is-invalid @enderror"
                           accept=".pdf">
                    <small class="text-muted">Leave empty to keep current file</small>

                    @if($userManual->pdf_file)
                        <div class="mt-2">
                            <small>
                                Current file:
                                <a href="{{ asset('storage/'.$userManual->pdf_file) }}"
                                   target="_blank">
                                    View PDF
                                </a>
                            </small>
                        </div>
                    @endif

                    @error('file')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number"
                           name="display_order"
                           class="form-control @error('display_order') is-invalid @enderror"
                           value="{{ old('display_order', $userManual->display_order) }}"
                           min="0">
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $userManual->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ old('status', $userManual->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>
        </div>

        
        {{-- Description --}}
        <div class="form-group">
            <label class="form-label">Short Description</label>
            <textarea name="short_desc"
                      class="form-control @error('short_desc') is-invalid @enderror"
                      rows="3">{{ old('short_desc', $userManual->short_desc) }}</textarea>
            @error('short_desc')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="form-group mt-3">
            <button type="submit" class="btn-primary-admin me-3">
                <i class="bi bi-check-circle"></i> Update Manual
            </button>
            <a href="{{ route('admin.user-manuals.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
