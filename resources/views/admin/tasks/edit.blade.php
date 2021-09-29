@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ __('Update Task') }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ _('Name') }}</label>
                                            <input value="{{ $task->name }}" class="form-control" name="name"
                                                   type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ _('Description') }}</label>
                                            <textarea class="form-control" rows="5" name="description"
                                                      type="text" id="task-editor">{{ $task->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit">{{ __('Save task') }}</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#task-editor' ), {
                extraPlugins: [ SimpleUploadAdapterPlugin ],
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
