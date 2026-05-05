@extends('admin.layouts.app')

@section('title', 'Bulk Upload Gallery Items')
@section('page-title', 'Bulk Upload Gallery Items')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Bulk Upload Gallery Items</h5>
        <a href="{{ route('admin.gallery.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.gallery.bulk-store') }}" method="POST" enctype="multipart/form-data" id="bulkUploadForm">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Media Type <span class="text-danger">*</span></label>
            <select name="media_type" id="media_type" class="form-select @error('media_type') is-invalid @enderror" required>
                <option value="">Select Media Type</option>
                <option value="image" {{ old('media_type', 'image') == 'image' ? 'selected' : '' }}>Images</option>
                <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Videos</option>
            </select>
            <small class="text-muted">Select whether you want to upload images or videos</small>
            @error('media_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
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
                    <label class="form-label">Starting Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" 
                           value="{{ old('display_order', 0) }}" min="0">
                    <small class="text-muted">Images will be numbered sequentially from this value</small>
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

        <!-- Image Upload Section -->
        <div id="image_upload_section" style="display: none;">
            <div class="form-group">
                <label class="form-label">Select Images <span class="text-danger">*</span></label>
                <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" 
                       accept="image/*" multiple>
                <small class="text-muted">You can select multiple image files. Max file size: 5MB per file</small>
                @error('images.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div id="imageTitlesContainer" class="form-group" style="display: none;">
                <label class="form-label">Image Titles (Optional)</label>
                <small class="text-muted d-block mb-2">Add titles for each image (optional)</small>
                <div id="imageTitlesList"></div>
            </div>
        </div>

        <!-- Video Upload Section -->
        <div id="video_upload_section" style="display: none;">
            <div class="form-group">
                <label class="form-label">Upload Video Files <span class="text-danger">*</span></label>
                <input type="file" name="videos[]" id="videos" class="form-control @error('videos.*') is-invalid @enderror" 
                       accept="video/*" multiple>
                <small class="text-muted">You can select multiple video files. Max file size: 50MB per file</small>
                @error('videos.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div id="videoFileTitlesContainer" class="form-group" style="display: none;">
                <label class="form-label">Video Titles (Optional)</label>
                <small class="text-muted d-block mb-2">Add titles for uploaded video files (optional)</small>
                <div id="videoFileTitlesList"></div>
            </div>

            <div class="form-group">
                <label class="form-label">OR Enter Video URLs</label>
                <small class="text-muted d-block mb-2">Enter one video URL per line. YouTube titles will be fetched automatically.</small>
                <textarea name="video_urls" id="video_urls" class="form-control @error('video_urls') is-invalid @enderror" 
                          rows="5" placeholder="https://www.youtube.com/watch?v=...
https://www.youtube.com/watch?v=...
https://vimeo.com/..."></textarea>
                <small class="text-muted">YouTube video titles will be automatically fetched. Leave empty if uploading video files.</small>
                @error('video_urls')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin" id="submitBtn">
                <i class="bi bi-upload"></i> Upload All Items
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
    const imageSection = document.getElementById('image_upload_section');
    const videoSection = document.getElementById('video_upload_section');
    const imagesInput = document.getElementById('images');
    const videosInput = document.getElementById('videos');
    const videoUrlsTextarea = document.getElementById('video_urls');

    // Handle media type change
    mediaTypeSelect.addEventListener('change', function() {
        const mediaType = this.value;
        
        if (mediaType === 'image') {
            imageSection.style.display = 'block';
            videoSection.style.display = 'none';
            imagesInput.required = true;
            videosInput.required = false;
            videoUrlsTextarea.required = false;
        } else if (mediaType === 'video') {
            imageSection.style.display = 'none';
            videoSection.style.display = 'block';
            imagesInput.required = false;
            videosInput.required = false; // Not required if URLs are provided
            videoUrlsTextarea.required = false;
        } else {
            imageSection.style.display = 'none';
            videoSection.style.display = 'none';
            imagesInput.required = false;
            videosInput.required = false;
            videoUrlsTextarea.required = false;
        }
    });

    // Trigger on page load
    if (mediaTypeSelect.value) {
        mediaTypeSelect.dispatchEvent(new Event('change'));
    }

    // Handle image file selection
    imagesInput.addEventListener('change', function(e) {
        const files = e.target.files;
        const container = document.getElementById('imageTitlesContainer');
        const list = document.getElementById('imageTitlesList');
        
        if (files.length > 0) {
            container.style.display = 'block';
            list.innerHTML = '';
            
            Array.from(files).forEach((file, index) => {
                const fileName = file.name.replace(/\.[^/.]+$/, '');
                const div = document.createElement('div');
                div.className = 'mb-2';
                div.innerHTML = `
                    <label class="form-label small">${file.name}</label>
                    <input type="text" name="image_titles[]" class="form-control form-control-sm" 
                           value="" placeholder="Image title (optional)">
                `;
                list.appendChild(div);
            });
        } else {
            container.style.display = 'none';
        }
    });

    // Handle video file selection - show title fields only for file uploads
    videosInput.addEventListener('change', function(e) {
        const files = e.target.files;
        const container = document.getElementById('videoFileTitlesContainer');
        const list = document.getElementById('videoFileTitlesList');
        
        if (files.length > 0) {
            container.style.display = 'block';
            list.innerHTML = '';
            
            Array.from(files).forEach((file, index) => {
                const fileName = file.name.replace(/\.[^/.]+$/, '');
                const div = document.createElement('div');
                div.className = 'mb-2';
                div.innerHTML = `
                    <label class="form-label small">${file.name}</label>
                    <input type="text" name="video_titles[]" class="form-control form-control-sm" 
                           value="" placeholder="Video title (optional)">
                `;
                list.appendChild(div);
            });
        } else {
            container.style.display = 'none';
        }
    });

    // Handle video URLs textarea - no title fields needed, titles will be auto-fetched
    videoUrlsTextarea.addEventListener('input', function() {
        // Hide file title container when URLs are entered
        if (this.value.trim() && !videosInput.files.length) {
            document.getElementById('videoFileTitlesContainer').style.display = 'none';
        }
    });

    // Form validation
    document.getElementById('bulkUploadForm').addEventListener('submit', function(e) {
        const mediaType = mediaTypeSelect.value;
        
        if (mediaType === 'image' && !imagesInput.files.length) {
            e.preventDefault();
            alert('Please select at least one image file.');
            return false;
        }
        
        if (mediaType === 'video' && !videosInput.files.length && !videoUrlsTextarea.value.trim()) {
            e.preventDefault();
            alert('Please either upload video files or enter video URLs.');
            return false;
        }
    });
</script>
@endpush

