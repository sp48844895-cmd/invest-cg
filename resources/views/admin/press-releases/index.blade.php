@extends('admin.layouts.app')

@section('title', 'Press Releases')
@section('page-title', 'Press Releases')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Press Releases</h5>
        <a href="{{ route('admin.press-releases.create') }}" class="btn-primary-admin">
            <i class="bi bi-plus-circle"></i> Add New Press Release
        </a>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.press-releases.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title, summary..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="tag" class="form-control" placeholder="Filter by tag..." value="{{ request('tag') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i> 
                </button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.press-releases.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Published Date</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pressReleases as $pressRelease)
                <tr>
                    <td>
                        @if($pressRelease->thumbnail)
                            <img src="{{ $pressRelease->thumbnail }}" alt="{{ $pressRelease->title }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($pressRelease->title, 50) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($pressRelease->summary, 80) }}</td>
                    <td>{{ $pressRelease->formatted_published_date }}</td>
                    <td>
                        @if($pressRelease->tags)
                            @foreach(array_slice($pressRelease->tags, 0, 2) as $tag)
                                <span class="badge badge-primary">{{ $tag }}</span>
                            @endforeach
                            @if(count($pressRelease->tags) > 2)
                                <span class="text-muted">+{{ count($pressRelease->tags) - 2 }}</span>
                            @endif
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($pressRelease->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Unpublished</span>
                        @endif
                    </td>
                    <td>{{ $pressRelease->view_count }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.press-releases.show', $pressRelease) }}" class="btn-secondary-admin btn-sm" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.press-releases.edit', $pressRelease) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.press-releases.destroy', $pressRelease) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this press release?');">
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
                    <td colspan="8" class="text-center text-muted py-4">No press releases found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $pressReleases->appends(request()->query())->links() }}
    </div>
</div>
@endsection

