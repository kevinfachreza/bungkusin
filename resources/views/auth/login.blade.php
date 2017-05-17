@extends('layouts.app')

@section('content')
<div class="red darken-1" id="wrapper-single">
    <div class="container">
        <div class="row">
            <div class="col s12" align="center" style="margin-top:80px">
                <a href="{{url('login')}}" class="white-text"> <h4 class="thin"> Log in</h4> </a>
            </div>

            <div class="col s12">
                <form class="white-text" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="input-field col s12 ">
                        <input id="email" name="email"  type="email" class="validate" value="">
                        <label for="email" class="white-text" >Email</label>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <input id="password" name="password"  type="password" class="validate">
                        <label for="password" class="white-text">Password</label>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light red darken-4" type="submit" name="action" style="width: 100%">Log In
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
              </form>
          </div>

          <div class="row">
            <div class="col s12 center white-text" style="margin-top: 80px">
                <h6>Belum punya akun?</h6>
                <a href="{{url('register')}}" class="white-text"> <h4 class="thin"> Sign Up </h4> </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
