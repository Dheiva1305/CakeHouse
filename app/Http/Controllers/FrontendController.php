<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function homepage()
    {
        $service = DB::table('categories')->orderBy('id', 'desc')->get(); 
        $home_slider = HomeSlider::orderBy('id', 'desc')->get();
        return view('frontend.homepage',compact('service','home_slider'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function gallery()
    {
        $gallery = Gallery::orderBy('id', 'desc')->paginate(6);
        return view('frontend.gallery',compact('gallery'));
    }

    public function services()
    {
        $category = DB::table('categories')->orderBy('id','desc')->paginate(6);
        return view('frontend.service',compact('category'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function serviceDetail($slug)
    {
        $service= Service::where('cat_slug',$slug)->get();
        return view('frontend.service-detail',compact('service'));
    }

}