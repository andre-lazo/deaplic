@extends('layouts.app')
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 40%;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
       
</style>
@section('content')
<div class="container mb-3">
  <h1 class="text-center mb-5 mt-3">USUARIOS REGISTRADOS EN LA BASE DE DATOS</h1>
  <a href="usuarios/create"><button type="button" class="btn btn-secondary mb-3">AGREGAR USUARIO</button></a>
  <form class="form-inline ml-3 float-right">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
<h6>
 @if ($search)
 <div class="alert alert-primary">
  Los resultados para tu busqueda '{{$search}}' son:
    </div>
 @endif
</h6>
  <div class="table-wrapper-scroll-y my-custom-scrollbar" id="prueba">
    <table class="table table-bordered table-striped mb-0 table-hover">
        <thead class="bg-dark">
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Imagen</th>
            <th scope="col" class="text-center">Ver</th>
            <th scope="col" class="text-center">Modificar</th>
            <th scope="col" class="text-center">Eliminar</th>
           
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row" class="text-center">{{$user->id}}</th>
                <td class="text-center">{{$user->name    }}</td>
                <td class="text-center">{{$user->email   }}</td>
                <td class="text-center"><img src="{{asset('/imagenes/'.$user->imagen)}}" alt="{{$user->imagen}}" height="50px" width="50px"></td>
                <td class="text-center"><a href="{{route('usuarios.show',$user->id)}}" class="btn btn-secondary"><i class="far fa-eye"></i> Ver</a></td>
                <td class="text-center"> <a href="{{ route('usuarios.edit',$user->id) }}" class="btn btn-primary"><i class="far fa-edit"></i>  Modificar</a></td>
                <td class="text-center"> 
                  <form action="{{route('usuarios.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt"></i>  Eliminar</button>
                  </form>
                </td>
              </tr>    
            @endforeach
         
          
        </tbody>
        
      </table>
     
</div>

</div>
{{$users->links()}}
@endsection