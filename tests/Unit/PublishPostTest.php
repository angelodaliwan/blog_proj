<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    function it_test_the_publish_method()
    {
        $post = new Post();

        $publish = $post->publish('Test', 'Test message');

        $this->assertEquals(1, $publish->count());
    }
}
