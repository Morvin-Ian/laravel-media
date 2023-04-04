@extends('layout')

<link rel="stylesheet" href="{{asset('css/topnav.css')}}">


<section class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid">
     
        <a class="navbar-brand text-dark" href="#"> <i class="fas fa-gem"></i> Brace</a>

      <button style="background-color: #001c40;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="" aria-current="page" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="" aria-current="page" href="">Contacts</a>
                </li>

                <li class="nav-item">
                    <a class="" aria-current="page" href="">Notifications</a>
                </li>

                <li class="nav-item">
                    <a class="" aria-current="page" href="">About</a>
                </li>

                <li class="nav-item">
                    <a class="" aria-current="page" href="">Blog</a>
                </li>
        </ul>
        <li>
            <a class="ms-5" style="margin-right: 30px;" href="/profile"><i style="font-size: x-large;" class="fas fa-user-circle"></i></a>
        </li>
      </div>
    </div>
</section>