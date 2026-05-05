@extends('admin.layouts.app')

@section('title', 'Startup Events')
@section('page-title', 'Startup Events')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Startup Events</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.startup-events.create') }}" class="btn-primary-admin">
                <i class="bi bi-plus-circle"></i> Add Event
            </a>
        </div>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.startup-events.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by event name..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="event_type" class="form-select">
                    <option value="">All Event Types</option>
                    @foreach($eventTypes as $type)
                        <option value="{{ $type }}" {{ request('event_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
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
                <a href="{{ route('admin.startup-events.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Event Date</th>
                    <th>Pre Event Promotion</th>
                    <th>Post Event Report</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>
                        <span class="badge badge-primary">{{ $event->event_type }}</span>
                    </td>
                    <td>{{ $event->event_date->format('d M Y') }}</td>
                    <td>
                        @if($event->pre_event_promotion_url)
                            <a href="{{ $event->pre_event_promotion_url }}" target="_blank" class="btn-secondary-admin btn-sm" title="View Pre Event Promotion">
                                <i class="bi bi-image"></i>
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($event->post_event_report_url)
                            <a href="{{ $event->post_event_report_url }}" target="_blank" class="btn-secondary-admin btn-sm" title="View Post Event Report">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($event->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.startup-events.edit', $event) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.startup-events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
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
                    <td colspan="7" class="text-center text-muted py-4">No events found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $events->appends(request()->query())->links() }}
    </div>
</div>
@endsection
