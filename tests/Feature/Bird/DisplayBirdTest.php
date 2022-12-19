<?php

namespace Tests\Feature\Bird;

use Tests\TestCase;
use App\Models\Bird;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayBirdTest extends TestCase
{

    use RefreshDatabase;


    // Create bird form
    //---------------------------------------------------------------------------------------

    public function test_create_bird_form_can_be_rendered_when_user_is_connected()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/create-bird');
        $response->assertStatus(200);
    }

    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_create_bird_form_can_not_be_rendered_when_user_is_not_connected()
    {
        $response = $this->get('/create-bird');
        $response->assertRedirect("/login");
    }






    // Update bird form
    //---------------------------------------------------------------------------------------

    /**
     * Test if user can access to bird update form when logged in.
     *
     * @return void
     */
    public function test_update_bird_form_can_be_rendered_when_user_is_connected()
    {

        $user = User::factory()->create();
        Auth::login($user);

        $bird = Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"testus",
            "description"=>"Test description",
        ]);
        
        $response = $this->get('update-bird/'.$bird->id);
        $response->assertStatus(200);
    }
    
    
    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_update_bird_form_can_not_be_rendered_when_user_is_not_connected()
    {

        $bird = Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"testus",
            "description"=>"Test description",
        ]);
        
        $response = $this->get('update-bird/'.$bird->id);
        $response->assertRedirect("/login");

    }



    

    // Birds list page
    //---------------------------------------------------------------------------------------

    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_birds_list_can_not_be_rendered_when_user_is_not_connected()
    {
        $response = $this->get('/birds');
        $response->assertRedirect("/login");
    }



    /**
     * Test if user can access birds list page when logged in.
     *
     * @return void
     */
    public function test_birds_list_can_be_rendered_when_user_is_connected()
    {

        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/birds');
        $response->assertStatus(200);
    }
}
