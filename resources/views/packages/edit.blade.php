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
          <a class="nav-link text-light a" aria-current="page" href="{{url('/redirects')}}">
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
            <a class="nav-link text-light a"  href="{{url('/hall')}}">
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
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
    <h1 class="display-5 fw-bold text-center mt-4">Edit Package</h1>
    <div class="container shadow p-4 mt-4 rounded bg-white border-outline">
<form method="post" action="{{url('/edit-package/'.$package->id)}}">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group mb-3">
    <label for=""><b>Name</b></label>
    <input type="text" name="name" value="{{old('name') ?? $package->name }}" class="form-control" placeholder="Name">
  </div>
  <div class="form-group mb-3">
    <label for=""><b>Price</b></label>
    <input type="number" name="price" value="{{old('price') ?? $package->price }}" class="form-control" placeholder="Price">
  </div>
  <div class="form-group mb-3">
    <label for=""><b>Pax</b></label>
    <input type="number" name="pax" value="{{old('pax') ?? $package->pax }}" class="form-control" placeholder="Pax">
  </div>
  <div class="form-group mb-3">
    <label for=""><b>Service</b></label>
    <input type="text" name="service" value="{{old('service') ?? $package->service }}" class="form-control" placeholder="Service">
  </div>
  
  
  <div class="text-end">
    <button type="submit" class="btn btn-primary mt-3">Save changes</button>
  </div>
</form>
</div>


@endsection
</main>
  </div>
</div>
