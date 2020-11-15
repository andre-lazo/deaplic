@extends('layouts.app')

@section('content')
@include('notas.todas.modal')
<div class="d-flex flex-wrap justify-content-around  mt-5">
   
    @foreach ($notas as $nota)
       @include('notas.todas.modal_delete')
            <div class="card border-primary  " style="max-width: 18rem">
                <div class="card-header">
                <b>{{$nota->titulo}}</b>
                </div>
                <div class="card-body text-primary">
                <h5 class="card-title">Fecha de Creacion: <b> {{$nota->created_at}}</b></h5>
                <p class="card-text">{{$nota->texto}}</p>
                </div>
                <div class="card-footer">
                   
                    <button type="button" class="float-right btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$nota->id}}"><i class="far fa-trash-alt"></i> Eliminar</button>
                    <a href="{{URL::action([App\Http\Controllers\NotasController::class, 'edit'], $nota->id)}}">
                    <button type="button" class="float-right btn btn-info btn-sm mr-2"><i class="far fa-edit"></i> Editar</button></a>

                </div>
                </div>
      
@endforeach
</div>
@endsection