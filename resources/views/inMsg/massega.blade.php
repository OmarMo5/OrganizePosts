@if ($errors->any())
    <div class="alert alert-danger p-1">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session()->get('success'))
    <h3 class="btn btn-success p-3 my-3" class="text-center">{{Session()->get('success')}}</h3>
@endif