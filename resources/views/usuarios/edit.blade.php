@extends('layouts.app')
@section('content')
<div class="container">
  <h2 class="text-center">EDITAR USUARIO {{$user->name}}</h2>
  <div class="row"> 
    <div class="col-sm-4">
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
      @csrf
       
      <div class="form-group">
        <center> <label for="exampleInputEmail1"><i class="far fa-user"></i> NOMBRE</label></center>
         <input  type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="ingrese su nombre">
       </div>
       <div class="form-group">
        <center> <label for="email"><i class="far fa-envelope"></i> Email </label></center>
         <input type="email" class="form-control" name="email" value="{{$user->email}}"  placeholder="ingrese su email" >
         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       <div class="form-group">
        <center> <label for="password"><i class="fas fa-unlock-alt"></i> Password <span class="smalls">(Opcional)</span></label></center>
         <input type="password" class="form-control" name="password">
       </div>
       <div class="form-group">
       <center>  <label for="password"><i class="fas fa-unlock-alt"></i> Confirme Password <span class="smalls">(Opcional)</span></label></center>
         <input type="password" class="form-control" name="password_confirmation">
       </div>
       <div class="form-group">
        <center> <label for="password"><i class="fas fa-images"></i> Imagen</label></center>
         <input type="file" class="form-control" name="imagen">
         @if($user->imagen!="")
         <img src="{{asset('/imagenes/'.$user->imagen)}}" alt="{{$user->imagen}}" height="50px" width="50px"> 
         @endif
       </div>
       
       
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      </form>
    </div>
</div>
</div>
@endsection