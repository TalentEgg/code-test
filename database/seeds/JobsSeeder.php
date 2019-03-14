<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2019-03-13
 * Time: 8:10 PM
 */

use App\Models\Job;
use App\Models\User;
use Faker\Factory as Faker;

/**
 * Class JobsSeeder
 */
class JobsSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            for ($i=0; $i < 5; $i++) {

                $jobInfo = [
                    'user_id' => $user->id,
                    'description' => $faker->paragraph,
                    'address' => $faker->address,
                ];

                Job::firstOrCreate($jobInfo);
            }
        }


    }
}
