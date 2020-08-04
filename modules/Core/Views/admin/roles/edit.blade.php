@extends("Core::admin.template")
@section('h1')
    {{ trans('cruds.role.title_singular') }}
@endsection
@section('head')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                            <label for="permission">{{ trans('cruds.role.fields.permissions') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span
                                    class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="permission[]" id="permission" class="form-control select2" multiple="multiple"
                                    required>
                                @foreach($permissions as $id => $permissions)
                                    <option
                                        value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('permission'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('permission') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.permissions_helper') }}
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
@section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script>
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.select2').select2()
    </script>
@endsection
