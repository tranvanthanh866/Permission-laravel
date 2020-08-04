@extends("Core::admin.template")
@section('h1')
    {{ trans('cruds.permission.title') }}
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('global.show') }} {{ trans('cruds.permission.title') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.id') }}
                            </th>
                            <td>
                                {{ $permission->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.title') }}
                            </th>
                            <td>
                                {{ $permission->name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
