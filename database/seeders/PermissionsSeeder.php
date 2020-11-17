<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $permissions_array=[];
        array_push($permissions_array,Permission::create(['name' => 'ver_reg']));
        $ver_nota_permiso=Permission::create(['name' => 'ver_n']);
        array_push($permissions_array,$ver_nota_permiso);
        
        $super_admin_r = Role::create(['name' => 'super_administrador']);//creo rol
        //$permission = Permission::create(['name' => 'ver usuarios']);//creo permiso
        //$role->givePermissionTo($permission);//asigno  un permiso a un rol
        $super_admin_r->syncPermissions($permissions_array);//asigna un array de permisos
        
        $ver_users_r=Role::create(['name'=>'ver_nota']);
        $ver_users_r->givePermissionTo($ver_nota_permiso);


//crear usuario
$user_super_admin= User::create([
    'name' => 'admin',
    'email' => 'admin@gmail.com',
    'password' => Hash::make('admin'),
]);
//asaignando un rol a un usuario
$user_super_admin->assignRole('super_administrador');
$user_normal= User::create([
    'name' => 'test',
    'email' => 'test@gmail.com',
    'password' => Hash::make('test'),
]);
$user_normal->assignRole('ver_nota');
User::create([
    'name' => 'test2',
    'email' => 'test2@gmail.com',
    'password' => Hash::make('test2'),
]);

    }
}
