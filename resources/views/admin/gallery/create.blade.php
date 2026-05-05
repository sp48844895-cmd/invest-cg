@extends('admin.layouts.app')

@section('title', 'Add Gallery Item')
@section('page-title', 'Add Gallery Item')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Add New Gallery Item</h5>
        <a href="{{ route('admin.gallery.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Media Type <span class="text-danger">*</span></label>
            <select name="media_type" id="media_type" class="form-select @error('media_type') is-invalid @enderror" required>
                <option value="">Select Type</option>
                <option value="image" {{ old('media_type') == 'image' ? 'selected' : '' }}>Image</option>
                <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Video</option>
            </select>
            @error('media_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div id="general_title_group" class="form-group">
            <label class="form-label">Title</label>
            <input type="text" name="title" id="general_title" class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title') }}">
            <small class="text-muted">For images or manually uploaded videos</small>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div id="image_fields" style="display: none;">
            <div class="form-group">
                <label class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
                       accept="image/*">
                <small class="text-muted">Max file size: 5MB</small>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div id="video_fields" style="display: none;">
            <div class="form-group">
                <label class="form-label">Upload Video File</label>
                <input type="file" name="video_file" id="video_file" class="form-control @error('video_file') is-invalid @enderror" 
                       accept="video/*">
                <small class="text-muted">Max file size: 50MB. Supported formats: MP4, AVI, MOV, WMV, FLV, WebM</small>
                @error('video_file')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div id="video_file_title_group" class="form-group" style="display: none;">
                <label class="form-label">Video Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') }}" placeholder="Enter video title">
                <small class="text-muted">Title for uploaded video file</small>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">OR Video URL</label>
                <input type="url" name="video_url" id="video_url" class="form-control @error('video_url') is-invalid @enderror" 
                       value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=...">
                <small class="text-muted">Enter a YouTube URL. Title will be automatically fetched from YouTube.</small>
                @error('video_url')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div id="youtube_id_group" class="form-group" style="display: none;">
                <label class="form-label">YouTube ID</label>
                <input type="text" name="youtube_id" class="form-control @error('youtube_id') is-invalid @enderror" 
                       value="{{ old('youtube_id') }}" placeholder="YouTube video ID">
                <small class="text-muted">Auto-extracted from URL</small>
                @error('youtube_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Published Date</label>
                    <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror" 
                           value="{{ old('published_at', date('Y-m-d')) }}">
                    @error('published_at')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" 
                           value="{{ old('display_order', 0) }}" min="0">
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="is_visible" class="form-select">
                <option value="1" {{ old('is_visible', '1') == '1' ? 'selected' : '' }}>Visible</option>
                <option value="0" {{ old('is_visible') == '0' ? 'selected' : '' }}>Hidden</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Add Item
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const mediaTypeSelect = document.getElementById('media_type');
    const imageFields = document.getElementById('image_fields');
    const videoFields = document.getElementById('video_fields');
    const generalTitleGroup = document.getElementById('general_title_group');
    const videoFileTitleGroup = document.getElementById('video_file_title_group');
    const videoFileInput = document.getElementById('video_file');
    const videoUrlInput = document.getElementById('video_url');

    mediaTypeSelect.addEventListener('change', function() {
        const mediaType = this.value;
        
        if (mediaType === 'image') {
            imageFields.style.display = 'block';
            videoFields.style.display = 'none';
            generalTitleGroup.style.display = 'block';
            videoFileTitleGroup.style.display = 'none';
            document.querySelector('[name="image"]').required = true;
        } else if (mediaType === 'video') {
            imageFields.style.display = 'none';
            videoFields.style.display = 'block';
            generalTitleGroup.style.display = 'none';
            videoFileTitleGroup.style.display = 'none';
            document.querySelector('[name="image"]').required = false;
        } else {
            imageFields.style.display = 'none';
            videoFields.style.display = 'none';
            generalTitleGroup.style.display = 'block';
            videoFileTitleGroup.style.display = 'none';
        }
    });

    // Show title field only when video file is selected
    videoFileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            videoFileTitleGroup.style.display = 'block';
            videoUrlInput.value = ''; // Clear URL when file is selected
        } else {
            videoFileTitleGroup.style.display = 'none';
        }
    });

    // Hide title field when YouTube URL is entered
    videoUrlInput.addEventListener('input', function() {
        if (this.value.trim() && (this.value.includes('youtube.com') || this.value.includes('youtu.be'))) {
            videoFileTitleGroup.style.display = 'none';
            videoFileInput.value = ''; // Clear file when URL is entered
            document.getElementById('general_title').value = ''; // Clear general title
        }
    });
    
    // Trigger on page load if value exists
    if (mediaTypeSelect.value) {
        mediaTypeSelect.dispatchEvent(new Event('change'));
    }
</script>
@endpush


