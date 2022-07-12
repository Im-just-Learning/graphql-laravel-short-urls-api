<?php

namespace App\Http\Controllers\Shorter;

use App\Http\Controllers\Controller;
use App\Models\Shorter\ShorterLink;
use function request;


class ShorterLinkController extends Controller
{
    public function redirecting()
    {
        $short_url = request()->url();

        $clickedLink = ShorterLink::where('short_url', $short_url)->first();

        if (!$clickedLink){
            return 'Ссылки нет';
        } else {
            $clickedLink->clicks ++;
            $clickedLink->save();
            return redirect()->away($clickedLink->url);
        }
    }
}
