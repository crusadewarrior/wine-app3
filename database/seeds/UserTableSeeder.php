<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class UserTableSeeder extends Seeder{

    public function run() {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => bcrypt(str_random(10)),
                'role_id' => $faker->numberBetween(1, 2),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'remember_token' => str_random(10)
            ]);
        }

        User::create([
            'name' => 'GreatAdmin',
            'email' => 'admin@la.fr',
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@la.fr',
            'password' => bcrypt('user'),
            'role_id' => 2,
        ]);

        Role::create([
            'title' => 'Administrator',
            'slug' => 'admin'
        ]);

        Role::create([
            'title' => 'User',
            'slug' => 'user'
        ]);
    }

}