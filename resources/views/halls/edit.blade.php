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
          <!-- Booking -->
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
            <a class="nav-link text-light a" href="{{url('/hall')}}">
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
      <!-- Title -->
      <h1 class="display-5 fw-bold text-center mt-4">
        Edit {{$hall->name }}
      </h1>
      
      <!-- Container for edit form -->
      <div class="container shadow p-4 mt-4 rounded bg-white border-outline">
      <!-- Edit form start -->
        <form method="post" action="{{url('/edit-hall/'.$hall->id)}}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          <!-- Hall's ID -->
          <div class="form-group mb-3">
            <label for=""><b>ID</b></label>
            <input type="text" name="id" value="{{old('id') ?? $hall->id }}" class="form-control" placeholder="Id" disabled>
          </div>
          <!-- Hall's Name -->
          <div class="form-group mb-3">
            <label for=""><b>Name</b></label>
            <input type="text" name="name" value="{{old('name') ?? $hall->name }}" class="form-control" placeholder="Name" required>
          </div>
          <!-- Hall's Description -->
          <div class="form-group mb-3">
            <label for=""><b>Description</b></label>
            <textarea class="form-control" rows="4" name="description" placeholder="Description" required>{{old('description') ?? $hall->description }}</textarea>
          </div>
          <!-- Address1 -->
          <div class="form-group mb-3">
            <label for=""><b>Address line 1</b></label>
            <input type="text" name="address1" value="{{old('address1') ?? $hall->address1 }}" class="form-control" placeholder="Address" required>
          </div>

          <!-- Address2 -->
          <div class="form-group mb-3">
            <label for=""><b>Address line 2</b></label>
            <input type="text" name="address2" value="{{old('address2') ?? $hall->address2 }}" class="form-control" placeholder="Address" required>
          </div>

          <!-- City -->
          <div class="row g-3 ">
            <div class="col-md-6 ">
              <label for=""><b>City</b></label>
              <input type="text" name="city" value="{{old('city') ?? $hall->city }}" class="form-control" placeholder="City" required>
            </div>

            <!-- State (Location) -->
            <div class="col-md-4 ">
              <label for=""><b>State</b></label>
                <select name="location" id="location" class="form-select mb-3">
                  <option selected>{{old('location') ?? $hall->location }}</option>
                  <option value="Kuala Lumpur">Kuala Lumpur</option>
                  <option value="Johor">Johor</option>
                  <option value="Perak">Perak</option>
                  <option value="Melaka">Melaka</option>
                </select>
            </div>

            <!-- Zip -->
            <div class="col-md-2">
              <label for=""><b>Zip</b></label>
              <input type="text" name="zip" value="{{old('zip') ?? $hall->zip }}" class="form-control" placeholder="Zip" required>
            </div>
          </div>

          <!-- Hall's Package -->
          <div class="form-group mb-3">
            <label for=""><b>Package</b></label>
            <select name="package_id" class="form-select mb-3" id="package_id" required>
              @foreach($packages as $package)
                <option value="{{$package->id}}">{{ $package->name }}</option>
              @endforeach
            </select>
          </div>
          <!-- Hall's Price -->
          <div class="form-group mb-3">
            <label for=""><b>Price(RM)</b></label>
            <input type="number" name="price" value="{{old('price') ?? $hall->price }}" class="form-control" placeholder="Price" required>
          </div>
          <!-- Hall's Image -->
          <div class="form-group mb-3">
            <label for=""><b>Cover image</b></label>
            <input type="file" id="input-file-now-custom-3" class="form-control" name="cover">
            <br>
            <label for=""><b>Images</b></label>
            <input type="file" id="input-file-now-custom-3" class="form-control" name="images[]" multiple>
          </div>
          <!-- Save change button -->
          <div class="text-end mb-4">
            <button type="submit" class="btn btn-primary mt-3">Save changes</button>
          </div>
        </form>

        <h6><b>Image preview</b></h6>
        <div class="card-group">
          <div class="card text-center" style="width: 18rem;">
            <img src="/cover/{{ $hall->cover }}" class="card-img-top h-50" alt="cover image">
            <div class="card-body">
              <h5 class="card-title">Cover Image</h5>
              <form action="/deletecover/{{ $hall->id }}" method="post">
                <button class="btn btn-sm btn-danger" onclick="return confirm('Confirm delete');" title="Delete">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg>
                </button>
                @csrf
                  @method('delete')
              </form>
            </div>
          </div>

        @if (count($images)>0)
          @foreach ($images as $img)
            <div class="card text-center" style="width: 18rem;">
              <img src="/images/{{ $img->image }}" class="card-img-top h-50" alt="...">
              <div class="card-body">
                <h5 class="card-title">Extra Image</h5>
                <form action="/deleteimage/{{ $img->id }}" method="post">
                  <button class="btn btn-sm btn-danger " onclick="return confirm('Confirm delete');" title="Delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                  @csrf
                  @method('delete')
                </form>
              </div>
            </div>
          @endforeach
        @endif
        </div>
      </div>
    

@endsection
</main>
  </div>
</div>
</div>