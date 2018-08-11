<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    protected $schools;
    protected $teams;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = factory(App\School::class, 10)->create();

        foreach ($schools as $school) {
            factory(App\Team::class)
                ->create([
                    'school_id' => $school->id,
                    'type' => "Men's Team",
                    'level' => 'Varsity'
                ]);

            factory(App\Team::class)
                ->create([
                    'school_id' => $school->id,
                    'type' => "Men's Team",
                    'level' => 'Junior Varsity'
                ]);

            factory(App\Team::class)
                ->create([
                    'school_id' => $school->id,
                    'type' => "Women's Team",
                    'level' => 'Varsity'
                ]);

            factory(App\Team::class)
                ->create([
                    'school_id' => $school->id,
                    'type' => "Women's Team",
                    'level' => 'Junior Varsity'
                ]);

            factory(App\Player::class, 32)

                ->create(['school_id' => $school->id]);
        }
    }
}
