<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions Category
        Permission::create(['name' => 'view list category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'update own category']);
        Permission::create(['name' => 'update any category']);
        Permission::create(['name' => 'delete own category']);
        Permission::create(['name' => 'delete any category']);

        // create permissions Product
        Permission::create(['name' => 'view list product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'update own product']);
        Permission::create(['name' => 'update any product']);
        Permission::create(['name' => 'delete own product']);
        Permission::create(['name' => 'delete any product']);

        // create permissions Review
        Permission::create(['name' => 'view list review']);
        Permission::create(['name' => 'create review']);
        Permission::create(['name' => 'update own review']);
        Permission::create(['name' => 'update any review']);
        Permission::create(['name' => 'delete own review']);
        Permission::create(['name' => 'delete any review']);

        // create roles and assign created permissions

        // or may be done by chaining
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo([
                'view list category',
                'create category', 
                'update own category', 
                'delete own category', 
                'view list product',
                'create product', 
                'update own product', 
                'delete own product', 
                'view list review',
                'create review', 
                'update own review', 
                'delete own review', 
            ]);

        $role = Role::create(['name' => 'superadmin'])
            ->givePermissionTo([
                'create category', 
                'update any category', 
                'delete any category', 
                'create product', 
                'update any product', 
                'delete any product', 
                'create review', 
                'update any review', 
                'delete any review', 
            ]);

        //$role = Role::create(['name' => 'superadmin']);
        //$role->givePermissionTo(Permission::all());

    }
}
