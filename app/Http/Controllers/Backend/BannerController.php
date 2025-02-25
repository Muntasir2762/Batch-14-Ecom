<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function showBanners ()
    {
        $banners = Banner::get();
        return view('backend.banner.list', compact('banners'));
    }
}
