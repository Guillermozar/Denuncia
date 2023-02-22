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
  
    $permission_array =[];
    array_push($permission_array,Permission::create(['name' => 'create_denuncia']));
    array_push($permission_array,Permission::create(['name' => 'edit_denuncia']));
    array_push($permission_array,Permission::create(['name' => 'delete_denuncia']));
    $ViewDenunciaPermission= Permission::create(['name' => 'view_denuncia']);

    array_push($permission_array,  $ViewDenunciaPermission);

	$SuperAdminRole = Role::create(['name' => 'super_admin']);
	$SuperAdminRole->syncPermissions($permission_array);

	$UsuarioRole = Role::create(['name' => 'view_denuncia']);
	$UsuarioRole->syncPermissions($ViewDenunciaPermission);

	 $userSuperAdmin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin21141998'),
            
        ]);
	 $userSuperAdmin->assignRole('super_admin');

	 $UserView=User::create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('Admin21141998'),
        ]);
	 $UserView->assignRole('view_denuncia');
	



    }
}
