@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklist_group, $checklist]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Checklist') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ _('Name') }}</label>
                                        <input value="{{ $checklist->name }}" class="form-control" name="name" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Save') }}</button>
                        </div>

                    </form>
                </div>
                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklist_group, $checklist]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('{{ __('Are you sure!') }}')">
                        {{ __('Delete this checklist!') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection