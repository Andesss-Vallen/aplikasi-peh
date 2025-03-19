<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-datautama']);
        Permission::create(['name'=>'edit-datautama']);
        Permission::create(['name'=>'hapus-datautama']);
        Permission::create(['name'=>'lihat-datautama']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'superuser']);
        Role::create(['name'=>'freelance']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-datautama');
        $roleAdmin->givePermissionTo('edit-datautama');
        $roleAdmin->givePermissionTo('hapus-datautama');
        $roleAdmin->givePermissionTo('lihat-datautama');

        $roleSuperuser = Role::findByName('superuser');
        $roleSuperuser->givePermissionTo('tambah-user');
        $roleSuperuser->givePermissionTo('edit-user');
        $roleSuperuser->givePermissionTo('hapus-user');
        $roleSuperuser->givePermissionTo('lihat-user');
        $roleSuperuser->givePermissionTo('tambah-datautama');
        $roleSuperuser->givePermissionTo('edit-datautama');
        $roleSuperuser->givePermissionTo('hapus-datautama');
        $roleSuperuser->givePermissionTo('lihat-datautama');

        $roleFreelance = Role::findByName('freelance');
        $roleFreelance->givePermissionTo('lihat-datautama');
    }
}
