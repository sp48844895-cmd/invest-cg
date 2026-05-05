@extends('admin.layouts.app')

@section('title', 'Edit Startup Notification')
@section('page-title', 'Edit Startup Notification')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Edit Startup Notification</h5>
        <a href="{{ route('admin.startup-notifications.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.startup-notifications.update', $notification) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $notification->title) }}" required>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">PDF File</label>
                    <input type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror" accept=".pdf">
                    <small class="text-muted">Current: {{ $notification->pdf_name }}</small>
                    @error('pdf')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" name="notification_date" class="form-control @error('notification_date') is-invalid @enderror" value="{{ old('notification_date', $notification->notification_date->format('Y-m-d')) }}" required>
                    @error('notification_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', $notification->display_order) }}" min="0">
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $notification->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $notification->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Update
            </button>
            <a href="{{ route('admin.startup-notifications.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
