<?php

namespace App\GraphQL\Mutations;

use App\Models\Shorter\ShorterLink;
use Illuminate\Support\Str;

final class ShorterCreateShortUrl
{
    /**
     * @param $_
     * @param array $args
     * @return mixed|string
     */
    public function __invoke($_, array $args)
    {
        $url = $this->checkingOnHttp($args['url']);
        $shortUrl = $this->shortingLink();

        $newShorterLink = new ShorterLink;
        $newShorterLink->url = $url;
        $newShorterLink->short_url = $shortUrl;
        $newShorterLink->save();

        return $newShorterLink->short_url;
    }

    /**
     * @return string
     */
    protected function shortingLink(){
        $shortUrl = url('/urls') . '/' . Str::random(5);
        return $shortUrl;
    }

    /**
     * @param $url
     * @return mixed|string
     */
    protected function checkingOnHttp($url){
        if(!Str::contains($url, ['http://', 'https://'])){
            $url = 'http://' . $url;
        }
        return $url;
    }
}
