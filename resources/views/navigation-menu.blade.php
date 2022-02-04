<style>
      .bg {
        background-color: #FCF8F3;
      }
      .bg-dark-brown{
        background-color: #564130;
      }
      .bg-buttons{
        background-color: #444444;
      }
      .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
        background-color: #444444 !important;
        border: none !important;
      }
      .border-outline{
        border-style: solid !important; 
        border-width: 1px !important;
        border-color: #564130 !important;
      }
      .border-hg{
        border-left: 5px solid #8D7358 !important; 
      }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<header>
<nav class="navbar navbar-expand-lg bg-transparent navbar-light p-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('home')}}"><b>SAPPHIRE</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            
            <li class="nav-item dropdown">
              <button class="btn bg-white btn-lg" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list"></i>  |  <i class="bi bi-person-circle"></i>
              </button>
              
              <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdownMenuLink">
                
                <li><a class="dropdown-item" href="/redirects">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>

                <!-- <li>
                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                </a>
            
                </li>
                <li><hr class="dropdown-divider"></li> -->

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                    </form>
                </li>

              </ul>
            </li>
          </ul>

         
        </div>
  </nav>
</header>

@yield('content')

</body>
</html>