<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class ModelHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $userId = 1;

        foreach ($permissions as $permission) {
            DB::table('model_has_permissions')->insert([
                'permission_id' => $permission->id,
                'model_type' => 'App\\Models\\User',
                'model_id' => $userId,
            ]);
        }
    }
}
