@extends('admin.layouts.app')

@section('title', 'Create Press Release')
@section('page-title', 'Create Press Release')

@push('head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Create Press Release</h5>
        <a href="{{ route('admin.press-releases.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.press-releases.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" 
                   value="{{ old('slug') }}" placeholder="Auto-generated from title">
            <small class="text-muted">Leave empty to auto-generate from title</small>
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Summary <span class="text-danger">*</span></label>
            <textarea name="summary" rows="4" class="form-control @error('summary') is-invalid @enderror" required>{{ old('summary') }}</textarea>
            <small class="text-muted">Brief summary that will appear in listings</small>
            @error('summary')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Content <span class="text-danger">*</span></label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Thumbnail URL (optional)</label>
                    <input type="url" name="thumbnail_url" class="form-control @error('thumbnail_url') is-invalid @enderror" 
                           value="{{ old('thumbnail_url') }}" placeholder="https://example.com/image.jpg">
                    <small class="text-muted">Use this if you want to use an external image URL</small>
                    @error('thumbnail_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Or Upload Thumbnail</label>
                    <input type="file" name="thumbnail_upload" class="form-control @error('thumbnail_upload') is-invalid @enderror" 
                           accept="image/*">
                    <small class="text-muted">Max 2MB. Uploaded image overrides thumbnail URL.</small>
                    @error('thumbnail_upload')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
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

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" 
                           value="{{ old('author') }}" placeholder="Optional">
                    @error('author')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Tags</label>
            <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" 
                   value="{{ old('tags') }}" placeholder="Comma-separated tags (e.g., news, policy, investment)">
            <small class="text-muted">Separate multiple tags with commas</small>
            @error('tags')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" 
                           value="{{ old('meta_title') }}" placeholder="Optional - for SEO">
                    @error('meta_title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="is_published" class="form-select">
                        <option value="0" {{ old('is_published', false) == false ? 'selected' : '' }}>Unpublished</option>
                        <option value="1" {{ old('is_published') == true ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Meta Description (SEO)</label>
            <textarea name="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" 
                      placeholder="Optional - for SEO">{{ old('meta_description') }}</textarea>
            @error('meta_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Create Press Release
            </button>
            <a href="{{ route('admin.press-releases.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
            const slug = this.value.toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });

    // Reset auto-generated flag if user manually edits slug
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });

    // Initialize TinyMCE
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        branding: false
    });
</script>
@endpush





