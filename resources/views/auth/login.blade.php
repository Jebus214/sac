@extends('layouts.app')

@section('content')
<body class="login">
    <div>

      <div>

<div>
  <img style="    margin-left: auto;
    margin-right: auto;
    width: 75%;
    display: block;" src="images/saclogin.png" alt="">
</div>
      <div style="margin-top:-11%" class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
              <h1>Accesos</h1>
              <div>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required="" />
                 @if ($errors->has('email'))
                    <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                    
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"/>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div>

                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login
                </button>
                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Guardar credenciales
                                    </label>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
    </div>
  </body>        
       
                    
  
@endsection


