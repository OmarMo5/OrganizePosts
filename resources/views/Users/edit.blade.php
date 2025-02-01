@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">Edit User</h1>
    </div>
    <div class="col-12">
        <div class="col-6 mx-auto">
            <form action="{{url('users/update/'.$editUser->id)}}" method="POST" class="form border p-3">
                @method('PUT')
                @csrf
                @include('inMsg.massega')
                <div class="mb-3">
                    <label for="">User Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{$editUser->name}}">
                </div>
                <div class="mb-3">
                    <label for="">User Email</label>
                    <input type="email" name="email" id="" class="form-control" value="{{$editUser->email}}">
                </div>
                <div class="mb-3">
                    <label for="">User password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control">
                         <!-- <option value="admin">{{$editUser->type}}</option>  -->
                        <option value="admin">Admin</option>
                        <option value="writer">Writer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Edit User" id="" class="form-control bg-success text-white">
                </div>
            </form>
        </div>
    </div>

@endsection