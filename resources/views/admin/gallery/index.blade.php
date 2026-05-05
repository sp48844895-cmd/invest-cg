@extends('admin.layouts.app')

@section('title', 'Gallery')
@section('page-title', 'Gallery Management')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Gallery Items</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.gallery.bulk-upload') }}" class="btn-secondary-admin">
                <i class="bi bi-upload"></i> Bulk Upload
            </a>
            <a href="{{ route('admin.gallery.create') }}" class="btn-primary-admin">
                <i class="bi bi-plus-circle"></i> Add New Item
            </a>
        </div>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.gallery.index') }}" class="row g-3">
            <div class="col-md-3">
                <select name="media_type" class="form-select">
                    <option value="">All Types</option>
                    <option value="image" {{ request('media_type') == 'image' ? 'selected' : '' }}>Images</option>
                    <option value="video" {{ request('media_type') == 'video' ? 'selected' : '' }}>Videos</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.gallery.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i> Reset
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Published Date</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>
                        @if($item->media_type === 'image' && $item->image_path)
                            @php
                                // Generate the correct storage URL
                                $imageUrl = Storage::url($item->image_path);
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $item->title ?? 'Gallery Image' }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 60px; height: 60px; background: #e5e7eb; border-radius: 6px; align-items: center; justify-content: center;">
                                <i class="bi bi-image" style="font-size: 1.2rem; color: #6c757d;"></i>
                            </div>
                        @else
                            <div style="width: 60px; height: 60px; background: #e5e7eb; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-play-circle" style="font-size: 1.5rem; color: #6c757d;"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $item->title ?? 'Untitled' }}</td>
                    <td>
                        <span class="badge badge-primary">{{ ucfirst($item->media_type) }}</span>
                    </td>
                    <td>{{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}</td>
                    <td>{{ $item->display_order }}</td>
                    <td>
                        @if($item->is_visible)
                            <span class="badge badge-success">Visible</span>
                        @else
                            <span class="badge badge-danger">Hidden</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn-secondary-admin btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-admin btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">No gallery items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $items->appends(request()->query())->links() }}
    </div>
</div>
@endsection


