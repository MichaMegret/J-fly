<?php

namespace Tests\Feature\Bird;

use Tests\TestCase;
use App\Models\Bird;
use App\Models\BirdCategory;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayCategoryTest extends TestCase
{

    use RefreshDatabase;


    // Create category form
    //---------------------------------------------------------------------------------------

    public function test_create_category_form_can_be_rendered_when_user_is_connected()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/create-category');
        $response->assertStatus(200);
    }

    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_create_category_form_can_not_be_rendered_when_user_is_not_connected()
    {
        $response = $this->get('/create-category');
        $response->assertRedirect("/login");
    }



    // Update category form
    //---------------------------------------------------------------------------------------

   
    /**
     * Test if user can access to category update form when logged in.
     *
     * @return void
     */
    public function test_update_category_form_can_be_rendered_when_user_is_connected()
    {

        $user = User::factory()->create();
        Auth::login($user);

        $category = Categories::create([
            "name"=>"test category",
            "color"=>"blue-400"
        ]);
        $bird = Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"testus",
            "description"=>"Test description",
        ]);
        $birdCategory = BirdCategory::create([
            "bird_id"=>$bird->id,
            "category_id"=>$category->id
        ]);
        $response = $this->get('update-category/'.$birdCategory->id);
        $response->assertStatus(200);
    }
    
    
    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_update_category_form_can_not_be_rendered_when_user_is_not_connected()
    {

        $category = Categories::create([
            "name"=>"test category",
            "color"=>"blue-400"
        ]);
        $bird = Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"testus",
            "description"=>"Test description",
        ]);
        $birdCategory = BirdCategory::create([
            "bird_id"=>$bird->id,
            "category_id"=>$category->id
        ]);
        $response = $this->get('update-category/'.$birdCategory->id);
        $response->assertRedirect("/login");

    }



    // Categories list page
    //---------------------------------------------------------------------------------------

    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_categories_list_can_not_be_rendered_when_user_is_not_connected()
    {
        $response = $this->get('/categories');
        $response->assertRedirect("/login");
    }



    /**
     * Test if user can access categories list page when logged in.
     *
     * @return void
     */
    public function test_categories_list_can_be_rendered_when_user_is_connected()
    {

        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/categories');
        $response->assertStatus(200);
    }
}
