<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::orderByDesc('created_at')->get();

        return view('index', compact('urls'));
    }

    public function shorten(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'original_url' => ['required', 'url', 'max:2048'],
        ]);

        $existing = Url::where('original_url', $validated['original_url'])->first();

        if ($existing) {
            return response()->json([
                'short_url' => $existing->short_url,
                'short_code' => $existing->short_code,
                'original_url' => $existing->original_url,
                'click_count' => $existing->click_count,
            ]);
        }

        $url = Url::create([
            'original_url' => $validated['original_url'],
            'short_code' => Url::generateUniqueCode(),
            'click_count' => 0,
        ]);

        return response()->json([
            'short_url' => $url->short_url,
            'short_code' => $url->short_code,
            'original_url' => $url->original_url,
            'click_count' => $url->click_count,
        ], 201);
    }

    public function redirect(string $code): RedirectResponse
    {
        $url = Url::where('short_code', $code)->firstOrFail();

        $url->increment('click_count');

        return redirect()->away($url->original_url, 302);
    }
}
