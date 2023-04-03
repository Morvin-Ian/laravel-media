@extends('layout')

@section('content')

@if(session()->has('message'))
  <div class="container">
      <p class="text-center">
          <small class="bg-danger pt-2 pb-2 ps-5 pe-5" style="color: white;" >{{session('message')}}</small>
      </p>
  </div>

@endif
    
<form class='m-5 ps-5 pe-5' action="/login" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2 ">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>

    
    <div class="mb-2 ">
        <label for="ExampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-sm"
          style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/sign-up"
            class="link-danger">Sign Up</a></p>
    </div>
</form>

@endsection