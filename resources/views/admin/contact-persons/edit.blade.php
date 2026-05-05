@extends('admin.layouts.app')

@section('title', 'Edit Contact Person')
@section('page-title', 'Edit Contact Person')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h5 class="card-title">Edit Contact Person: {{ $contactPerson->name }}</h5>
        <a href="{{ route('admin.contact-persons.index') }}" class="btn-secondary-admin">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    <form method="POST" action="{{ route('admin.contact-persons.update', $contactPerson->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name', $contactPerson->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                           id="designation" name="designation" value="{{ old('designation', $contactPerson->designation) }}" required>
                    @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $contactPerson->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror"
                                   id="mobile" name="mobile" value="{{ old('mobile', $contactPerson->mobile) }}" placeholder="e.g., 9876543210">
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category', $contactPerson->category) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" id="location-field" style="{{ $contactPerson->category === 'dtic' ? '' : 'display: none;' }}">
                    <label for="location" class="form-label">Location (for DTIC only)</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                           id="location" name="location" value="{{ old('location', $contactPerson->location) }}"
                           placeholder="e.g., DTIC-Raipur">
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" id="sectors-field" style="{{ $contactPerson->category === 'directorate' ? '' : 'display: none;' }}">
                    <label for="sectors" class="form-label">Sectors (for Directorate only)</label>
                    <input type="text" class="form-control @error('sectors') is-invalid @enderror"
                           id="sectors" name="sectors" value="{{ old('sectors', $contactPerson->sectors) }}"
                           placeholder="e.g., Pharmaceuticals, IT, Steel">
                    @error('sectors')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Display Order Position</label>
                    <div class="mb-2">
                        <label class="form-label">Position: <span class="text-danger">*</span></label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order_position" id="order_position_first" value="first" {{ old('order_position', 'first') === 'first' ? 'checked' : '' }}>
                                <label class="form-check-label" for="order_position_first">
                                    First
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order_position" id="order_position_after" value="after" {{ old('order_position') === 'after' ? 'checked' : '' }}>
                                <label class="form-check-label" for="order_position_after">
                                    After a person
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="order_reference_field" class="mb-3" style="display: {{ old('order_position') === 'after' ? 'block' : 'none' }};">
                        <label for="order_reference_id" class="form-label">Select person to position after</label>
                        <select class="form-select @error('order_reference_id') is-invalid @enderror" id="order_reference_id" name="order_reference_id">
                            <option value="">-- Select a person --</option>
                        </select>
                        <div class="form-text">Choose any person from the same category to position after</div>
                        @error('order_reference_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="image" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/*">
                    <div class="form-text">Accepted formats: JPG, PNG, GIF. Max size: 2MB</div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if($contactPerson->image)
                    <div class="mb-3">
                        <label class="form-label">Current Photo:</label>
                        <div>
                            <img src="{{ Storage::url($contactPerson->image) }}" alt="{{ $contactPerson->name }}"
                                 style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
                        </div>
                    </div>
                @endif

                <div id="image-preview" class="mb-3" style="display: none;">
                    <label class="form-label">New Preview:</label>
                    <div>
                        <img id="preview-img" src="" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-primary-admin">
                <i class="bi bi-check-circle"></i> Update Contact Person
            </button>
            <a href="{{ route('admin.contact-persons.index') }}" class="btn-secondary-admin">
                <i class="bi bi-x-circle"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .admin-card {
        max-width: none;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category');
    const locationField = document.getElementById('location-field');
    const sectorsField = document.getElementById('sectors-field');
    const orderPositionRadios = document.querySelectorAll('input[name="order_position"]');
    const orderReferenceField = document.getElementById('order_reference_field');
    const orderReferenceSelect = document.getElementById('order_reference_id');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    // Fetch persons by category
    async function loadPersonsByCategory(category) {
        if (!category) {
            orderReferenceSelect.innerHTML = '<option value="">-- Select a person --</option>';
            return;
        }

        try {
            const response = await fetch(`{{ route('admin.contact-persons.index') }}?category=${encodeURIComponent(category)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('Failed to fetch');

            const data = await response.json();
            let html = '<option value="">-- Select a person --</option>';
            
            if (data.contacts && data.contacts.data) {
                data.contacts.data.forEach(contact => {
                    // Skip current person
                    if (contact.id !== {{ $contactPerson->id }}) {
                        html += `<option value="${contact.id}">${contact.name}</option>`;
                    }
                });
            }
            
            orderReferenceSelect.innerHTML = html;
        } catch (error) {
            console.error('Error loading persons:', error);
            orderReferenceSelect.innerHTML = '<option value="">-- Error loading persons --</option>';
        }
    }

    // Handle category change
    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;
        locationField.style.display = selectedCategory === 'dtic' ? 'block' : 'none';
        sectorsField.style.display = selectedCategory === 'directorate' ? 'block' : 'none';
        
        loadPersonsByCategory(selectedCategory);
    });

    // Handle order position change
    orderPositionRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            orderReferenceField.style.display = this.value === 'after' ? 'block' : 'none';
        });
    });

    // Load persons on page load
    if (categorySelect.value) {
        loadPersonsByCategory(categorySelect.value);
    }

    // Image preview
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });
});
</script>
@endpush