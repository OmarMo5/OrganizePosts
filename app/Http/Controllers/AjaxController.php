<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate; 

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->paginate();
        return view('AjaxTags.index',['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AjaxTags.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dataValidation = $request->validate([
            'name' => ['required','string','min:3','max:100'],
       ]);
       Tag::create($dataValidation);
       return back()->with('success',"Tag Added Successfully...!");
       /* return response()->json(["status"=>"success","msg"=>"Tag Added Successfully...!"]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTag($id)
    {
        $getTag = Tag::findOrFail($id);
        return view('AjaxTags.edit',['editTag'=>$getTag]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTag(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $data = $request->validate([
            'name' => ['required','string','min:3','max:100'],
       ]);
        Tag::where('id',$id)->update($data); 

        return redirect('ajaxtags/showTag')->with('success',"Tag Updated Successfully...!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTag($id)
    {
        $deltag = Tag::findOrFail($id);
        $deltag->delete();

        return back()->with('success',"Tag Deleted Successfully...!");
        /* return response()->json(["status"=>"success","msg"=>"Tag Deleted Successfully...!"]); */

    }
}

