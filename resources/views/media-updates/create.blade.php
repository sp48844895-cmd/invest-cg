@extends('layouts.app')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4 text-center">Submit Media Update</h2>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('media-updates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Headline</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary</label>
                                <textarea id="summary" name="summary" rows="4" class="form-control" required>{{ old('summary') }}</textarea>
                                @error('summary') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="source_url" class="form-label">Source URL</label>
                                <input type="url" id="source_url" name="source_url" class="form-control" value="{{ old('source_url') }}" required>
                                @error('source_url') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">Thumbnail URL (optional)</label>
                                <input type="url" id="image_url" name="image_url" class="form-control" value="{{ old('image_url') }}">
                                @error('image_url') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_upload" class="form-label">Or Upload Thumbnail</label>
                                <input type="file" id="image_upload" name="image_upload" class="form-control" accept="image/*">
                                <small class="text-muted">Max 2MB. Uploaded image overrides thumbnail URL.</small>
                                @error('image_upload') <small class="text-danger d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="published_at" class="form-label">Publish Date</label>
                                <input type="date" id="published_at" name="published_at" class="form-control"
                                    value="{{ old('published_at', now()->toDateString()) }}" required>
                                @error('published_at') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published"
                                    value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Publish immediately</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('media-updates.index') }}" class="btn btn-outline-secondary">Back to News</a>
                                <button type="submit" class="btn btn-primary">Save Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

