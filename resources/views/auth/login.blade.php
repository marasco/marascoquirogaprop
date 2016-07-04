@extends('layouts.none')
@section('title', 'Panel de Control - SignIn')
@section('content')
<div class="modal fade" id="signin" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="signLogo osLight margin20">
                    <img src="<?=URL::to('/')?>/images/logo.png" height="40" />
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="signinLabel">Panel de Control</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="text" name="email" placeholder="Email" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="password" name="password"   placeholder="Contraseña" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span> Recordarme</label></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="btn-group col-xs-6">
                                    <button type="submit" class="btn btn-lg center btn-green" >
                                    <i class="fa fa-btn fa-sign-in"></i> Login</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="signFooter">Marasco Quiroga Propiedades<br>&copy; 2016</div>
            </div>
        </div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection 

 
