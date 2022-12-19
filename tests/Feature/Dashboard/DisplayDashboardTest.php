<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayDashboardTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
     * Test if user is correctly redirected when trying to access without authentication.
     *
     * @return void
     */
    public function test_dashboard_can_not_be_rendered_when_user_is_not_connected()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect("/login");
    }



    /**
     * Test if user can access dashboard when logged in.
     *
     * @return void
     */
    public function test_dashboard_can_be_rendered_when_user_is_connected()
    {

        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }

}
