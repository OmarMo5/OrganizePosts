@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">Edit Tag</h1>
    </div>
    <div class="col-12">
        <div class="col-6 mx-auto">
            <form action="{{url('ajaxtags/update/'.$editTag->id)}}" method="POST" class="form border p-3">
                @method('PUT')
                @csrf
                @include('inMsg.massega')
                <div class="mb-3">
                    <label for="">Tag Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{$editTag->name}}">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Edit Tag" id="" class="form-control bg-success text-white">
                </div>
            </form>
        </div>
    </div>

@endsection