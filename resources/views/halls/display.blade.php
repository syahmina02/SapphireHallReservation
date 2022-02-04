@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="container">
        <!-- Carousel section-->
        <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
            
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/cover/{{ $hall->cover }}" class="d-block w-100" style="height: 640px;" alt="1">
        </div>
        @if (count($images)>0)
          @foreach ($images as $img)
        <div class="carousel-item">
            <img src="/images/{{ $img->image }}" class="d-block w-100" style="height: 640px;" alt="2">
        </div>
            @endforeach
        @endif
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/">Home</a></li>
                <li class="breadcrumb-item "><a href="/home">Landing Page</a></li>
                <li class="breadcrumb-item"><a href="/search">Search</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$hall->name}}</li>
            </ol>
        </nav>
        
        <!-- Title section-->
        <h1 class="display-5 fw-bold mt-4 mb-4">{{$hall->name}}, {{$hall->location}}</h1>
        <hr class="divider col-8">
        
        <!-- Description section-->
        <div class="row mb-3">
            <div class="col-8">
                <h5 class="border-hg">&nbsp; About Us</h5>
                <p>{{$hall->description}}</p>
            </div>
        <hr class="divider col-8">

        <!-- Service section-->
        <div class="row mb-3">
            <div class="col col-8">
                <h5 class="border-hg">&nbsp; Services<i class="fas fa-utensils"></i></h5>
                {{$hall->package->service}}
                <i class="fas fa-utensils"></i>
            </div>
        </div>
        <hr class="divider col-8">

        <!-- Location section-->
        <div class="row mb-3">
            <div class="col col-8">
                <h5 class="border-hg">&nbsp; Address</h5>
                <p>{{$hall->address1}}, {{$hall->address2}}, {{$hall->city}}, {{$hall->location}}, {{$hall->zip}}</p>
                
            </div>
        </div>
        <hr class="divider col-8">
            <!-- Price and get this button card -->
         
            <div class="d-flex justify-content-end fixed-bottom">
                <div class=" card text-center shadow border-outline mb-5 me-5"  style="width: 18rem;">
                    <div class="card-body p-4">
                        <h4 class="card-title">RM {{$hall->price}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Best Price Guarantee</h6>
                        <p class="card-text">{{$hall->package->name}}</p>
                        <a href="/booking/{{$hall->id}}" class="btn btn-primary w-100">Get this</a>
                    </div>
                </div>
            </div> 

        </div>
    </div>
</div>



@endsection
