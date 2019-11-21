<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = Role::where('name', 'student')->first();
        $role_oraganizator = Role::where('name', 'organizator')->first();
        $role_administrator = Role::where('name', 'administrator')->first();

        $admin = new User();
        $admin->first_name = 'System';
        $admin->last_name = 'System';
        $admin->email = 'system@ukf.sk';
        $admin->password = bcrypt(')-cfC9:kB[bm~Kz]');
        $admin->newsletter = 0;
        $admin->save();
        $admin->roles()->attach($role_administrator);

        $student = new User();
        $student->first_name = 'Peter';
        $student->last_name = 'Varga';
        $student->email = 'peter.varga@student.ukf.sk';
        $student->password = bcrypt('asd123');
        $student->newsletter = 0;
        $student->save();
        $student->roles()->attach($role_student);

        $organizator = new User();
        $organizator->first_name = 'Silvia';
        $organizator->last_name = 'Hrozenská';
        $organizator->email = 'shrozenska@ukf.sk';
        $organizator->password = bcrypt('asd123');
        $organizator->newsletter = 0;
        $organizator->save();
        $organizator->roles()->attach($role_oraganizator);

        $admin = new User();
        $admin->first_name = 'Root';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@ukf.sk';
        $admin->password = bcrypt('root123');
        $admin->newsletter = 0;
        $admin->save();
        $admin->roles()->attach($role_administrator);
    }
}
