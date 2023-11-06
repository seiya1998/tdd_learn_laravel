<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Response;

class LessonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShow()
    {
        $lesson = Lesson::factory()->create(['name' => '楽しいヨガレッスン']);
        $response = $this->get("/lessons/{$lesson->id}");

        $response->assertStatus(Response::HTTP_OK);

        $response->assertSee($lesson->name);
        $response->assertSee('空き状況: ×');
    }
}
