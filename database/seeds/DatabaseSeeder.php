<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws Exception
     * @throws Throwable
     */
    public function run()
    {
        if (!App::environment(['testing', 'production'])) {
            DB::transaction(function () {
                $this->call(UsersSeeder::class);
                $this->call(UserRecruitmentSeeder::class);
            });
        }
    }
}
