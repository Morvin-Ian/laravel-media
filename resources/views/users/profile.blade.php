@extends('layout')

<link rel="stylesheet" href="{{asset('css/profile.css')}}">

@section('content')
@include('partials/_topnav')


<div class="profile-content">

        <div class="left-sidebar ">
            <div class="top">
                <h3> <i class="fas fa-gem"></i> Brace Plans</h3>
                <ul>
                    <li>Improve social connections.</li>
                    <li>Enhance online marketing.</li>
                    <li>Achieve 20 million users.</li>
                
                </ul>
                <button class="btn">MORE INFO</button>
            </div>

            <div class="bottom mt-3">
                <h3>Brace trends</h3>
                {{-- {% for topic in topics %} --}}
                    <ul>
                        {{-- <li><small>{{topic.name| truncatewords:3}}</small></li> --}}
                    </ul>
                {{-- {% endfor %} --}}
                
            </div>
          

        </div>
 
        <div class="media-body" style="height: 100vh;">
            @if ($user->uuid === $profile_owner->uuid)
            <h5 class="pt-2 text-center">Update Profile</h5>

            <div class="d-flex">
                <img  style="object-fit: cover;" class="rounded-circle account-img" src="/images/boy.jpg" width="100px" height="100px">

                <div class="ms-3 mt-4">
                    <p class="account-heading ">{{ $user->username }}</p>
                    <small class="text-secondary ">{{$user->email}}</small>        

                </div>

            </div>

            <div style="font-size: 13px;" class="text-wrap lead mt-3 mb-3">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident ratione, 
                dolorem molestiae ea officia eligendi quis consequatur illo ab iste quibusdam 
                quisquam est, optio minus in esse tempore ipsam non autem? Modi tempora tenetur eveniet! Blanditiis laborum 
                vero doloremque nisi nesciunt pariatur saepe ipsam. Ab, esse. Exercitationem officia eligendi labore!
            </div>

            <form method='POST' enctype="multipart/form-data">
                 @csrf
                    {{-- {{ d_form|crispy }}
                    {{ p_form|crispy }}   --}}

                    <button class="btn" type="submit" name="update" >Edit</button>
             
            </form>
                
            @else
                <h5 class="pt-2 text-center">{{ $profile_owner->username }}'s Profile</h5>
                <div class="d-flex">
                    <img  style="object-fit: cover;" class="rounded-circle account-img" src="/images/boy.jpg" width="100px" height="100px">

                    <div class="ms-3 mt-4">
                        <p class="account-heading ">{{ $profile_owner->username }}</p>
                        <small class="text-secondary ">{{$profile_owner->email}}</small>  

                    </div>

                </div>

                <div style="font-size: 13px;" class="text-wrap lead mt-3">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident ratione, 
                    dolorem molestiae ea officia eligendi quis consequatur illo ab iste quibusdam 
                    quisquam est, optio minus in esse tempore ipsam non autem? Modi tempora tenetur eveniet! Blanditiis laborum 
                    vero doloremque nisi nesciunt pariatur saepe ipsam. Ab, esse. Exercitationem officia eligendi labore!
                </div>
                
            @endif
         
        </div>     

        <div class="left-sidebar">
            <div class="top">
                <h3>Your Reminders</h3>
                <ul>
                    <li>Web Development.</li>
                    <li>Attend Flutter Conference.</li>
                    <li>Android Development.</li>
                
                </ul>
                <button class="btn">RE-SCHEDULE</button>
            </div>

            <div class="bottom mt-3">
                <h3>Brace Blogs</h3>
            
                    <ul>
                        <li><small>Titanic Ship</small></li>
                        <li><small>Fifa 23 Release</small></li>
                        <li><small>Economic Recession</small></li>
                        <li><small>Labour Day (Kenya)</small></li>
                    </ul>
            
                
            </div>
          

        </div>
 


</div>
   
@endsection
