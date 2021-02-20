@extends('layouts.admin')
@section('title', 'Panel de Control')
@section('content') 

<div id="wrapper">
        <div class="container">
        <div class="row"> 
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">

			<form method="GET" action="/admin/create" target="_blank">
			{{ csrf_field() }}

			<div class="form-group">
			    <label>Imagen</label>
			    <input type="text" name="files" class="form-control" placeholder="http://marascoquirogaprop.com.ar/uploads/YU14XkkbsebJMyB0P65k.jpg">
			</div>
			<div class="form-group">
			    <label>Ubicacion</label>
			    <input type="text" name="ubicacion" class="form-control" placeholder="Castelar Norte">
			</div>
			<div class="form-group">
			    <label>Precio</label>
			    <input type="text" name="precio" class="form-control" placeholder="USD 140.000">
			</div>
			<div class="form-group">
			    <label>Descripcion</label>
			    <textarea rows="3" name="descripcion" class="form-control" placeholder="Cerca de la Estación, buena oportunidad de inversión"></textarea>
			</div>
			 <div class="form-group">
			    <button type="submit"  class="btn btn-green btn-lg" value="generar">Generar Imagen</button>
			</div>

			</form>
			</div>
			</div>
			</div>
			</div>