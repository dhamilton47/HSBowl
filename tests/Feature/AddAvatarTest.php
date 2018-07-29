<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AddAvatarTest extends TestCase
{
    /** @test */
    public function a_user_may_add_an_avatar_to_their_profile()
    {
        $this->signIn();

        Storage::fake('public');

        $this->json('POST', route('avatar', auth()->id()), [
            'avatar' => $file = UploadedFile::fake()->image('avatar.jpg')
        ]);

        $this->assertEquals(asset('storage/avatars/' . $file->hashName()), auth()->user()->avatar_path);

        Storage::disk('public')->assertExists('avatars/' . $file->hashName());
    }

    /** @test */
    public function a_valid_avatar_must_be_provided()
    {
        $this->withExceptionHandling();
            $this->signIn();

        $this->json('POST', route('avatar', auth()->id()), [
            'avatar' => 'not-an-image'
        ])->assertStatus(422);
    }

    /** @test */
    public function only_users_can_add_avatars()
    {
        $this->withExceptionHandling();

        $this->json('POST', route('avatar', 1))
            ->assertStatus(401);
    }
}
