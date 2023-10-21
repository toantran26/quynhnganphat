<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // create permissions
    $permission1 = Permission::create(['name' => 'edit role']);
    $permission2 = Permission::create(['name' => 'delete role']);
    $permission3 = Permission::create(['name' => 'view role']);
    $permission4 = Permission::create(['name' => 'create role']);
    $permission5 = Permission::create(['name' => 'edit users']);
    $permission6 = Permission::create(['name' => 'delete users']);
    $permission7 = Permission::create(['name' => 'view users']);
    $permission8 = Permission::create(['name' => 'create users']);
    $permission9 = Permission::create(['name' => 'edit category']);
    $permission10 = Permission::create(['name' => 'delete category']);
    $permission11 = Permission::create(['name' => 'view category']);
    $permission12 = Permission::create(['name' => 'create category']);
    $permission13 = Permission::create(['name' => 'edit post']);
    $permission14 = Permission::create(['name' => 'delete post']);
    $permission15 = Permission::create(['name' => 'view post']);
    $permission16 = Permission::create(['name' => 'create post']);
    $superAdmin = Role::create(['name' => 'super-admin']);
    $superAdmin->givePermissionTo([$permission1, $permission2, $permission3, $permission4, $permission5, $permission6, $permission7, $permission8, $permission9, $permission10, $permission11, $permission12, $permission13, $permission14, $permission15, $permission16]);
    $user = \App\Models\User::factory()->create([
      'name' => 'Super-Admin User',
      'username' => 'admin',
      'password' => bcrypt('123456'),
      'email' => 'phonghx.giaminh@gmail.com'
    ]);
    $user->assignRole($superAdmin);
  }
}
