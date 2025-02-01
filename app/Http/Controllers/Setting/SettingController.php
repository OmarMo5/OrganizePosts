<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function editSetting(){
        return view('setting.edit');
    }

    public function updateSetting(Request $request){
        $request->validate([
            "site_name"=>["required","string"],
            "facebook"=>["required","url"],
            "github"=>["required","url"],
            "linkedin"=>["required","url"],
            "youtube"=>["required","url"],
            "about_us_content"=>["required"],
        ]);

        $data = Setting::first();
        $data->site_name = $request->site_name;
        $data->facebook = $request->facebook;
        $data->github = $request->github;
        $data->linkedin = $request->linkedin;
        $data->youtube = $request->youtube;
        $data->about_us_content = $request->about_us_content;
        $data->save();

        return back()->with("success","Setting Updated Successfully...!");
    }
}
