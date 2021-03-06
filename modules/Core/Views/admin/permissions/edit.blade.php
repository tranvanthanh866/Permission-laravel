@extends("Core::admin.template")
@section('h1')
    {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.permission.fields.title_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
