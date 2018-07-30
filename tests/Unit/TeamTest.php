<?php

namespace Tests\Unit;

use App\Team;
use App\School;
use Tests\TestCase;

class TeamTest extends TestCase
{
     protected $team;

    public function setUp()
    {
        parent::setUp();

        $this->team = create(Team::class);
    }

    /** @test */
    function a_team_has_a_school()
    {
        $this->assertInstanceOf(School::class, $this->team->school);
    }

    /** @test */
    function a_team_has_a_type()
    {
        $team = create(Team::class, ['team_type' => 'gender']);

        $this->assertEquals($team->team_type, 'gender');
    }

    /** @test */
    function a_team_has_a_level()
    {
        $team = create(Team::class, ['team_level' => 'varsity']);

        $this->assertEquals($team->team_level, 'varsity');
    }
}
