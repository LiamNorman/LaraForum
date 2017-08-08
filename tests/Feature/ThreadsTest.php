<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * GET /threads
     *
     * @return void
     *
     * @test
     */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
        $response->assertStatus(200);

    }

    /**
     * GET /threads/{id}
     *
     * @return void
     *
     * @test
     */

    public function a_user_can_view_one_thread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }

}
