<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <img src="{{asset('front-end/images/logo.png')}}" alt="">
        <span>
          Adward
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="/"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href=""> Teacher </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contact Us</a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link" href="">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Logout</a>
              </li>
              @else
                  <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                  </li>
            @endauth
          </ul>
        </div>
      </nav>
    </div>
</header>
