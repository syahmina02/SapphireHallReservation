@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<!-- Bakground color -->
<div class="bg">

	<!-- Header -->
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  		<div class="carousel-inner">
    		<div class="carousel-item active">
      			<img src="image/searchingHeader.jpg" class="d-block w-100" style="height: 600px;" alt="header">
	  			<div class="carousel-caption d-none d-md-block mb-5">
	  				<h2 class="display-4 fw-bold text-shadow">Find Your Dream Wedding Venue</h2>
	  				<h5 class="fw-normal mb-4 fst-italic text-shadow">Discover and book your banquet hall. Leave the rest with us.</h5>
      			</div>
    		</div>
  		</div>
	</div>
	
	<!-- Create a container -->
	<div class="container mt-5">
		<div class="row">
			<!-- Breadcrumb -->
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/">Home</a></li>
				<li class="breadcrumb-item "><a href="/home">Landing Page</a></li>
				<li class="breadcrumb-item active" aria-current="page">Search</li>
			</ol>
        </nav>

			<!-- Filter section -->
			<div class="col-3">
				<div class="p-4 shadow rounded-3 bg-white border-outline">
					<form action="search" method="get">
						<h4 class="modal-title fw-bold mb-4">Filter<i class="bi bi-funnel"></i></h4>
						
						<!-- Filter section (Price) -->
						<div class="form-group mb-5">
							<label><b>Price</b></label>
							<select name="price" id="price" class="form-control input-lg dynamic" data dependent="state">
								<option value="">Select Price</option>
								@foreach($prices as $prices)
								<option>{{$prices}}</option>
								@endforeach
							</select>
						</div>
						
						<!-- Filter section (Location) -->
						<div class="form-group mb-5">
							<label><b>Location</b></label>
							<select name="location" id="location" class="form-control input-lg dynamic" data dependent="state">
								<option value="">Select Location</option>
								@foreach($locations as $locations)
								<option>{{$locations}}</option>
								@endforeach
							</select>
						</div>

						<!-- Filter section (Date) -->
						<div class="form-group mb-5">
							<label><b>Date</b></label><br>
							<input type="date" class="form-control input-lg dynamic" id="date_booking" name="date_booking" data dependent="state">
						</div>
						
						<!-- Filter section (Button) -->
						<button type="submit" class="w-100 mb-2 btn rounded-4 btn-primary">Search</button>
					</form>
				</div>
			</div>
			
			<!-- List of hall container -->
			<div class="col-8 shadow p-5 rounded-3 ms-5 bg-light border-outline">
			@foreach($posts as $post)   
				<div class="row">
					<table class="table align-middle table-borderless ">
						<tbody>
							<tr>
								<td rowspan="4" >
									<img src="/cover/{{ $post->cover }}" class="rounded float-start img-fluid"  width = 540>
								</td>
								<!-- Hall name -->
								<td>
									<h2><a href="/hall/{{$post->id}}" class="nav-link px-0 text-black">{{$post->name}}</a></h2>
								</td>
							</tr>
							<!-- Hall description -->
							<tr>
								<td>{{ $post->description }}</td>
							</tr>
							<!-- Hall details (location, price, package) -->
							<tr>
								<td>
									<i class="bi bi-geo-alt"> {{ $post->location }}</i> <br>
									<i class="bi bi-tag"> RM{{ $post->price }}.00</i> <br>
									<i class="bi bi-box-seam"> {{ $post->package->name }}</i> <br><br>
								</td>
							</tr>
							<!-- View details button -->
							<tr>
								<td class="text-end">
									<a href="/hall/{{$post->id}}" class="btn btn-primary" role="button" aria-disabled="true">View details</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<hr class="divider">
			@endforeach
			@forelse ($posts as $post)
				@empty
				<div class="form-group">
					<img src="image/noResult.png" class="d-flex justify-content-center m-auto img-fluid" alt="No result">
    				<h2 class="d-flex justify-content-center">Sorry! No result found :(</h2>
					</div>
			@endforelse
		</div>
	</div>
</div>

@endsection