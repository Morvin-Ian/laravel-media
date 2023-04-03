<nav>
    <div class="nav-left">
        <i style="font-size: larger" class="fas fa-gem"></i>
        <input type="text" placeholder="Search Brace..">
    </div>

    <div class="nav-middle">
        <a href="#" class="active">
            <i class="fa fa-home"></i>
        </a>

        <a href="#">
            <i class="fa fa-user-friends"></i>
        </a>

        <a href="#">
            <i class="fa fa-play-circle"></i>
        </a>

        <a href="#">
            <i class="fa fa-users"></i>
        </a>
    </div>

    @auth
    <div class="nav-right">
        <span class="profile"></span>

        <a href="#">
            <i class="fa fa-bell"></i>
        </a>

        <a href="#">
            <i class="fas fa-ellipsis-h"></i>
        </a>

        <a href="/logout">
            <i class="fas fa-arrow-right"></i> 
        </a>  
    </div>
    @else
    <div class="nav-right me-3">
        <a href="/sign-up">
            <i class="fas fa-user"></i>
        </a>

        <a href="/sign-in">
            <i class="fas fa-arrow-right"></i> 
        </a>  
    </div>
        
    @endauth

   
</nav>


