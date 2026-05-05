@extends('admin.layouts.app')

@section('title', 'Edit User Profile')
@section('page-title', 'Edit User Profile')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Edit User Profile</h5>
        <a href="{{ route('admin.dashboard') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <form action="{{ route('admin.users.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Leave empty to keep current password">
                    <small class="text-muted">Minimum 8 characters. Leave empty if you don't want to change the password.</small>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" 
                           placeholder="Confirm new password">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">User Type</label>
                    <input type="text" class="form-control" value="{{ $user->isAdmin() ? 'Administrator' : 'User' }}" disabled>
                    <small class="text-muted">User type cannot be changed from here.</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Account Created</label>
                    <input type="text" class="form-control" 
                           value="{{ $user->created_at->format('F d, Y \a\t h:i A') }}" disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Update Profile
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection






