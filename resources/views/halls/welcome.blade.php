@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="bg">
<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark-brown sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <!-- Dashboard -->
          <li class="nav-item">
          <a class="nav-link text-light a" href="{{url('/redirects')}}">
              Dashboard
            </a>
          </li>
          <!-- Bookings -->
          <li class="nav-item">
          <a class="nav-link text-light a" href="{{url('/adminbooking')}}">
              Bookings
            </a>
          </li>
          <!-- Hall -->
          <li class="nav-item">
            <a class="nav-link text-light a" aria-current="page" href="{{url('/hall')}}">
              Hall
            </a>
          </li>
          <!-- Package -->
          <li class="nav-item">
            <a class="nav-link text-light a" href="{{url('/package')}}">
              Package
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- Title -->
      <h1 class="display-5 fw-bold text-center p-4">View Hall</h1>

      <!-- Button for add new hall using modal -->
      <div class="text-end fixed-bottom p-4">
        <a href="#" class="btn btn-lg btn-dark rounded-circle " data-bs-toggle="modal"  data-bs-target="#addHallModel" title="Add new hall">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="45" fill="currentColor" class="bi bi-plus-lg " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
          </svg>
        </a>
      </div>

      <div class="py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach($halls as $hall)
          <div class="col">
              <!-- List of halls using card -->
              <div class="card-group">
              <div class="card shadow rounded h-100">
                <img src="cover/{{ $hall->cover }}" class="card-img-top" height="250px" alt="Hall {{ $hall->id }}">
                <!-- Card details -->
                <div class="card-body">
                  <h5 class="card-title">{{ $hall->name }}</h5>
                  <p class="card-text">{{ $hall->description }}</p>
                  <p class="card-text">
                    <i class="bi bi-tag"> RM{{ $hall->price }}</i><br> 
                    <i class="bi bi-geo-alt"> {{ $hall->location }}</i><br> 
                    <i class="bi bi-box-seam"> {{ $hall->package->name}}</i> 
                  </p>
                  <!-- Buttons -->
                  <div class="text-end">
                    <!-- Edit button -->
                    <a href="{{ url('/edit-hall/'.$hall->id) }}" class="btn btn-sm btn-secondary" title="Edit">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <!-- Delete button -->
                    <form action="{{ url('/delete-hall/'.$hall->id) }}" method="post">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger mt-3" type="submit" onclick="return confirm('Confirm delete');" title="Delete">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                    <!-- Date created -->
                    <small class="text-muted">
                      created {{ $hall->created_at->diffForHumans() }}
                    </small>
                  </div>
                </div>
              </div>
            </div>
            </div>
          @endforeach
        </div>
      </div>
<!-- to call the add hall modal -->
@include('halls.modal.newHall')
@endsection
</div>
</main>