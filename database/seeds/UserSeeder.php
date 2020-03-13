<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ], [
            'password' => Hash::make('12345678')
        ]);

        if (!$admin->hasRole('admin')) {
            $admin->roles()->save(
                Role::whereName('admin')->first()
            );
        }
    }
}
