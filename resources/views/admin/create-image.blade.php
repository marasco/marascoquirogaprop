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
			    <input type="text" name="files" class="form-control" value="">
			</div>
			<div class="form-group">
			    <label>Ubicacion</label>
			    <input type="text" name="ubicacion" class="form-control" value="">
			</div>
			<div class="form-group">
			    <label>Precio</label>
			    <input type="text" name="precio" class="form-control" value="">
			</div>
			<div class="form-group">
			    <label>Descripcion</label>
			    <textarea rows="3" name="descripcion" class="form-control"></textarea>
			</div>
			 <div class="form-group">
			    <button type="submit"  class="btn btn-green btn-lg" value="generar">Generar Imagen</button>
			</div>

			</form>
			</div>
			</div>
			</div>
			</div>