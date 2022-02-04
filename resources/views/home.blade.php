@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.mainnavbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

@section('content')
<body>

<!-- Search Bar -->
<div class="mx-auto" style="margin-top: 100px; width: 400px;">
<form action="{{url('/search')}}" type="get">
    {{csrf_field()}}
    <input type="text" class=" border shadow" style="border-radius:16px; width: 345px; height:3em; text-align:center;" name="location" placeholder="Location"/>
    <button type="submit" aria-expanded="false" class="border shadow" style="border-radius:50%; width:3em; height:3em; background-color: #564130;">
    <i class="bi bi-search text-white"></i>
    </button>
</form>
</div>
<!-- Search Bar End-->

<!-- Location -->
<div id="location" class="py-4" style="margin-top: 60px;"><h1 class="text-center">Find us here</h1></div>
<div class="container">
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <div class="col">
        <div class="card h-100 mb-5 shadow">
            <img src="image/wedhallillustrator11.jpg" class="card-img-top" alt="JB Illustration">
            <div class="card-body">
                <form action="{{url('/search')}}" type="get">
                    <input type="hidden" name="location" value="Johor">
                    <button type="submit" class="border-0 bg-transparent stretched-link"><h3>Johor Bahru</h3></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 mb-5 shadow">
            <img src="image/wedhallillustrator22.jpg" class="card-img-top" alt="KL Illustration">
            <div class="card-body">
                <form action="{{url('/search')}}" type="get">
                    <input type="hidden" name="location" value="Kuala Lumpur">
                    <button type="submit" class="border-0 bg-transparent stretched-link"><h3>Kuala Lumpur</h3></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 mb-5 shadow">
            <img src="image/wedhallillustrator33.jpg" class="card-img-top" alt="Melaka Illustration">
            <div class="card-body">
                <form action="{{url('/search')}}" type="get">
                    <input type="hidden" name="location" value="Melaka">
                    <button type="submit" class="border-0 bg-transparent stretched-link"><h3>Melaka</h3></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 mb-5 shadow">
            <img src="image/wedhallillustrator44.jpg" class="card-img-top" alt="Perak Illustration">
            <div class="card-body">
                <form action="{{url('/search')}}" type="get">
                    <input type="hidden" name="location" value="Perak">
                    <button type="submit" class="border-0 bg-transparent stretched-link"><h3>Perak</h3></button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Location End -->

<!-- Package -->
    <div style="background-color:#F9F1E7">
      <!-- Title -->
      <div id="package" class="py-4" style="margin-top: 100px;"><h1 class="text-center">Packages</h1></div>

      <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
          @foreach($packages as $package)
            <div class="col">
              <!-- List of package using card -->
                <div class="card shadow h-100 p-lg-4" style="border-radius: 16px;">
                    <div>
                        <h3 class="card-title pt-3">{{ $package->name }}</h3>
                    </div>
                    <!-- Card details -->
                    <div class="card-body py-5">
                        <table class="card-text">
                            <tr>
                                <td style="vertical-align: top; height: 50px;"><i class="bi bi-pin-angle"></i></td>
                                <td style="height: 50px;">{{ $package->service}}</td>
                            </tr>
                            <tr>
                                <td style="height: 50px;"><i class="bi bi-person"></i></td>
                                <td style="height: 50px;">{{ $package->pax }} pax</td>
                            </tr>
                            <tr style="text-align: right;">
                            <td></td>
                                <td class="lead" style="font-size: xx-large; height: 80px; vertical-align: bottom;"><i class="bi bi-tag" style="font-size: x-large;"></i> RM{{ $package->price}}</td>
                            </tr>
                        </table>
                        
                        <!-- Buttons -->
                        <div class="get-this-button text-center" style="padding-top: 40px;">
                            <form action="{{url('/search')}}" type="get">
                                <input type="hidden" name="package_id" value={{ $package->id }}>
                                <button type="submit" class="bg-transparent shadow" style="width: 200px; height:50px; border: 2px solid #564130;
                                                                                    font-family: 'Trebuchet MS', sans-serif; color:#564130; padding: 10px 0px; text-align: center;"
                                onmouseover="bigger(this)" onmouseout="usual(this)">Get this</button>
                            </form>
                            <script>
                                function bigger(x) { x.style.width = "220px"; }
                                function usual(x) { x.style.width = "200px"; }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
<!-- Package End -->

<!-- Gallery -->
    <div id="gallery" class="pt-5"><h1 class="text-center">Gallery</h1></div>
    <div class="container">
    <div id="carouselExampleInterval" class="carousel slide my-5" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php $i = 1;?>
            @foreach ($slider as $slideritem)

            <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="10000">
                <?php $i++;?>
                <img src="{{ asset('images/'.$slideritem->image)}}" class="d-block w-100" style="height: 700px;" alt="Slider image">
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
<!-- Gallery End-->

</body>
</html>
@endsection
