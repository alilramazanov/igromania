<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GamesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_browse_list_games(){
        $response = $this->get('api/igromania/v1/games/list');

        $response->assertStatus(200);
    }

}
