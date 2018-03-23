<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRol = Role::create(['name' => 'admin']);
        $alumnoRol = Role::create(['name' => 'alumno']);
        $profesorRol = Role::create(['name' => 'profesor']);
        $invitadoRol = Role::create(['name' => 'invitado']);

        factory(User::class)->create([
            'name' => 'Tomi',
            'email' => 'tomi@gmail.com',
        ])->assignRole($adminRol);

        factory(User::class, 6)->create()->each->assignRole($alumnoRol);
        factory(User::class, 3)->create()->each->assignRole($profesorRol);
        factory(User::class, 2)->create()->each->assignRole($invitadoRol);
    }
}
