@extends('admin.layouts.app')

@section('title', 'Edit Policy Document')
@section('page-title', 'Edit Policy Document')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Edit Policy Document</h5>
        <a href="{{ route('admin.policy-documents.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.policy-documents.update', $policyDocument) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">Select Category</option>
                        <option value="acts" {{ old('category', $policyDocument->category) == 'acts' ? 'selected' : '' }}>Acts</option>
                        <option value="industrial_policy" {{ old('category', $policyDocument->category) == 'industrial_policy' ? 'selected' : '' }}>Industrial Policy Notification</option>
                        <option value="policy_act" {{ old('category', $policyDocument->category) == 'policy_act' ? 'selected' : '' }}>Policy & Act</option>
                        <option value="rules" {{ old('category', $policyDocument->category) == 'rules' ? 'selected' : '' }}>Rules</option>
                        <option value="administrative_reports" {{ old('category', $policyDocument->category) == 'administrative_reports' ? 'selected' : '' }}>Administrative Reports</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Policy Period</label>
                    <input type="text" name="policy_period" class="form-control @error('policy_period') is-invalid @enderror" 
                           value="{{ old('policy_period', $policyDocument->policy_period) }}" placeholder="e.g., 2024-30, 2019-24">
                    <small class="text-muted">Required only for Industrial Policy Notification category</small>
                    @error('policy_period')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title', $policyDocument->title) }}" required>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">PDF File</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" 
                           accept=".pdf">
                    <small class="text-muted">Leave empty to keep current file. No size limit</small>
                    @if($policyDocument->file_path)
                        <div class="mt-2">
                            <small>Current file: <a href="{{ $policyDocument->file_url }}" target="_blank">{{ $policyDocument->file_name }}</a> ({{ $policyDocument->formatted_file_size }})</small>
                        </div>
                    @endif
                    @error('file')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Published Date <span class="text-danger">*</span></label>
                    <input type="date" name="published_date" class="form-control @error('published_date') is-invalid @enderror" 
                           value="{{ old('published_date', $policyDocument->published_date->format('Y-m-d')) }}" required>
                    @error('published_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" 
                           value="{{ old('display_order', $policyDocument->display_order) }}" min="0">
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $policyDocument->is_active) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $policyDocument->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Update Document
            </button>
            <a href="{{ route('admin.policy-documents.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection





