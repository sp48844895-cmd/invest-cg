@extends('admin.layouts.app')

@section('title', 'View Press Release')
@section('page-title', 'View Press Release')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">View Press Release</h5>
        <div>
            <a href="{{ route('admin.press-releases.edit', $pressRelease) }}" class="btn-secondary-admin">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.press-releases.index') }}" class="btn-secondary-admin">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="mb-4">
                <h3>{{ $pressRelease->title }}</h3>
                <div class="d-flex gap-3 mt-2">
                    <span class="badge {{ $pressRelease->is_published ? 'badge-success' : 'badge-danger' }}">
                        {{ $pressRelease->is_published ? 'Published' : 'Unpublished' }}
                    </span>
                    <span class="text-muted">
                        <i class="bi bi-calendar"></i> {{ $pressRelease->formatted_published_date }}
                    </span>
                    <span class="text-muted">
                        <i class="bi bi-eye"></i> {{ $pressRelease->view_count }} views
                    </span>
                </div>
            </div>

            @if($pressRelease->thumbnail)
                <div class="mb-4">
                    <img src="{{ $pressRelease->thumbnail }}" alt="{{ $pressRelease->title }}" 
                         class="img-fluid" style="max-height: 400px; border-radius: 8px;"
                         onerror="this.onerror=null; this.src='{{ asset('assets/img/message_bg.jpg') }}';">
                </div>
            @endif

            <div class="mb-4">
                <h5>Summary</h5>
                <p>{{ $pressRelease->summary }}</p>
            </div>

            <div class="mb-4">
                <h5>Content</h5>
                <div class="content-preview">
                    {!! $pressRelease->content !!}
                </div>
            </div>

            @if($pressRelease->tags)
                <div class="mb-4">
                    <h5>Tags</h5>
                    @foreach($pressRelease->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="admin-card">
                <h6>Details</h6>
                <table class="table table-sm">
                    <tr>
                        <td><strong>Slug:</strong></td>
                        <td>{{ $pressRelease->slug }}</td>
                    </tr>
                    @if($pressRelease->author)
                    <tr>
                        <td><strong>Author:</strong></td>
                        <td>{{ $pressRelease->author }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td><strong>Published:</strong></td>
                        <td>{{ $pressRelease->formatted_published_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Views:</strong></td>
                        <td>{{ $pressRelease->view_count }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $pressRelease->created_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>

            @if($pressRelease->meta_title || $pressRelease->meta_description)
                <div class="admin-card mt-3">
                    <h6>SEO</h6>
                    @if($pressRelease->meta_title)
                        <p><strong>Meta Title:</strong> {{ $pressRelease->meta_title }}</p>
                    @endif
                    @if($pressRelease->meta_description)
                        <p><strong>Meta Description:</strong> {{ $pressRelease->meta_description }}</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

