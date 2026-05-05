@extends('admin.layouts.app')

@section('title', 'Add Startup Event')
@section('page-title', 'Add Startup Event')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Add Startup Event</h5>
        <a href="{{ route('admin.startup-events.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.startup-events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Event Type <span class="text-danger">*</span></label>
                    <select name="event_type" class="form-select @error('event_type') is-invalid @enderror" required>
                        <option value="">Select Event Type</option>
                        @foreach($eventTypes as $type)
                            <option value="{{ $type }}" {{ old('event_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('event_type')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Event Date <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror" value="{{ old('event_date') }}" required>
                    @error('event_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Event Name <span class="text-danger">*</span></label>
            <input type="text" name="event_name" class="form-control @error('event_name') is-invalid @enderror" value="{{ old('event_name') }}" required>
            @error('event_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Pre Event Promotion (JPG)</label>
                    <input type="file" name="pre_event_promotion" class="form-control @error('pre_event_promotion') is-invalid @enderror" accept=".jpg,.jpeg">
                    @error('pre_event_promotion')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Post Event Report (PDF)</label>
                    <input type="file" name="post_event_report" class="form-control @error('post_event_report') is-invalid @enderror" accept=".pdf">
                    @error('post_event_report')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', 0) }}" min="0">
                    @error('display_order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Save
            </button>
            <a href="{{ route('admin.startup-events.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
