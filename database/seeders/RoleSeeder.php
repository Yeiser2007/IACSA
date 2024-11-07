<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $rh = Role::create(['name' => 'Recursos humanos']);
        $operacional = Role::create(['name' => 'Operacional']);
        $contabilidad = Role::create(['name' => 'Contabilidad']);

        Permission::create(['name' => 'home'])->syncRoles([$admin, $rh, $operacional, $contabilidad]);


        Permission::create(['name' => 'roles.index'])->syncRoles($admin);
        Permission::create(['name' => 'roles.create'])->syncRoles($admin);
        Permission::create(['name' => 'roles.edit'])->syncRoles($admin);
        Permission::create(['name' => 'roles.destroy'])->syncRoles($admin);

        Permission::create(['name' => 'permissions.index'])->syncRoles($admin);
        Permission::create(['name' => 'permissions.create'])->syncRoles($admin);
        Permission::create(['name' => 'permissions.edit'])->syncRoles($admin);
        Permission::create(['name' => 'permissions.destroy'])->syncRoles($admin);
        #PERMISOS DE RECURSOS HUMANOS
        Permission::create(['name' => 'users.index'])->syncRoles($admin);
        Permission::create(['name' => 'users.create'])->syncRoles($admin);
        Permission::create(['name' => 'users.edit'])->syncRoles($admin);
        Permission::create(['name' => 'users.destroy'])->syncRoles($admin);

        Permission::create(['name' => 'employees.index'])->syncRoles([$admin, $rh, $contabilidad, $operacional]);
        Permission::create(['name' => 'employees.create'])->syncRoles([$admin, $rh, $contabilidad]);
        Permission::create(['name' => 'employees.edit'])->syncRoles([$admin, $rh, $contabilidad]);
        Permission::create(['name' => 'employees.destroy'])->syncRoles([$admin, $rh, $contabilidad]);

        Permission::create(['name' => 'incidences.index'])->syncRoles([$admin, $rh, $contabilidad, $operacional]);
        Permission::create(['name' => 'incidences.create'])->syncRoles([$admin, $contabilidad, $operacional]);
        Permission::create(['name' => 'incidences.edit'])->syncRoles([$admin, $contabilidad, $operacional]);
        Permission::create(['name' => 'incidences.destroy'])->syncRoles([$admin, $contabilidad, $operacional]);

        Permission::create(['name' => 'payroll.index'])->syncRoles([$admin, $rh, $contabilidad]);
        Permission::create(['name' => 'payroll.create'])->syncRoles([$admin, $contabilidad]);
        Permission::create(['name' => 'payroll.edit'])->syncRoles([$admin, $contabilidad]);
        Permission::create(['name' => 'payroll.destroy'])->syncRoles([$admin, $contabilidad]);

        Permission::create(['name' => 'reports.index'])->syncRoles([$admin, $rh, $contabilidad]);
        Permission::create(['name' => 'reports.create'])->syncRoles([$admin, $contabilidad]);
        Permission::create(['name' => 'reports.edit'])->syncRoles([$admin, $contabilidad]);
        Permission::create(['name' => 'reports.destroy'])->syncRoles([$admin, $contabilidad]);

        $admin->givePermissionTo(Permission::all());

    }
}
