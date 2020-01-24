<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 nav-tabs">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link navbar-nav pt-1" href="#">Search Jobs <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-nav pt-1" href="#">Training</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pt-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             My Job Street
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item disabled">My Profile</a>
                <a class="dropdown-item" href="/review-profile">Review Profile</a>
                <a class="dropdown-item" href="/review-profile">Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
        <form id="search_form" action="/searchjobs" method="GET">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="title" id="title-search">
          <button class="btn btn-outline-success my-2 my-sm-0 mx-3" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
