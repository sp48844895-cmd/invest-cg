@extends('admin.layouts.app')

@section('title', 'Startup Notifications')
@section('page-title', 'Startup Notifications')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Startup Notifications</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.startup-notifications.create') }}" class="btn-primary-admin">
                <i class="bi bi-plus-circle"></i> Add Notification
            </a>
        </div>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.startup-notifications.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.startup-notifications.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notifications as $notification)
                <tr>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->notification_date->format('d M Y') }}</td>
                    <td>
                        <a href="{{ $notification->pdf_url }}" target="_blank" class="btn-secondary-admin btn-sm" title="View PDF">
                            <i class="bi bi-file-earmark-pdf"></i>
                            {{ $notification->formatted_pdf_size }}
                        </a>
                    </td>
                    <td>
                        @if($notification->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.startup-notifications.edit', $notification) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.startup-notifications.destroy', $notification) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this notification?');">
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
                    <td colspan="5" class="text-center text-muted py-4">No notifications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $notifications->appends(request()->query())->links() }}
    </div>
</div>
@endsection
