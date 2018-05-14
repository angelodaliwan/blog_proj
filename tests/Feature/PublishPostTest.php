<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    function it_publish_the_post(){

        $this->post('/publish', [
           'title' => 'Test Title',
           'body' => 'Test Message'
        ])->assertStatus(302);

        $this->assertDatabaseHas('posts', [
           'title' => 'Test Title',
           'body' => 'Test Message'
        ]);
    }

    /** @test */
    function it_validates_the_fields()
    {
        $this->post('/publish', [
                       'title' => '',
                       'body' => 'Test Message'
            ])->assertStatus(302);

        $post = Post::get();

        $this->assertTrue($post->isEmpty());
    }
}
