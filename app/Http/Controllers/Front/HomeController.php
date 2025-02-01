<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Mail\SendMessageMail;
//use App\Services\PayUService\Exception;

class HomeController extends Controller
{
    public function indexHome()
    {
        $posts = Post::orderBy('id','DESC')->paginate(12);
        return view("Front.index",['posts'=>$posts]);
    }

    public function about()
    {
        return view("Front.about");
    }

    public function contact()
    {
        return view("Front.contact");
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            "name"=>["required","string","min:3","max:50"],
            "email"=>["required","email","max:50"],
            "phone"=>["required","numeric"],
            "message"=>["required","string","min:5","max:500"],
        ]);
        try{
                 //here Mail to you want send to it
            Mail::to("omarmokhtar20015@gmail.com")->send(new SendMessageMail());
        }catch(Exception  $er){
            return back()->withErrors("Email Failed To Send...!");
        }

        return back()->with('Success',"Email has been sended Successfully");
    }
}
