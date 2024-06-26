<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dummyData() as $key) {
            $row = Role::where('name', $key['name'])->first();

            if (!$row) {
                DB::table('roles')->insert($key);
            }
        }
    }

    /**
     * @return array[]
     */
    public function dummyData(): array
    {
        return [
            1 => ['name' => 'Admin'],
            2 => ['name' => 'Merchant'],
            3 => ['name' => 'User'],
        ];
    }
}
