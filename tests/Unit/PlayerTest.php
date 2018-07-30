<?php

namespace Tests\Unit;

use App\Player;
use App\School;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    /** @test */
    public function a_player_has_a_school()
    {
        $player = create(Player::class);

        $this->assertInstanceOf(School::class, $player->school);
    }

    /** @test */
    function a_player_has_a_first_name()
    {
        $player = create(Player::class, ['first_name' => 'firstname']);

        $this->assertEquals($player->first_name, 'firstname');
    }

    /** @test */
    function a_player_has_a_last_name()
    {
        $player = create(Player::class, ['last_name' => 'lastname']);

        $this->assertEquals($player->last_name, 'lastname');
    }

    /** @test */
    function a_player_has_a_short_name()
    {
        $player = create(Player::class, ['short_name' => 'shortname']);

        $this->assertEquals($player->short_name, 'shortname');
    }

    /** @test */
    function a_player_has_a_graduation_year()
    {
        $player = create(Player::class, ['graduation_year' => 2020]);

        $this->assertEquals($player->graduation_year, 2020);
    }

    /** @test */
    function a_player_has_a_gender()
    {
        $player = create(Player::class, ['gender' => 'sex']);

        $this->assertEquals($player->gender, 'sex');
    }
}
