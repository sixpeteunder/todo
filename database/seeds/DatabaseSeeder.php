<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            for ($i = 0; $i < 10; $i++) $user->todos()->save(factory(App\Todo::class)->make());
        });
    }
}
