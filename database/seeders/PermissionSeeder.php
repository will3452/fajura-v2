<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // app()['cache']->forget('spatie.permission.cache');
        //schedules
        Permission::create([
            'name'=>'browse schedules'
        ]);

        Permission::create([
            'name'=>'edit schedules'
        ]);

        // services
        Permission::create([
            'name'=>'browse services'
        ]);
        Permission::create([
            'name'=>'read services'
        ]);
        Permission::create([
            'name'=>'edit services'
        ]);
        Permission::create([
            'name'=>'add services'
        ]);
        Permission::create([
            'name'=>'delete services'
        ]);

        //pages
        Permission::create([
            'name'=>'browse pages'
        ]);
        Permission::create([
            'name'=>'read pages'
        ]);
        Permission::create([
            'name'=>'edit pages'
        ]);
        Permission::create([
            'name'=>'add pages'
        ]);
        Permission::create([
            'name'=>'delete pages'
        ]);

        //accounts
        Permission::create([
            'name'=>'browse accounts'
        ]);
        Permission::create([
            'name'=>'read accounts'
        ]);
        Permission::create([
            'name'=>'edit accounts'
        ]);
        Permission::create([
            'name'=>'add accounts'
        ]);
        Permission::create([
            'name'=>'delete accounts'
        ]);

        //appointments
        Permission::create([
            'name'=>'browse appointments'
        ]);
        Permission::create([
            'name'=>'read appointments'
        ]);
        Permission::create([
            'name'=>'edit appointments'
        ]);
        Permission::create([
            'name'=>'add appointments'
        ]);
        Permission::create([
            'name'=>'delete appointments'
        ]);
    }
}
