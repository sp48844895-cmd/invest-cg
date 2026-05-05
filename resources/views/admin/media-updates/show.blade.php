@extends('admin.layouts.app')

@section('title', 'View Media Update')
@section('page-title', 'View Media Update')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Media Update Details</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.media-updates.edit', $mediaUpdate) }}" class="btn-secondary-admin">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.media-updates.index') }}" class="btn-secondary-admin">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="mb-4">
                <h4>{{ $mediaUpdate->title }}</h4>
                <div class="d-flex gap-2 mb-3">
                    @if($mediaUpdate->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-danger">Unpublished</span>
                    @endif
                    <span class="text-muted">
                        <i class="bi bi-calendar"></i> 
                        {{ $mediaUpdate->published_at ? $mediaUpdate->published_at->format('F d, Y') : 'Not set' }}
                    </span>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="text-muted mb-2">Summary</h6>
                <p>{{ $mediaUpdate->summary }}</p>
            </div>

            <div class="mb-4">
                <h6 class="text-muted mb-2">Source URL</h6>
                <a href="{{ $mediaUpdate->source_url }}" target="_blank" class="text-break">
                    {{ $mediaUpdate->source_url }}
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>

            <div class="mb-4">
                <h6 class="text-muted mb-2">Image URL</h6>
                @if($mediaUpdate->image_url)
                    <a href="{{ $mediaUpdate->image_url }}" target="_blank" class="text-break">
                        {{ $mediaUpdate->image_url }}
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                @else
                    <span class="text-muted">Not set</span>
                @endif
            </div>

            <div class="mb-4">
                <h6 class="text-muted mb-2">Created</h6>
                <p class="mb-0">{{ $mediaUpdate->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>

            <div class="mb-4">
                <h6 class="text-muted mb-2">Last Updated</h6>
                <p class="mb-0">{{ $mediaUpdate->updated_at->format('F d, Y \a\t h:i A') }}</p>
            </div>
        </div>

        <div class="col-md-4">
            @if($mediaUpdate->display_image)
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Thumbnail</h6>
                    <img src="{{ $mediaUpdate->display_image }}" alt="{{ $mediaUpdate->title }}" 
                         class="img-fluid rounded" style="max-width: 100%;">
                </div>
            @endif

            <div class="d-grid gap-2">
                <a href="{{ route('admin.media-updates.edit', $mediaUpdate) }}" class="btn-primary-admin">
                    <i class="bi bi-pencil"></i> Edit Media Update
                </a>
                <form action="{{ route('admin.media-updates.destroy', $mediaUpdate) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this media update?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger-admin w-100">
                        <i class="bi bi-trash"></i> Delete Media Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection






