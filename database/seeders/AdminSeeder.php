<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Suport\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
   private $permision =[
    'role-list',
    'role-create',
    'role-edit',
    'role-delete',
   ];
    public function run(): void
    {
        foreach($this->permision as $permission){
            Permission::create(['name'=>$permission]);

        }
        $user=User::create([
            'name'=>'Sinigur Valeria',
            'email'=>' admin@mail.ru',
            'password'=>Hash::make ('12345')
        ]);
        $role=Role::create(['name'=>'Admin']);
        $permission=Permission::pluck('id','id')->all();
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
