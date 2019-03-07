<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="{{ Request::is('/') ? "active":""}}">
        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="{{ Request::is('about') ? "active":""}}">
        <a class="nav-link" href="{{route('about')}}">About</a>
      </li>
      <li class="{{ Request::is('contact') ? "active":""}}">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
      </li>
      <li class="{{ Request::is('blog') ? "active":""}}">
        <a class="nav-link" href="{{route('blog')}}">Blog</a>
      </li>

      @if(Auth::check())

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
          <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
          <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
          <a class="dropdown-item" href="{{ auth::logout()}}">Logout</a>
        </div>
      </li>

      @else
                  
      <li class="{{ Request::is('login') ? "active":""}}">
        <a class="nav-link" href="{{route('login')}}">LogIn</a>
      </li>
      <li class="{{ Request::is('regiser') ? "active":""}}">
        <a class="nav-link" href="{{route('register')}}">Register</a>
      </li>

      @endif
    </ul>
  </div>
</nav>