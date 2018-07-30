<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = create(User::class);
    }

    /** @test */
    public function a_user_can_determine_their_avatar_path()
    {
        $this->assertEquals(asset('images/avatars/default.png'), $this->user->avatar_path);

        $this->user->avatar_path = 'avatars/me.jpg';

        $this->assertEquals(asset('storage/avatars/me.jpg'), $this->user->avatar_path);
    }

    /** @test */
    function a_user_can_administrator_many_schools()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->user->administers
        );
    }
}
