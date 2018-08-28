@extends('layouts.app2')

@section('content')
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-accent-success mx-4">
            <div class="card-header"><img src="{{asset('src/img/alma.png')}}" style="width: 10%"> <span> Form Registrasi User</span></div>
            <div class="card-body p-4">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Nama Lengkap" name="name" required>
                        </div>
                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-envelope"></i>
                              </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Email" name="email" required>
                        </div>
                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-refresh"></i>
                              </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Ulang Password" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="icon-login"></i>
                                  Register
                                </button>
                            </div>
                        </div>
                    </form>
            </div> 
            <div class="card-footer p-4">
            <p class="pull-right">Follow us: 
            <a href=""><i class="fa fa-facebook-official"></i> Facebook </a>
            <a href=""><i class="fa fa-twitter"></i> Twitter </a>
            <a href=""><i class="fa fa-instagram"></i> instagram </a>
          </p>
          </div>
          </div>
        </div>
      </div>
    </div>
@endsection
