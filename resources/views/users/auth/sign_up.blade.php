@extends('layout')

@section('content')
    
<form class='m-5 ps-5 pe-5' action="/register" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2 ">
      <label for="exampleFormControlInput1" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" required>
    </div>

    <div class="mb-2 ">
        <label for="ExampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    
    
    <div class="mb-2 ">
        <label for="ExampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
 
    <div class="mb-2 ">
        <label for="ExampleFormControlInput1" class="form-label">Password Confirmation</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-sm"
          style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/sign-in"
            class="link-danger">Login</a></p>
      </div>
</form>

@endsection