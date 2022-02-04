@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')
    
<div class="bg">
    <div class="container ">
        <!-- Title -->
        <h1 class="display-5 fw-bold text-center p-4">Your Booking for {{$halls->name}}</h1>
        
        <!-- Breadcrumb -->
        <nav class="mt-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/">Home</a></li>
				<li class="breadcrumb-item "><a href="/home">Landing Page</a></li>
                <li class="breadcrumb-item"><a href="/search">Search</a></li>
                <li class="breadcrumb-item"><a href="/hall/{{$halls->id}}">{{$halls->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking</li>
            </ol>
        </nav>
    
        <form method="post" class="bg-white p-5 border-outline shadow mb-5 bg-body rounded" action="{{url('/booking/'.$halls->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group mb-4">
                <h3 class="">Select Package</h3>
                @foreach($packages as $package)
                    <input type="radio" class="btn-check" name="package_id" id="{{ $package->id }}" value="{{ $package->id }}" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="{{ $package->id }}">{{ $package->name }} <br> RM{{ $package->price }}</label>
                 @endforeach
            </div>
            <div class="form-group mb-4">
                <h3 class="">Select Date</h3>
                    <input type="date" min="{{$today}}" class="form-control input-sm" id="date_booking" name="date_booking" required>
            </div>
            <div class="form-group mb-4">
                <h3 class="">Select Session</h3>
                    <input type="radio" class="form-control btn-check" name="sessions" id="full_day" value="Full day" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="full_day">Full day</label>
                    <input type="radio" class="form-control btn-check" name="sessions" id="half_day" value="Half day" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="half_day">Half day</label>
            </div>
            <div class="form-group mb-4">
                <h3 class="">Select Time</h3>
                <input type="radio" class="form-control btn-check" name="time" id="10am" value="10:00am - 6:00pm" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="10am">10:00am - 6:00pm</label>
               
                    <input type="radio" class="form-control btn-check" name="time" id="3pm" value="10:00am - 3:00pm" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="3pm">10:00am - 3:00pm</label>

                    <input type="radio" class="form-control btn-check" name="time" id="5pm" value="5:00pm - 10:00pm" autocomplete="off" required>
                    <label class="btn btn-outline-dark" for="5pm">5:00pm - 10:00pm</label>
            </div>
            <div class="form-group mb-4">
                <h3 class="">Theme</h3>
                <select name="theme" id="theme" class="form-select mb-3" required>
                <option selected>Select wedding theme</option>
                <option value="Gold">Gold</option>
                <option value="Soft Pink">Soft Pink</option>
                <option value="Soft Blue">Soft Blue</option>
                <option value="Soft Purple">Soft Purple</option>
                <option value="Grey">Grey</option>
                <option value="White">White</option>
              </select>
            </div>
            <div class="form-group mb-4">
                <h3 class="">Additional Notes</h3>
                <textarea required type="text" class="form-control rounded-4" name="notes" placeholder="Notes"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3" >Submit</button>
        </form>
    </div>
@endsection
</div>

<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>

    
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
 
       $(document).ready(function(){
       $("#full_day").click(function(){


        $("label[for=3pm],#3pm").hide();
        $("label[for=5pm],#5pm").hide();
        $("label[for=10am],#10am").show();
  });

    $("#half_day").click(function(){
        $("label[for=3pm],#3pm").show();
        $("label[for=5pm],#5pm").show();
        $("label[for=10am],#10am").hide();

  });
    $('input[name=time]').change(function(){
        
        if($("input[name='sessions']:checked").val()){

        } else {
            alert("Please select your session first");
        }
        });

 
});

  
  </script>