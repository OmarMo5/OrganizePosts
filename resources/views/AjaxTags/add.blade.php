@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">Add New Tag</h1>
    </div>
    <div class="col-12">
        <div class="col-6 mx-auto">
            <form action="{{url('ajaxtags/add')}}" method="POST" id="send-data" class="form border p-3">
                @csrf
                @include('inMsg.massega')
                <div class="alert alert danger d-none" id="showMsg"></div>
                <div class="mb-3">
                    <label for="">Tag Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" id="" class="form-control bg-success text-white">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')

    <script>
        let formElement = document.getElementById('send-data');
        let msgElement = document.getElementById('showMsg');
        formElement.addEventListener("submit",function(e){
            e.preventDefault();
            let input = document.querySelector("input[name='name']");
            let token = document.querySelector("input[name='_token']");
            fetch(formElement.action,{
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': token.value,
                    'Accept':'application/json',
                    'Content-Type':'application/json',
                },
                body:JSON.stringify({name:input.value})
            }).then(function(res){
                return res.json();
            }).then(data=>{
                msgElement.classList.remove('d-none');
                if(data'[status]'){
                    msgElement.classList.remove('alert-danger');
                    msgElement.classList.add('alert-success');
                    input.value = "";
                }
                else{
                    msgElement.classList.remove('alert-success');
                    msgElement.classList.add('alert-danger');
                }
                msgElement.textContent = data.message;
            }) 
        });
    </script>

@endsection