@extends('admin.layouts.app')

@section('title', 'Policy Documents')
@section('page-title', 'Policy Documents')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Policy Documents</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.policy-documents.bulk-upload') }}" class="btn-secondary-admin">
                <i class="bi bi-upload"></i> Bulk Upload
            </a>
            <a href="{{ route('admin.policy-documents.create') }}" class="btn-primary-admin">
                <i class="bi bi-plus-circle"></i> Add New Document
            </a>
        </div>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.policy-documents.index') }}" class="row g-3">
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="acts" {{ request('category') == 'acts' ? 'selected' : '' }}>Acts</option>
                    <option value="industrial_policy" {{ request('category') == 'industrial_policy' ? 'selected' : '' }}>Industrial Policy Notification</option>
                    <option value="policy_act" {{ request('category') == 'policy_act' ? 'selected' : '' }}>Policy & Act</option>
                    <option value="rules" {{ request('category') == 'rules' ? 'selected' : '' }}>Rules</option>
                    <option value="administrative_reports" {{ request('category') == 'administrative_reports' ? 'selected' : '' }}>Administrative Reports</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="policy_period" class="form-select policy-period-select">
                    <option value="">All Policy Periods</option>
                    @foreach($policyPeriods as $period)
                        <option value="{{ $period }}" {{ request('policy_period') == $period ? 'selected' : '' }}>
                            {{ $period }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i> 
                </button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('admin.policy-documents.index') }}" class="btn-secondary-admin w-100">
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
                    <th>Category</th>
                    <th>Policy Period</th>
                    <th>Published Date</th>
                    <th>File Size</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>
                        <span class="badge badge-primary">
                            {{ ucfirst(str_replace('_', ' ', $document->category)) }}
                        </span>
                    </td>
                    <td>{{ $document->policy_period ?? '-' }}</td>
                    <td>{{ $document->published_date->format('d M Y') }}</td>
                    <td>{{ $document->formatted_file_size }}</td>
                    <td>
                        @if($document->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.policy-documents.show', $document) }}" target="_blank" class="btn-secondary-admin btn-sm" title="View PDF">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.policy-documents.edit', $document) }}" class="btn-secondary-admin btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.policy-documents.destroy', $document) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this document?');">
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
                    <td colspan="7" class="text-center text-muted py-4">No documents found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $documents->appends(request()->query())->links() }}
    </div>
</div>
@endsection


