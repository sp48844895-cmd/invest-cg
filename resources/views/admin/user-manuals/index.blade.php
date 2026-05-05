@extends('admin.layouts.app')

@section('title', 'User Manuals')
@section('page-title', 'User Manuals')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">User Manuals</h5>
        <a href="{{ route('admin.user-manuals.create') }}" class="btn-primary-admin">
            <i class="bi bi-plus-circle"></i> Add Manual
        </a>
    </div>

    <form id="bulk-delete-form" action="{{ route('admin.user-manuals.bulk-delete') }}" method="POST" onsubmit="return confirm('Delete selected manuals?');" class="mb-3">
        @csrf
        <button type="submit" class="btn-danger-admin">
            <i class="bi bi-trash"></i> Delete Selected
        </button>
    </form>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllManuals"></th>
                    <th>Department</th>
                    <th>Service</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($manuals as $manual)
                <tr>
                    <td>
                        <input type="checkbox" name="selected_manuals[]" form="bulk-delete-form" value="{{ $manual->id }}">
                    </td>
                    <td>{{ $manual->dept_name }}</td>
                    <td>{{ $manual->service_name }}</td>
                    <td>{{ $manual->type }}</td>
                    <td>
                        @if($manual->status)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons d-flex gap-2">
                            <a href="{{ route('admin.user-manuals.show', $manual) }}" target="_blank" class="btn-secondary-admin btn-sm" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.user-manuals.edit', $manual) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.user-manuals.destroy', $manual) }}" method="POST" onsubmit="return confirm('Delete this manual?');">
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
                    <td colspan="6" class="text-center text-muted py-4">No user manuals found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $manuals->links() }}
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('selectAllManuals')?.addEventListener('change', function () {
        const checked = this.checked;
        document.querySelectorAll('input[name="selected_manuals[]"]').forEach(function (checkbox) {
            checkbox.checked = checked;
        });
    });
</script>
@endpush
@endsection
