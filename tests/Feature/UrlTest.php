<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_returns_200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_homepage_shows_urls_table(): void
    {
        $response = $this->get('/');

        $response->assertSee('BanaURLShorten');
        $response->assertSee('Original URL');
        $response->assertSee('Short Link');
        $response->assertSee('Clicks');
    }

    public function test_shorten_creates_new_url(): void
    {
        $response = $this->postJson('/shorten', [
            'original_url' => 'https://www.example.com',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'original_url' => 'https://www.example.com',
            ]);

        $this->assertDatabaseHas('urls', [
            'original_url' => 'https://www.example.com',
        ]);
    }

    public function test_shorten_rejects_invalid_url(): void
    {
        $response = $this->postJson('/shorten', [
            'original_url' => 'not-a-valid-url',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('original_url');
    }

    public function test_shorten_returns_existing_for_duplicate(): void
    {
        $original = Url::create([
            'original_url' => 'https://www.example.com',
            'short_code' => 'AbCdEf',
            'click_count' => 0,
        ]);

        $response = $this->postJson('/shorten', [
            'original_url' => 'https://www.example.com',
        ]);

        $response->assertOk()
            ->assertJsonFragment([
                'short_code' => 'AbCdEf',
            ]);

        $this->assertEquals(1, Url::where('original_url', 'https://www.example.com')->count());
    }

    public function test_redirect_to_original_url(): void
    {
        Url::create([
            'original_url' => 'https://www.example.com',
            'short_code' => 'AbCdEf',
            'click_count' => 0,
        ]);

        $response = $this->get('/AbCdEf');

        $response->assertRedirect('https://www.example.com');
    }

    public function test_redirect_increments_click_count(): void
    {
        Url::create([
            'original_url' => 'https://www.example.com',
            'short_code' => 'AbCdEf',
            'click_count' => 0,
        ]);

        $this->get('/AbCdEf');
        $this->get('/AbCdEf');

        $url = Url::where('short_code', 'AbCdEf')->first();
        $this->assertEquals(2, $url->click_count);
    }

    public function test_redirect_returns_404_for_unknown_code(): void
    {
        $response = $this->get('/ZzZzZz');

        $response->assertStatus(404);
    }
}
