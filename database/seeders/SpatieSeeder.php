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
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'add category']);

        // create permissions Product
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'add product']);

        // create permissions Review
        Permission::create(['name' => 'edit review']);
        Permission::create(['name' => 'delete review']);
        Permission::create(['name' => 'update review']);
        Permission::create(['name' => 'add review']);

        // create roles and assign created permissions

        // or may be done by chaining
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo([
                'add review', 
                'edit review', 
                'delete review', 
                'update review'
            ]);

        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo(Permission::all());

    }
}
