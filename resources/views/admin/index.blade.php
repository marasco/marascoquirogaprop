@extends('layouts.admin')
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
                        <form role="form">
                            <div class="form-group">
                                <input type="text" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Contraseña" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span> Recordarme</label></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="btn-group-justified">
                                    <a href="explore.html" class="btn btn-lg btn-green">Entrar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="signFooter">Marasco Quiroga Propiedades<br>&copy; 2016</div>
            </div>
        </div>
@endsection