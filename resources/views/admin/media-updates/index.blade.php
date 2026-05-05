@extends('admin.layouts.app')

@section('title', 'Media Updates')
@section('page-title', 'Media Updates')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Media Updates</h5>
        <a href="{{ route('admin.media-updates.create') }}" class="btn-primary-admin">
            <i class="bi bi-plus-circle"></i> Add New Update
        </a>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.media-updates.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title or summary..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i> 
                </button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.media-updates.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Published Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mediaUpdates as $mediaUpdate)
                <tr>
                    <td>
                        @if($mediaUpdate->display_image)
                            <img src="{{ $mediaUpdate->display_image }}" alt="{{ $mediaUpdate->title }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($mediaUpdate->title, 50) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($mediaUpdate->summary, 80) }}</td>
                    <td>{{ $mediaUpdate->published_at ? $mediaUpdate->published_at->format('d M Y') : '-' }}</td>
                    <td>
                        @if($mediaUpdate->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.media-updates.show', $mediaUpdate) }}" class="btn-secondary-admin btn-sm" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.media-updates.edit', $mediaUpdate) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.media-updates.destroy', $mediaUpdate) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this media update?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-admin btn-sm" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No media updates found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $mediaUpdates->appends(request()->query())->links() }}
    </div>
</div>
@endsection

