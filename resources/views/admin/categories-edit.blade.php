@extends('layouts.admin')
@section('title', 'Panel de Control')
@section('content') 

<div id="wrapper">
        <div class="container">
        <div class="row"> 
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <form action="{{ url('admin/new-category')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $item->id }}" />
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                     <div class="form-group">
                           <h3>Agregar Categoría</h3>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                        </div>
                        
                         <div class="form-group">
                            <button type="submit"  class="btn btn-green btn-lg" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
               
               
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div> 
</div> 

@endsection