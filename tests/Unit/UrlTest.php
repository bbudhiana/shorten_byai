<?php

namespace Tests\Unit;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_unique_code_returns_6_chars(): void
    {
        $code = Url::generateUniqueCode();

        $this->assertEquals(6, strlen($code));
    }

    public function test_generate_unique_code_is_alphanumeric(): void
    {
        $code = Url::generateUniqueCode();

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{6}$/', $code);
    }

    public function test_generate_unique_code_is_truly_unique(): void
    {
        $codes = [];
        for ($i = 0; $i < 100; $i++) {
            $codes[] = Url::generateUniqueCode();
        }

        $this->assertCount(100, array_unique($codes));
    }

    public function test_short_url_accessor_returns_correct_format(): void
    {
        $url = Url::create([
            'original_url' => 'https://www.example.com',
            'short_code' => 'AbCdEf',
            'click_count' => 0,
        ]);

        $shortUrl = $url->short_url;

        $this->assertStringEndsWith('/AbCdEf', $shortUrl);
        $this->assertStringStartsWith('http', $shortUrl);
    }
}
