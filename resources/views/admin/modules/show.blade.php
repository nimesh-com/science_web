@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="m-0">Module Details</h1>
            <div>
                <a href="{{ route('modules.index') }}" class="btn btn-sm btn-secondary">Back to Modules</a>
                <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-sm btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $module->name ?? '—' }}</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width:180px">Name</th>
                                    <td>{{ $module->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{!! nl2br(e($module->description ?? '-')) !!}</td>
                                </tr>
                              
                    
                                <tr>
                                    <th>Created</th>
                                    <td>{{ optional($module->created_at)->format('M d, Y H:i') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Updated</th>
                                    <td>{{ optional($module->updated_at)->format('M d, Y H:i') ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning btn-block mb-2">
                            <i class="fas fa-edit"></i> Edit Module
                        </a>

                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this module?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-block mb-2" type="submit">
                                <i class="fas fa-trash"></i> Delete Module
                            </button>
                        </form>

                        <a href="{{ route('modules.index') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection