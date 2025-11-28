@extends('layouts.admin')
@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
</div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Modules</h3>
                <a href="{{ route('modules.create') }}" class="btn btn-primary btn-sm">Add Module</a>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width:220px">Slug</th>
                            <th style="width:200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($modules as $module)
                        <tr>
                            <td>{{ $loop->iteration + ($modules->firstItem() ? $modules->firstItem() - 1 : 0) }}</td>
                            <td>{{ $module->name ?? '-' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($module->description ?? '-', 100) }}</td>
                            <td>{{ $module->slug ?? '-' }}</td>
                            <td>
                                <a href="{{ route('modules.show', $module->id) }}" class="btn btn-sm btn-info mr-1">View</a>
                                <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>

                                <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this module?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No modules found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                @if(method_exists($modules, 'links'))
                <div class="float-right">{{ $modules->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection