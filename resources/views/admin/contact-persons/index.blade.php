@extends('admin.layouts.app')

@section('title', 'Contact Persons')
@section('page-title', 'Contact Person Management')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Contact Persons</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.contact-persons.create') }}" class="btn-primary-admin">
                <i class="bi bi-plus-circle"></i> Add New Contact
            </a>
        </div>
    </div>

    <div class="mb-3">
        <form method="GET" action="{{ route('admin.contact-persons.index') }}" class="row g-3">
            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucwords(str_replace(['-', '_'], ' ', $category)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-secondary-admin w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.contact-persons.index') }}" class="btn-secondary-admin w-100">
                    <i class="bi bi-arrow-clockwise"></i> Reset
                </a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Category</th>
                    <th>Contact Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    <td>
                        @if($contact->image)
                            @php
                                $imageUrl = Storage::url($contact->image);
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $contact->name }}"
                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 50px; height: 50px; background: #e5e7eb; border-radius: 6px; align-items: center; justify-content: center;">
                                <i class="bi bi-person-circle" style="font-size: 1.2rem; color: #6c757d;"></i>
                            </div>
                        @else
                            <div style="width: 50px; height: 50px; background: #e5e7eb; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person-circle" style="font-size: 1.5rem; color: #6c757d;"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->designation }}</td>
                    <td>
                        <span class="badge badge-primary">{{ ucwords(str_replace(['-', '_'], ' ', $contact->category)) }}</span>
                    </td>
                    <td>
                        @if($contact->email)
                            <div><i class="bi bi-envelope"></i> {{ $contact->email }}</div>
                        @endif
                        @if($contact->mobile)
                            <div><i class="bi bi-telephone"></i> {{ $contact->mobile }}</div>
                        @endif
                        @if(!$contact->email && !$contact->mobile)
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.contact-persons.edit', $contact->id) }}" class="btn-secondary-admin btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.contact-persons.destroy', $contact->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-admin btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this contact?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <div class="empty-state">
                            <i class="bi bi-person-lines-fill" style="font-size: 3rem; color: #6c757d;"></i>
                            <h6 class="mt-3">No Contact Persons Found</h6>
                            <p class="text-muted">Start by adding your first contact person.</p>
                            <a href="{{ route('admin.contact-persons.create') }}" class="btn-primary-admin">
                                <i class="bi bi-plus-circle"></i> Add Contact Person
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($contacts->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links() }}
    </div>
    @endif
</div>
@endsection