<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Newsletter;
use DB;

class SettingController extends Controller
{
    public function contact_us(Request $request)
    {
        $contact =  new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('success', 'The Message Send Successfully!');
    }

    public function newsletters(Request $request)
    {
        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();
        return back()->with('success', 'The Mail Send Successfullty!');
    }
}