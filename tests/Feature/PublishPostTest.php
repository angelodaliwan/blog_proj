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
    function shows_the_posts_list(){
        $this->get('/posts')
            ->assertStatus(200);
    }


    /** @test **/
    function it_publish_the_post(){

        $this->post('/posts', [
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
        $this->post('/posts', [
                       'title' => '',
                       'body' => 'Test Message'
            ])->assertStatus(302);

        $post = Post::get();

        $this->assertTrue($post->isEmpty());
    }
}
