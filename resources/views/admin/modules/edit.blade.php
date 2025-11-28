@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Module</h3>
    </div>

    <form action="{{ route('modules.update', $module->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label for="name">Module Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $module->name) }}"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Enter module name" required>
                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $module->slug) }}"
                    class="form-control @error('slug') is-invalid @enderror" placeholder="module-slug">
                @error('slug') <span class="text-danger small">{{ $message }}</span> @enderror
                <small class="form-text text-muted">URL friendly identifier. Will be generated from name if left empty.</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Short description">{{ old('description', $module->description) }}</textarea>
                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="card-footer">
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Module</button>
        </div>
    </form>
</div>

<script>
    (function() {
        function slugify(text) {
            return text.toString().toLowerCase()
                .trim()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-'); // Replace multiple - with single -
        }

        var nameInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                if (!slugInput.value || slugInput.dataset.auto === '1') {
                    slugInput.value = slugify(nameInput.value);
                    slugInput.dataset.auto = '1';
                }
            });

            slugInput.addEventListener('input', function() {
                // mark manual edit
                slugInput.dataset.auto = '0';
            });
        }
    })();
</script>

@endsection