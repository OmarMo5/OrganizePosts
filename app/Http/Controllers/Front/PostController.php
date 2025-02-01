<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function search(Request $request){
        $searPost = $request->q;
        //To keep the querystring with paginate during search using withQueryString()
        $post = Post::where('description','LIKE','%'.$searPost.'%')->orderBy('id',"DESC")->paginate(10)->withQueryString();
        return view('Posts.search',['searchPost'=>$post]);
    }
}
