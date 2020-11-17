@extends('layouts.app')


@section('content')
<div class="container">
  
<h2  class="mb-5 text-center">CREAR NUEVO USUARIO</h2>

    <form action="/usuarios" method="POST" class="mx-auto" enctype="multipart/form-data" style="max-width: 20rem">
      @csrf

        <div class="form-group">
         <center> <label for="exampleInputEmail1"><i class="far fa-user"></i> NOMBRE</label></center>
          <input  type="text" class="form-control" name="name" placeholder="ingrese su nombre">
        </div>
       
        <div class="form-group">
         <center> <label for="email"><i class="far fa-envelope"></i> Email </label></center>
          <input type="email" class="form-control" name="email" placeholder="ingrese su email" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
         <center> <label for="password"><i class="fas fa-unlock-alt"></i> Password</label></center>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
        <center>  <label for="password"><i class="fas fa-unlock-alt"></i> Confirme Password</label></center>
          <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
         <center> <label for="password"><i class="fas fa-images"></i> Imagen</label></center>
          <input type="file" class="form-control" name="imagen">
        </div>
        <div class="form-group">
          <center> <label for="password"><i class="fas fa-images"></i>Rol</label></center>
          <select class="form-control">
          @foreach ($roles as $role )
            <option>{{$role->name}}</option>
          @endforeach
        </select>
         </div>
       
        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

      </form>
    
</div>
@endsection