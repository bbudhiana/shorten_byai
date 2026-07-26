<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'original_url',
        'short_code',
        'click_count',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
    ];

    public function getShortUrlAttribute(): string
    {
        return url('/') . '/' . $this->short_code;
    }

    public static function generateUniqueCode(int $length = 6): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[random_int(0, strlen($characters) - 1)];
            }
        } while (static::where('short_code', $code)->exists());

        return $code;
    }
}
