@extends('layouts.app2')
@section('content')
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>

                <p class="text-muted">Silahkan Masuk Ke Akun Anda</p>
                <form class="form-horizontal" method="POST" action="{{route('login')}}">
                  {{csrf_field()}}
                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2"><i class="icon-envelope"></i> </span>
                      </div>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                      
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="icon-lock"></i> </span>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif  
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary px-4" type="button"><span><i class="icon-login"></i></span> Login</button>
                    </div>
                    <div class="col-6 text-right">
                      <a href="{{ route('password.request') }}" class="btn btn-link px-0" type="button">Lupa Password?</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <img src="{{asset('src/img/alma.png')}}" class="rounded-0" style="width: 35%; height: 30%">
                  <h2>Selamat Datang</h2>
                  <p>Selamat Datang di Sistem Informasi MA Ali Maksum. Anda Belum Punya Akun?</p> <p><a class="btn btn-secondary" href="{{url('/register')}}"><i class="fa fa-pencil-square-o"></i> Daftar Akun</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer p-4">
          <a >Sistem Informasi MA Ali Maksum &copy {{date('Y')}}</a> 
          <p class="pull-right">Follow us: 
            <a href=""><i class="fa fa-facebook-official"></i> Facebook </a>
            <a href=""><i class="fa fa-twitter"></i> Twitter </a>
            <a href=""><i class="fa fa-instagram"></i> instagram </a>
          </p>
          </div>
        </div>
      </div>
    </div>
    @endsection