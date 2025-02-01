<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate; 

class POstController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate();
        return view("Posts.index",['posts'=>$posts]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showPost($id){
        $getPost = Post::findOrFail($id);
        return view('Posts.post',['post'=>$getPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id',"name")->get();
        $tags = Tag::select('id',"name")->get();
        return view('Posts.add',compact('users','tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => ['required','string','min:3'],
            'description' => ['required','string','max:1500'],
            'user_id' => ['required','exists:users,id'],
            'image' => ['required','image','mimes:png,jpg,jpeg,gif'],
       ]);
       $image = $request->file('image')->store('public');

       $post = new Post();
       $post->title = $request->title;
       $post->description = $request->description;
       $post->user_id = $request->user_id;
       $post->image = $image;
       $post->save();

       $post->tag()->sync($request->tags);

       return back()->with('success',"Post Added Successfully...!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        $getPost = Post::findOrFail($id);
        $tags = Tag::select('id','name')->get();
        $users = User::select('id','name')->get();
        return view('Posts.edit',['editPost'=>$getPost,'editUser'=>$users,'editTags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost($id,Request $request)
    {
        $upPost = Post::findOrFail($id);
        $upPost->title = $request->title;
        $upPost->description = $request->description;
        $upPost->user_id = $request->user_id;

        $olde_image = $upPost->image;
        if($request->hasFile('image')){
            $new_image = $request->file('image')->store('public');
            File::delete($olde_image);      //to del old image 
            $upPost->iamge = $new_image;    //to add new image
        }
        $upPost->save();

        $upPost->tag()->detach();  //this del the old tags from table tag,
        $upPost->tag()->sync($request->tags); //then added new tags

        return redirect('posts/showAll')->with('success',"Post Updated Successfully...!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost($id)
    {
        //dd($id);
        $delPost = Post::findOrFail($id);
        $delPost->delete();

        return back()->with('success',"Post Deleted Successfully...!");
    }

}
