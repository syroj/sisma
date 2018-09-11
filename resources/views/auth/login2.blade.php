@extends('layouts.app1')
@section('content')
<div class="content-wrapper" style="margin-left: 0px;">
    <div class="col-md-4" style="margin-left: 33.3333%; margin-right: 33.3333%; margin-top: 10%;">
      <div class="box box-primary">
        <div class="box-header">
          <p>Silahkan Masuk Ke Akun Anda</p>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="POST" action="{{route('login')}}">
            {{csrf_field()}}
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>
                    Email
                  </td>
                  <td>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif                 
                  </td>
                </tr>
                <tr>
                  <td>
                    Password
                  </td>
                  <td>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif  
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" class="btn btn-primary pull-right" type="button"><span><i class="icon-login"></i></span> Login</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
</div> 
@endsection