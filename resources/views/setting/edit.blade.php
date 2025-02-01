@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">Edit Setting Info</h1>
    </div>
    <div class="col-12">
        <div class="col-12 mx-auto">
            <form action="{{url('setting/update')}}" method="POST" class="form border p-3">
                @method('PUT')
                @csrf
                @include('inMsg.massega')
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="">Site Name</label>
                        <input type="text" name="site_name" id="" class="form-control" value="{{$setting->site_name}}">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">Facebook</label>
                        <input type="url" name="facebook" id="" class="form-control" value="{{$setting->facebook}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="">gitHub</label>
                        <input type="url" name="github" id="" class="form-control" value="{{$setting->github}}">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="">linkedIn</label>
                        <input type="url" name="linkedin" id="" class="form-control" value="{{$setting->linkedin}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="">Youtube</label>
                        <input type="url" name="youtube" id="" class="form-control" value="{{$setting->youtube}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="">Content</label>
                        <textarea value="{{$setting->about_us_content}}" name="about_us_content" class="form-control" rows="10">
                            {{strip_tags($setting->about_us_content)}}
                        </textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Edit Setting" id="" class="form-control bg-success text-white">
                </div>
            </form>
        </div>
    </div>

@endsection