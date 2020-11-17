<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\Models\User;
use App\Models\role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('auth');
     }
    public function index(Request $request )
    {
       // $users=User::all();
        //return view('usuarios.index',['users'=>$users]);
        
        if($request){
            $query=trim($request->get('search'));
            $roles=Role::all();
            $users=User::where('name','LIKE','%'.$query.'%')->orderby('id','asc')
            
            ->simplepaginate(5);
            return view('usuarios.index',['users'=>$users,'search'=>$query]);
        }
       /* if($request->ajax()){
$users=User::all();
return DataTables::of($user)->addColumn('imagen', function($user){
if(empty($user->imagen)){
    return '';
}
return '<img src="imagenes/'.$user->imagen.'" width="50" height="50"/>';
});*/

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('usuarios.create',['roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $usuario= new User();
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password= bcrypt($request->get('password'));
        if($request->hasFile('imagen'))
        {
            $file=$request->imagen;
            $file->move(public_path() . '/imagenes',$file->getClientOriginalName());
            $usuario->imagen=$file->getClientOriginalName();
        }
        $usuario->save();
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.show',['user'=>User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuarios.edit',['user'=> User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(request(),['email'=>['required','email','max:255','unique:users,email,'.$id]]);
      $usuario=User::findOrFail($id);
      $usuario->name=$request->get('name');
      $usuario->email=$request->get('email');
      if($request->hasFile('imagen'))
      {
          $file=$request->imagen;
          $file->move(public_path() . '/imagenes',$file->getClientOriginalName());
          $usuario->imagen=$file->getClientOriginalName();
      }
      $pass=$request->get('password');

      if($pass != NULL){
        $usuario->password=bcrypt($request->get('password'));
      }
      else{
          unset($usuario->password);
      }
      $usuario->update();
      return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return redirect('usuarios');
    }
}
