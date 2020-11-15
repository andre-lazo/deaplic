@extends('layouts.app')
 @section('content')
 <h1 class=" text-center mb-5">FORMULARIO DE ACTUALIZACION DE NOTA</h1>

 
 {!! Form::open(['action'=>[[App\Http\Controllers\NotasController::class, 'update'],$nota->id], 'method'=>'PATCh']) !!}
  
  {{ Form::token() }}
  
 <div class="card text-center mx-auto border-success" style="max-width: 350px">
    <div class="card-header">
      <input maxlength="90" type="text" name="titulo" class="form-control" value="{{$nota->titulo}}">
    </div>
    <div class="card-body">
     <textarea maxlength="355" name="texto" class="form-control" cols="30" rows="6">{{$nota->texto}}</textarea>
    </div>
    <div class="card-footer text-muted small">
       <p>FECHA DE ULTIMA MODIFICACION:  {{$nota->updated_at}}</p>
       <a href="{{URL::action([App\Http\Controllers\NotasController::class, 'update'], $nota->id)}}">
        <button type="submit" class="float-right btn btn-success btn-sm mr-2"><i class="far fa-save"></i> GUARDAR CAMBIOS</button></a>
        <a href="{{URL::action([App\Http\Controllers\NotasController::class, 'index'], $nota->id)}}">
            <button type="button" class="float-right btn btn-danger btn-sm mr-2"><i class="far fa-window-close"  ></i> CANCELAR</button></a>

    </div>
  </div>
  
  {!! Form::close() !!}
  
 @endsection