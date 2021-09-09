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

                        <form action="{{ route('admin.pages.update', [$page]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">{{ __('Edit Page') }}</div>
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-info">{{ session('message') }}</div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">{{ _('Title') }}</label>
                                            <input value="{{ $page->title }}" class="form-control" name="title"
                                                   type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">{{ _('Content') }}</label>
                                            <textarea class="form-control" rows="5" name="content"
                                                      type="text" id="page-editor">{{ $page->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit">{{ __('Save Page') }}</button>
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
            .create( document.querySelector( '#page-editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
