<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Str;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $service_count = Service::count(); 
        return view('backend.home',compact('service_count'));
    }

    public function contact_list()
    {
        $contact = Contact::get();
        return view('backend.pages.contact-list',compact('contact'));
    }

    public function newsletter_list()
    {
        $newsletter = Newsletter::get();
        return view('backend.pages.newsletter-list',compact('newsletter'));
    }

    public function settings()
    {
        $copy_rights = Setting::where('type','copy_rights')->first();
        $footer = Setting::where('type','footer_content')->first();
        $youtube = Setting::where('type','youtube_link')->first();
        $insta = Setting::where('type','instagram_link')->first();
        $facebook = Setting::where('type','facebook_link')->first();
        $twitter = Setting::where('type','twitter_link')->first();
        $contact_number = Setting::where('type','contact_number')->first();
        $contact_mail = Setting::where('type','contact_mail')->first();
        $contact_address = Setting::where('type','contact_address')->first();
        $open_hours = Setting::where('type','open_hours')->first();
        $home_about_us = Setting::where('type','home_about_us')->first();
        $about_us_text = Setting::where('type','about_us_text')->first();
        $mission_vission_title =Setting::where('type','mission_vission_title')->first(); 
        $mission_vission = Setting::where('type','mission_vission')->first();
        $home_about_us_title = Setting::where('type','home_about_us_title')->first();
        $home_about_us_subtitle = Setting::where('type','home_about_us_subtitle')->first();
        $home_service_title = Setting::where('type','home_service_title')->first();
        $home_newsletter_title = Setting::where('type','home_newsletter_title')->first();
        $home_newsletter_subtitle = Setting::where('type','home_newsletter_subtitle')->first();
        $home_newsletter_button = Setting::where('type','home_newsletter_button')->first();
        $fav_icon = Setting::where('type','fav_icon')->first();
        $site_logo = Setting::where('type','site_logo')->first();
        $about_image = Setting::where('type','about_image')->first();
        $mis_vis_image = Setting::where('type','mis_vis_image')->first();

        return view('backend.pages.settings',compact('footer','youtube','insta','facebook','twitter','contact_number',
        'contact_mail','copy_rights','contact_address','open_hours','mission_vission','home_about_us','about_us_text',
        'home_about_us_title','home_about_us_subtitle','home_service_title','home_newsletter_title','home_newsletter_subtitle',
        'home_newsletter_button','mission_vission_title','fav_icon','site_logo','about_image','mis_vis_image'));
    }

    public function setting_update(Request $request)
    {
        foreach ($request->types as $key => $type) { 
            if ($type == 'fav_icon') {
                if ($request->hasFile('fav_icon')) {
                    $logo = $request->file('fav_icon');
                    if ($logo->isValid()) {
                        $logoExt = $logo->getClientOriginalExtension();
                        $logoName = Str::random(15) . '.' . $logoExt;
                        $path = public_path('/assets/media/images');
                        $logo->move($path, $logoName);
                        
                        $logoSetting = Setting::updateOrCreate(['type' => 'fav_icon']);
                        $logoSetting->value = $logoName;
                        $logoSetting->save();
                    }
                }
            } elseif ($type == 'site_logo') {
                if ($request->hasFile('site_logo')) {
                    $siteLogo = $request->file('site_logo');
                    if ($siteLogo->isValid()) {
                        $siteLogoExt = $siteLogo->getClientOriginalExtension();
                        $siteLogoName = Str::random(15) . '.' . $siteLogoExt;
                        $siteLogoPath = public_path('/assets/media/images');
                        $siteLogo->move($siteLogoPath, $siteLogoName);
    
                        $siteLogoSetting = Setting::updateOrCreate(['type' => 'site_logo']);
                        $siteLogoSetting->value = $siteLogoName;
                        $siteLogoSetting->save();
                    }
                }
            } else {
                $name = Setting::where('type', $type)->first(); 
                if ($name != null) {
                    if (gettype($request[$type]) == 'array') {
                        $name->value = json_encode($request[$type]);
                    } else { 
                        $name->value = $request[$type]; 
                    }
                    $name->save();
                } else {
                    $name = new Setting;
                    $name->type = $type; 
                    if (gettype($request[$type]) == 'array') {
                        $name->value = json_encode($request[$type]);
                    } else {
                        $name->value = $request[$type];
                    }
                    $name->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Setting Updated Successfully!');
    }

    public function service_index(){
        $service = Service::orderBy('id','desc')->get();
        return view('backend.services.index',compact('service'));
    }

    public function service_create(){
        $category = DB::table('categories')->get();
        return view('backend.services.create',compact('category'));
    }

    public function service_store(Request $request)
    {
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
        }
        $service = new Service;
        $service->cat_slug = $request->category;
        $service->name = $request->name;
        $service->image = $logoName;
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'The Service Store Successfully!.');
    }

    public function service_edit($id){
        $service = Service::where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('backend.services.edit',compact('service','category'));
    }

    public function service_update($id, Request $request)
    {
        $service = Service::where('id', $id)->first();
        $service->name = $request->name;
        $service->cat_slug = $request->category;
        
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
            $service->image = $logoName;
        }
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'The Service Update Successfylly!.');
    }

    public function service_delete($id){
        $service = Service::where('id', $id)->delete();
        return redirect()->route('admin.service.index')->with('success', 'The Service Delete Successfully!.');
    }

    public function gallery_index(){
        $gallery = Gallery::orderBy('id','desc')->get();
        return view('backend.gallery.index',compact('gallery'));
    }

    public function gallery_create(){
        return view('backend.gallery.create');
    }

    public function gallery_store(Request $request)
    {
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
        }
        $gallery = new Gallery;
        $gallery->image = $logoName;
        $gallery->save();
        return redirect()->route('admin.gallery.index')->with('success', 'The Gallery Store Successfully!.');
    }

    public function gallery_edit($id){
        $gallery = Gallery::where('id', $id)->first();
        return view('backend.gallery.edit',compact('gallery'));
    }

    public function gallery_update($id, Request $request){

        $gallery = Gallery::where('id', $id)->first();
      
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
            $gallery->image = $logoName;
            $gallery->save();
        }
        return redirect()->route('admin.gallery.index')->with('success', 'The Gallery Update Successfylly!.');
    }

    public function gallery_delete($id){
        $gallery = Gallery::where('id', $id)->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'The Gallery Delete Successfully!.');
    }


    public function home_slider_index(){
        $home_slider = HomeSlider::orderBy('id','desc')->get();
        return view('backend.home-slider.index',compact('home_slider'));
    }

    public function home_slider_create(){
        return view('backend.home-slider.create');
    }

    public function home_slider_store(Request $request)
    {
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
        }
        $home_slider = new HomeSlider;
        $home_slider->image = $logoName;
        $home_slider->save();
        return redirect()->route('admin.home_slider.index')->with('success', 'The Gallery Store Successfully!.');
    }

    public function home_slider_edit($id){
        $home_slider = HomeSlider::where('id', $id)->first();
        return view('backend.home-slider.edit',compact('home_slider'));
    }

    public function home_slider_update($id, Request $request){

        $home_slider = HomeSlider::where('id', $id)->first();
      
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
            $home_slider->image = $logoName;
            $home_slider->save();
        }
        return redirect()->route('admin.home_slider.index')->with('success', 'The Gallery Update Successfylly!.');
    }

    public function home_slider_delete($id){
        $home_slider = HomeSlider::where('id', $id)->delete();
        return redirect()->route('admin.home_slider.index')->with('success', 'The Gallery Delete Successfully!.');
    }


    public function category_index(){
        $category = DB::table('categories')->orderBy('id','desc')->get();
        return view('backend.category.index',compact('category'));
    }

    public function category_create(){
        return view('backend.category.create');
    }

    public function category_store(Request $request)
    {
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
        }

        $category = DB::table('categories')->insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $logoName,
        ]);
       
        return redirect()->route('admin.category.index')->with('success', 'The Category Store Successfully!.');
    }

    public function category_edit($id){

        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit',compact('category'));
    }

    public function category_update($id, Request $request)
    {
        $category = DB::table('categories')->where('id', $id)->first();    
        $update = [];
        $update['name'] = $request->name;
        $update['slug'] = $request->slug;
        
        if($logo = $request->file('image')){
            $logoExt = $logo->getClientOriginalExtension();
            $logoName = Str::random(15).'.'.$logoExt;
            $path = public_path('/assets/media/images');
            $logo->move($path,$logoName);
            $update['image'] = $logoName;   
        }
        // $category->save();
        DB::table('categories')->where('id', $id)->update($update);
        return redirect()->route('admin.category.index')->with('success', 'The Category Update Successfylly!.');
    }

    public function category_delete($id){
        $category = DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'The Category Delete Successfully!.');
    }

}