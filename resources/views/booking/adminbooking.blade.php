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
          <!-- User Profile -->
          <li class="nav-item">
            <a class="nav-link text-light a" href="{{url('/redirects')}}">
              Dashboard
            </a>
          </li>
          <!-- Bookings -->
          <li class="nav-item">
          <a class="nav-link text-light a" aria-current="page" href="{{url('/adminbooking')}}">
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
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- Title -->
        <h1 class="display-5 fw-bold text-center p-4">Booking History</h1>
        <form id="searchForm" method="get" action="{{url('/search-booking')}}" enctype="multipart/form-data">
            <label for="date"><b>Search By Date</b></label>
            <input type="date" class="form-control input-sm" id="date_booking" name="date_booking">
            <button type="submit" class="btn btn-primary mt-3" title="Search">Search</button>
        </form>
        <div class="container shadow p-4 mt-4 rounded bg-white border-outline">
            <table style="width:100%">
                <tr>
                    <th>User Id</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Session</th>
                    <th>Hall Id</th>
                    <th>Package Id</th>
                    <th>Actions</th>
                </tr>

                @foreach($adminBooking as $bookingList)
                    <tr id="{{$bookingList['id']}}">
                        <td>{{$bookingList['user_id']}}</td>
                        <td>{{$bookingList['date_booking']}}</td>
                        <td>{{$bookingList['time']}}</td>
                        <td>{{$bookingList['sessions']}}</td>
                        <td>{{$bookingList['hall_id']}}</td>
                        <td>{{$bookingList['package_id']}}</td>
                        <td>{{$bookingList['status']}}
                            <!-- Approve cancellation[DELETE] button -->
                            <form id="deleteForm" action="{{ url('/adminbooking/'.$bookingList['id'])}}" method="post">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                @if($bookingList['status'] =='pending')
                                    <button class="btn btn-sm btn-danger mt-3" type="submit" onclick="return confirm('Click OK to confirm APPROVE DELETE booking.');" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                @endif
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </table>
</div>
  

<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>

    function myFunction() {
    var txt;
    if (confirm("Click 'OK' to confirm delete booking!")) {
        txt = "Booking Deleted!";
    } else {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;
    }

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
    
        
    $(document).ready(function(){
        $('#searchBtn').click(function(e){
            var txt;
            if (confirm("Click 'OK' to confirm delete booking.")) {
                //pnggil function deleted
                e.preventDefault() // Don't post the form, unless confirmed
  
                // Post the form
                $(e.target).('#searchForm').submit() // Post the surrounding form
            }
        });
    }); 
  
  </script>

@endsection
</main>
