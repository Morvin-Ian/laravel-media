@extends('layout')

<link rel="stylesheet" href="{{asset('css/style.css')}}">


@section('content')
@include('partials/_topnav')
@include('partials/_nav')

        <div class="container">
        <div class="left-panel">
            <ul>
                @auth
                    <a style="text-decoration: none; color:black;" href="{{route('profile',Auth::user()->uuid)}}">
                        <li>
                            <img style="object-fit: cover;" class="rounded-circle account-img" src="{{Auth::user()->profile ? asset('storage/'.Auth::user()->profile) : asset('/images/boy.jpg')}}" width="30px" height="30px">
                            <p>Profile</p>
                        </li>
                    </a>

                    <a style="text-decoration: none; color:black;" href="/posts/create-post">
                        <li>
                            <p style="font-size: large">+</p>
                            <p>Create Post</p>
                        </li>
                    </a>
                @endauth
                
                <li>
                    <i class="fa fa-user-friends"></i>
                    <p>Friends</p>
                </li>
                <li>
                    <i class="fa fa-play-circle"></i>
                    <p>Videos</p>
                </li>
                <li>
                    <i class="fa fa-flag"></i>
                    <p>Pages</p>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <p>Groups</p>
                </li>
                <li>
                    <i class="fa fa-bookmark"></i>
                    <p>Bookmark</p>
                </li>
                <li>
                    <i class="fab fa-facebook-messenger"></i>
                    <p>Inbox</p>
                </li>
   
            </ul>

            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Advance</a>
                <a href="#">More</a>
            </div>
        </div>


        <div class="middle-panel">

            <div class="story-section">

                <div class="story create">
                    <div class="dp-image">
                        <img src="./images/dp.jpg" alt="Profile pic">
                    </div>
                    <span class="dp-container">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="name">Create Story</span>
                </div>


                <div class="story">
                    <img src="./images/model.jpg" alt="Anuska's story">
                    <div class="dp-container">
                        <img src="./images/girl.jpg" alt="">
                    </div>
                    <p class="name">Anuska Sharma</p>
                </div>

                <div class="story">
                    <img src="./images/boy.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/dp.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Gaurav Gall</span>
                </div>

                <div class="story">
                    <img src="./images/mountains.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/boy.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Priyank Saksena</span>
                </div>

                <div class="story">
                    <img src="./images/shoes.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/model.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Pragati Adhikari</span>
                </div>
            </div>

            <div class="post create">
                <div class="post-top">
                    <div class="dp">
                        <img src="./images/girl.jpg" alt="">
                    </div>
                    <input type="text" placeholder="What's on your mind, Aashish ?" />
                </div>
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="fa fa-video"></i>
                        <span>Live video</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-image"></i>
                        <span>Photo/Video</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-smile"></i>
                        <span>Feeling/Activity</span>
                    </div>
                </div>
            </div>


            @foreach ($posts as $post)
            <div class="post">
            <div class="post-top">
                <div class="dp">
                    <img src="./images/dp.jpg" alt="">
                </div>
                <div class="post-info">
                    <p class="name">Ramesh GC</p>
                    <span class="time">2 days ago</span>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div class="post-content">
                @if ($post->caption)
                    <p>{{$post->caption}}</p>
                @endif

                @if ($post->image)
                    <img style="object-fit:cover; border-radius: 10px;" src="{{asset('storage/'.$post->image)}}" height="300px" />
                @endif
            </div>
            
            <div class="post-bottom">
                <div class="action">
                    <i class="far fa-thumbs-up"></i>
                    <span>Like</span>
                </div>
                <div class="action">
                    <i class="far fa-comment"></i>
                    <span>Comment</span>
                </div>
                <div class="action">
                    <i class="fa fa-share"></i>
                    <span>Share</span>
                </div>
                </div>
            </div>
                    
            @endforeach
    
            
        </div>
        <div class="right-panel">
            <div class="pages-section">
                <h4>Your pages</h4>
                <a class='page' href="#">
                    <div class="dp">
                        <img src="./images/logo.png" alt="">
                    </div>
                    <p style="font-size: small;"  class="name">Cody</p>
                </a>

                <a class='page' href="#">
                    <div class="dp">
                        <img src="./images/dp.jpg" alt="">
                    </div>
                    <p style="font-size: small;"  class="name">Cody Tutorials</p>
                </a>
            </div>

            <div class="friends-section">
                <h4>Friends</h4>
                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./images/dp.jpg" alt="">
                    </div>
                    <p style="font-size: small;"  class="name">Henry Mosely</p>
                </a>

                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./images/shoes.jpg" alt="">
                    </div>
                    <p style="font-size: small;"  class="name">George</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/boy.jpg" alt="">
                    </div>
                    <p  style="font-size: small;"  class="name">Aakash Malhotra</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/model.jpg" alt="">
                    </div>
                    <p style="font-size: small;" class="name">Ragini Khanna</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/boy.jpg" alt="">
                    </div>
                    <p style="font-size: small;" class="name">Justin Bieber</p>
                </a>

               
                
            </div>
        </div>
    </div>
    
@endsection