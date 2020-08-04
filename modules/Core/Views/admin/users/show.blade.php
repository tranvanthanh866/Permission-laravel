@extends("Core::admin.template")
@section('h1')
    {{ trans('cruds.user.title') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Roles
                            </th>
                            <td>
                                @foreach($user->roles()->pluck('name') as $role)
                                    <span class="label label-info label-many">{{ $role }}</span>
                                @endforeach
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
