@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="container-fluid bg">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark-brown sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <!-- User Profile -->
          <li class="nav-item">
            <a class="nav-link text-light a" aria-current="page" href="redirects">
              Dashboard
            </a>
          </li>
          <!-- Bookings -->
          <li class="nav-item">
          <a class="nav-link text-light a" href="/userbooking/{{$userId}}">
              Bookings
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <!-- Title -->
      <div class="col md-8 text-center"></div>
        <section style="padding-top: 50px;">
            <div class="container bg-white shadow p-3 mb-5 rounded border-outline p-5">
                <div class="row">
                    <div class="col md-8 text-center">
                        <img src="/image/undraw_handcrafts_welcome.png" class="img-fluid" style="height: 200px;" alt="welcome">
                        <h5 class="text-center mt-4">This is {{$name}}'s dashboard</h5>
                    </div>
                </div>
            </div>
        </section>
@endsection
</main>
