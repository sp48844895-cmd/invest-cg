@extends('admin.layouts.app')

@section('title', 'Create Media Update')
@section('page-title', 'Create Media Update')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Create Media Update</h5>
        <a href="{{ route('admin.media-updates.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.media-updates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Summary <span class="text-danger">*</span></label>
            <textarea name="summary" rows="4" class="form-control @error('summary') is-invalid @enderror" required>{{ old('summary') }}</textarea>
            @error('summary')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Source URL <span class="text-danger">*</span></label>
                    <input type="url" name="source_url" class="form-control @error('source_url') is-invalid @enderror" 
                           value="{{ old('source_url') }}" required>
                    @error('source_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Published Date <span class="text-danger">*</span></label>
                    <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror" 
                           value="{{ old('published_at', now()->toDateString()) }}" required>
                    @error('published_at')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Thumbnail URL (optional)</label>
                    <input type="url" name="image_url" class="form-control @error('image_url') is-invalid @enderror" 
                           value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg">
                    <small class="text-muted">Use this if you want to use an external image URL</small>
                    @error('image_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Or Upload Thumbnail</label>
                    <input type="file" name="image_upload" class="form-control @error('image_upload') is-invalid @enderror" 
                           accept="image/*">
                    <small class="text-muted">Max 2MB. Uploaded image overrides thumbnail URL.</small>
                    @error('image_upload')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="is_published" class="form-select">
                <option value="1" {{ old('is_published', true) ? 'selected' : '' }}>Published</option>
                <option value="0" {{ old('is_published') === false ? 'selected' : '' }}>Unpublished</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Create Media Update
            </button>
            <a href="{{ route('admin.media-updates.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection






