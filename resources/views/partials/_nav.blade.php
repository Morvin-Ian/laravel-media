@extends('layout')

<link rel="stylesheet" href="{{asset('css/nav.css')}}">

<nav >
    <div class="container-fluid">
      <div class="d-flex justify-content-evenly p-3">
        <div class="welcome pt-3">
            <h2>Hello, Morvin Ian!!</h2>
            <small>Converse with friends and families.</small>
        </div>
        @auth

        <div class="sign-out pt-4">
            <a class="btn ps-4 pe-4 ms-5" href="/logout">Sign Out <i class="fas fa-arrow-right"></i> </a>  <br>
            <a class="text-center" href="/sign-up">Register another account.</a>
         </div>

        @else
        <div class="sign-out pt-4">
            <a class="btn ps-4 pe-4 ms-5" href="/sign-in">Sign In <i class="fas fa-arrow-right"></i> </a>  <br>
            <a class="text-center" href="/sign-up">Register another account.</a>
         </div>
            
        @endauth
       

      </div>
      
    </div>

</nav>
