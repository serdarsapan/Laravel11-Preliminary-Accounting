<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\UserRolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        foreach ($this->dummyData() as $key) {
            UserRolePermission::updateOrCreate([
                'name' => $key['name'],
                'role_id' => $key['role_id'],
                'read_permission' => $key['read_permission'],
                'create_permission' => $key['create_permission'],
                'update_permission' => $key['update_permission'],
                'delete_permission' => $key['delete_permission'],
            ]);
        }
    }

    /**
     * @return array[]
     */
    public function dummyData(): array
    {
        return [
            1 => [
                'name' => 'blog',
                'role_id' => 1,
                'read_permission' => 1,
                'create_permission' => 1,
                'update_permission' => 1,
                'delete_permission' => 1,
            ],
            2 => [
                'name' => 'category',
                'role_id' => 1,
                'read_permission' => 1,
                'create_permission' => 1,
                'update_permission' => 1,
                'delete_permission' => 1,
            ],
            3 => [
                'name' => 'blog',
                'role_id' => 2,
                'read_permission' => 1,
                'create_permission' => 1,
                'update_permission' => 1,
                'delete_permission' => 1,
            ],
            4 => [
                'name' => 'category',
                'role_id' => 2,
                'read_permission' => 0,
                'create_permission' => 0,
                'update_permission' => 0,
                'delete_permission' => 0,
            ],

        ];
    }
}