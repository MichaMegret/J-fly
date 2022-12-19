<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Bird;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\BirdList;
use App\Http\Livewire\CreateBird;
use App\Http\Livewire\UpdateBird;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BirdTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $component = Livewire::test(BirdList::class);

        $component->assertStatus(200);
    }


    /** @test */
    public function component_set_properties()
    {
        Livewire::withQueryParams([
            's' => 'test',
            'd' => 'ASC',
            'f' => 'name',
            'r' => 30,
            'p'=>2
            ])
            ->test(BirdList::class)
            ->assertSet('search', 'test')
            ->assertSet('orderDirection', 'ASC')
            ->assertSet('orderField', 'name')
            ->assertSet('nbLines', 30)
            ->assertSet('page', 2);
    }


    /** @test */
    public function search_work()
    {

        Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"testus",
            "description"=>"Test description",
        ]);

        Bird::create([
            "french_name"=>"Other",
            "latin_name"=>"Otherus",
            "description"=>"Other description",
        ]);

        $user = User::factory()->create();
        $this->actingAs($user);

        $component = Livewire::withQueryParams([
            's' => 'test'
        ])
        ->test(BirdList::class)
        ->assertSeeHtml('<span class="french-name text-lg font-medium">Test</span>')
        ->assertDontSeeHtml('<span class="french-name text-lg font-medium">Other</span>');
        // $component->assertStatus(200);
    }


    /** @test */
    public function can_create_bird(){

        $user = User::factory()->create();
        $this->actingAs($user);        
 
        Livewire::test(CreateBird::class)
            ->set('frenchName', 'Test')
            ->set('latinName', 'Testus')
            ->set('description', 'Test description')
            ->call('create');
 
        $this->assertTrue(Bird::where('french_name',"=","Test")
        ->where('latin_name',"=","Testus")
        ->where('description',"=","Test description")
        ->exists());
    }

    /** @test */
    public function can_update_bird(){

        $user = User::factory()->create();
        $this->actingAs($user);

        $bird = Bird::create([
            "french_name"=>"Test",
            "latin_name"=>"Testus",
            "description"=>"Test description"
        ]);
 
        Livewire::withQueryParams(["id"=>$bird->id])
            ->test(UpdateBird::class, ["bird"=>$bird])
            ->set('frenchName', 'Test update')
            ->set('latinName', 'Testus update')
            ->set('description', 'Test description update')
            ->call('update');
 
        $this->assertTrue(Bird::where('french_name',"=","Test update")
        ->where('latin_name',"=","Testus update")
        ->where('description',"=","Test description update")
        ->exists());
    }


}
