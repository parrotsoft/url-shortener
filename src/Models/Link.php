<?php

namespace Mlopez\UrlShortener\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Link extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = Config::get('urlshortener.table');
    }

    protected $fillable = [
        'long_url',
        'code',
        'short_url',
        'clicks',
    ];

    protected $casts = [
        'long_url' => 'string',
        'code' => 'string',
        'short_url' => 'string',
        'clicks' => 'integer',
    ];
}
