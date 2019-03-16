<?php

use App\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$jobs = factory(Job::class, 10)->create();
		factory(App\Job::class, 50)->create();
		/*DB::table('jobs')->insert([
            'title' => str_random(20),
            'description' => str_random(100),
            'status' => bcrypt('secret'),
        ]);*/
    }
}
