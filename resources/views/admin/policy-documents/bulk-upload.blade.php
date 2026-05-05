@extends('admin.layouts.app')

@section('title', 'Bulk Upload Policy Documents')
@section('page-title', 'Bulk Upload Policy Documents')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Bulk Upload Policy Documents</h5>
        <a href="{{ route('admin.policy-documents.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.policy-documents.bulk-store') }}" method="POST" enctype="multipart/form-data" id="bulkUploadForm">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">Select Category</option>
                        <option value="acts" {{ old('category') == 'acts' ? 'selected' : '' }}>Acts</option>
                        <option value="industrial_policy" {{ old('category') == 'industrial_policy' ? 'selected' : '' }}>Industrial Policy Notification</option>
                        <option value="policy_act" {{ old('category') == 'policy_act' ? 'selected' : '' }}>Policy & Act</option>
                        <option value="rules" {{ old('category') == 'rules' ? 'selected' : '' }}>Rules</option>
                        <option value="administrative_reports" {{ old('category') == 'administrative_reports' ? 'selected' : '' }}>Administrative Reports</option>
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
                           value="{{ old('policy_period') }}" placeholder="e.g., 2024-30, 2019-24" id="policy_period">
                    <small class="text-muted">Required only for Industrial Policy Notification category</small>
                    @error('policy_period')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Published Date <span class="text-danger">*</span></label>
                    <input type="date" name="published_date" class="form-control @error('published_date') is-invalid @enderror" 
                           value="{{ old('published_date') }}" required>
                    @error('published_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Starting Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" 
                           value="{{ old('display_order', 0) }}" min="0">
                    <small class="text-muted">Files will be numbered sequentially from this value</small>
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-select">
                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Select PDF Files <span class="text-danger">*</span></label>
            <input type="file" name="files[]" id="files" class="form-control @error('files.*') is-invalid @enderror" 
                   accept=".pdf" multiple required>
            <small class="text-muted">You can select multiple PDF files. No size limit.</small>
            @error('files.*')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div id="fileTitlesContainer" class="form-group" style="display: none;">
            <label class="form-label">Document Titles</label>
            <small class="text-muted d-block mb-2">Edit titles for each document (optional - will use filename if left empty)</small>
            <div id="fileTitlesList"></div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin" id="submitBtn">
                <i class="bi bi-upload"></i> Upload All Documents
            </button>
            <a href="{{ route('admin.policy-documents.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('files').addEventListener('change', function(e) {
        const files = e.target.files;
        const container = document.getElementById('fileTitlesContainer');
        const list = document.getElementById('fileTitlesList');
        
        if (files.length > 0) {
            container.style.display = 'block';
            list.innerHTML = '';
            
            Array.from(files).forEach((file, index) => {
                const fileSizeMB = file.size / (1024 * 1024);
                const fileName = file.name.replace('.pdf', '');
                const div = document.createElement('div');
                div.className = 'mb-2';
                div.innerHTML = `
                    <label class="form-label small">${file.name} <span class="text-muted">(${fileSizeMB.toFixed(2)} MB)</span></label>
                    <input type="text" name="titles[]" class="form-control form-control-sm" 
                           value="${fileName}" placeholder="Document title">
                `;
                list.appendChild(div);
            });
        } else {
            container.style.display = 'none';
        }
    });

    // Show/hide policy period based on category
    document.getElementById('category').addEventListener('change', function() {
        const policyPeriod = document.getElementById('policy_period');
        if (this.value === 'industrial_policy') {
            policyPeriod.closest('.form-group').style.display = 'block';
        } else {
            policyPeriod.closest('.form-group').style.display = 'block';
            policyPeriod.value = '';
        }
    });
</script>
@endpush




