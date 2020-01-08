<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\User::class, 5)->create();
        factory(App\Invoice::class, 30)->create();
        factory(App\Income::class, 13)->create();
    }
}
