<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Gate; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate();
        return view('Users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.add');
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
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string','min:6','max:30'],
            'confirm_password' => ['required','string','min:6','max:30','same:password'],
            'type' => ['required','in:admin,writer'],
       ]);
       User::create($dataValidation);
       return back()->with('success',"User Added Successfully...!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postsUser($id){
       $user = User::findOrFail($id);
       return view('Users.posts',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $getUser = User::findOrFail($id);
        return view('Users.edit',['editUser'=>$getUser]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => ['required','string','min:3','max:100'],
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable','string','min:6','max:30'],
            'confirm_password' => ['nullable','string','min:6','max:30','same:password'],
            'type' => ['required','in:admin,writer'],
       ]);
       $data['password'] = $request->has('password') ? bcrypt($request->password) : $user->password;
       unset($data['confirm_password']);
       User::where('id',$id)->update($data); 

        return redirect('users/showUser')->with('success',"User Data Updated Successfully...!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $deluser = User::findOrFail($id);
        $deluser->delete();

        return back()->with('success',"User Deleted Successfully...!");
    }
}
