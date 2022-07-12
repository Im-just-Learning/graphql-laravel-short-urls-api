<?php

namespace App\Http\Controllers\Shorter;

use App\Http\Controllers\Controller;
use App\Models\Shorter\ShorterLink;
use Illuminate\Http\Request;

class ShorterLinkController extends Controller
{
    public function redirecting($url)
    {
        $short_url = url('/urls') . '/' . $url;

        $clickedLink = ShorterLink::where('short_url', $short_url)->first();

        if (!$clickedLink){
            dd('Ссылки нет');
        } else {
            $clickedLink->clicks ++;
            $clickedLink->save();
            return redirect()->away($clickedLink->url);
        }
    }
}
