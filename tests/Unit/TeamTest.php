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
        $team = create(Team::class, ['type' => 'gender']);

        $this->assertEquals($team->type, 'gender');
    }

    /** @test */
    function a_team_has_a_level()
    {
        $team = create(Team::class, ['level' => 'varsity']);

        $this->assertEquals($team->level, 'varsity');
    }

    /** @test */
    function a_team_has_multiple_players()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->team->players
        );
    }
}
