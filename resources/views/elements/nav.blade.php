<header class="p-3 text-bg-dark bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('books.index')}}" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="{{route('books.index')}}" class="nav-link px-2 text-white">Books</a></li>
          <li><a href="{{route('books.form')}}" class="nav-link px-2 text-white">Add Book</a></li>
          <li><a href="{{route('notes.create')}}" class="nav-link px-2 text-white">Add Notes</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          @guest
          <a href="{{route('users.loginForm')}}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{route('users.registerForm')}}" class="btn btn-warning">Register</a>
          @endguest
          @auth
          <a href="#" class="link-light px-2">{{Auth::user()->name}}</a>
          <a href="{{route('users.logout')}}" class="btn btn-warning">Logout</a>
          @endauth
        </div>
      </div>
    </div>
  </header>