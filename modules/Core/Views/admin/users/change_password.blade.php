@extends("Core::admin.template")
@section('h1')
    User
@endsection
@section('section-content')
    @if(session('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Success</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <p>{{ session('message') }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change password</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('admin.change_password') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
                            <label for="current_password">Current password *</label>
                            <input type="password" id="current_password" name="current_password"
                                   class="form-control" required>
                            @if($errors->has('current_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                            <label for="new_password">New password *</label>
                            <input type="password" id="new_password" name="new_password" class="form-control"
                                   required>
                            @if($errors->has('new_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password') }}
                                </em>
                            @endif
                        </div>
                        <div
                            class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                            <label for="new_password_confirmation">New password confirmation *</label>
                            <input type="password" id="new_password_confirmation"
                                   name="new_password_confirmation" class="form-control" required>
                            @if($errors->has('new_password_confirmation'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password_confirmation') }}
                                </em>
                            @endif
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
