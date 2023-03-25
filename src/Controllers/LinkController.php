<?php

namespace Mlopez\UrlShortener\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller as BaseController;
use Mlopez\UrlShortener\Models\Link;

class LinkController extends BaseController
{
    public function store(Request $request)
    {
        $long_url = $request->get('long_url');
        $shortened_url = $this->generateRandomString();
        return Link::query()->create([
            'long_url' => $long_url,
            'code' => $shortened_url,
            'short_url' => Config::get('urlshortener.base_url')."/$shortened_url",
        ]);
    }

    public function show($link_code)
    {
        try {
            $link = Link::query()->where('code', '=', $link_code)->first();
            if (null == $link) {
                throw new \Exception('Link no existe');
            }
            $link->clicks = $link->clicks + 1;
            $link->save();
            return Response::redirectTo($link->long_url);
        } catch (\Exception $e) {
            report($e);
        }

    }

    protected function generateRandomString($length = 6): string
    {
        $sets = explode('|', config('urlshortener.chars'));
        $all = '';
        $randString = '';
        foreach($sets as $set){
            $randString .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++){
            $randString .= $all[array_rand($all)];
        }
        return str_shuffle($randString);
    }
}
