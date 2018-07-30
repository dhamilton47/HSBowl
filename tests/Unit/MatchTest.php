<?php

namespace Tests\Unit;

use App\User;
use App\Match;
use Tests\TestCase;

class MatchTest extends TestCase
{
    /** @test */
    public function a_match_has_a_user()
    {
        $match = create(Match::class);
        $this->assertInstanceOf(User::class, $match->user);
    }

    /** @test */
    function a_match_has_teams()
    {
        $match = create(Match::class, ['team1' => 1]);
        $this->assertEquals($match->team1, 1);

        $match = create(Match::class, ['team2' => 2]);
        $this->assertEquals($match->team2, 2);
    }

    /** @test */
    function a_match_has_a_school_year()
    {
        $match = create(Match::class, ['school_year' => 2020]);
        $this->assertEquals($match->school_year, 2020);
    }

    /** @test */
    function a_match_has_a_match_date()
    {
        $date = now();
        $match = create(Match::class, ['match_date' => $date]);
        $this->assertEquals($match->match_date, $date);
    }

    /** @test */
    function a_match_has_a_number_of_games_baker()
    {
        $match = create(Match::class, ['number_of_games_baker' => 5]);
        $this->assertEquals($match->number_of_games_baker, 5);
    }

    /** @test */
    function a_match_has_a_number_of_games_linage()
    {
        $match = create(Match::class, ['number_of_games_linage' => 2]);
        $this->assertEquals($match->number_of_games_linage, 2);
    }

}
