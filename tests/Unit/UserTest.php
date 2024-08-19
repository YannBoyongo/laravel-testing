<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login_form()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_check_duplicate()
    {
        $user1 = User::make([
            'name'=> "ebanga mbula",
            'email'=> "ebanga@lobonga.org",
        ]);

        $user2 = User::make([
            'name'=> "boyongo bo lobonga",
            'email'=> "boyongo@lobonga.org",
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }
}
