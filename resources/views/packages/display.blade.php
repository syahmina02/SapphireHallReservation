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
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <!-- Bookings -->
          <li class="nav-item">
          <a class="nav-link text-light a" href="{{url('/adminbooking')}}">
              <span data-feather="file"></span>
              Bookings
            </a>
          </li>
          <!-- Hall -->
          <li class="nav-item">
            <a class="nav-link text-light a" href="{{url('/hall')}}">
              <span data-feather="file"></span>
              Hall
            </a>
          </li>
          <!-- Hall -->
          <li class="nav-item">
            <a class="nav-link text-light a" href="{{url('/package')}}">
              <span data-feather="file"></span>
              Package
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <!-- Title -->
      <h1 class="display-5 fw-bold text-center mt-4">View Package</h1>

      <!-- Button for add new package using modal -->
      <div class="text-end fixed-bottom p-4">
        <a href="" class="btn btn-lg btn-dark rounded-circle shadow" data-bs-toggle="modal" data-bs-target="#addPackageModel" title="Add new package">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="45" fill="currentColor" class="bi bi-plus-lg " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
          </svg>
        </a>
      </div>
      
      <div class="py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach($packages as $package)
            <div class="col">
              <!-- List of package using card -->
              <div class="card shadow h-100">
                <div class="card-header">
                  <h5 class="card-title">{{ $package->name }}</h5>
                </div>
                <!-- Card details -->
                <div class="card-body">
                  <p class="card-text">
                    <i class="bi bi-tag"> RM{{ $package->price }}</i> &ensp; 
                    <i class="bi bi-person"> {{ $package->pax }} pax</i> &ensp; 
                    <i class="bi bi-pin-angle"> {{ $package->service}}</i> 
                  </p>
                  <!-- Buttons -->
                  <div class="text-end">
                    <!-- Edit button -->
                    <a href="{{url('/edit-package/'.$package->id)}}" class="btn btn-sm btn-secondary" title="Edit">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <!-- Delete button -->
                    <form action="{{ url('/delete-package/'.$package->id) }}" method="post">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger mt-3" type="submit" onclick="return confirm('Confirm delete');" title="Delete">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>  
                    <!-- Date created -->
                    <small class="text-muted">
                      created {{ $package->created_at->diffForHumans() }}
                    </small>
                  </div>
                </div>
             </div>
            </div>
          @endforeach
        </div>
      </div>

<!-- to call the add pakage modal -->
@include('packages.modal.newPackage')
@endsection
</div>
</div>
</main>