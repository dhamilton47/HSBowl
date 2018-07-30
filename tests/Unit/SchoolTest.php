<?php

namespace Tests\Unit;

use App\School;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    protected $school;

    public function setUp()
    {
        parent::setUp();

        $this->school = create(School::class);
    }

    /** @test */
    function a_school_has_a_name()
    {
        $school = create(School::class, ['name' => 'South Windsor High School']);

        $this->assertEquals($school->name, 'South Windsor High School');
    }

    /** @test */
    function a_school_has_a_city()
    {
        $school = create(School::class, ['city' => 'New Haven']);

        $this->assertEquals($school->city, 'New Haven');
    }

    /** @test */
    function a_school_has_a_state()
    {
        $school = create(School::class, ['state' => 'CT']);

        $this->assertEquals($school->state, 'CT');
    }

    /** @test */
    function a_school_has_a_district()
    {
        $school = create(School::class, ['district' => 'Metro']);

        $this->assertEquals($school->district, 'Metro');
    }

    /** @test */
    function a_school_has_teams()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->school->teams
        );
    }

    /** @test */
    function a_school_can_have_many_administrators()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->school->administrators
        );
    }
}
