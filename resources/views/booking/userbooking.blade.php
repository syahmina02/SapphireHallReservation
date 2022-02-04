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
          <a class="nav-link text-light a" aria-current="page" href="#">
              Bookings
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
        <h1 class="display-5 fw-bold text-center mt-4">BOOKING HISTORY</h1>
        <div class="form-group mb-4 text-center">
            <h3 class="">{{$msg}}</h3><br>
        </div>
        <div> 
        @isset($booking) <!--userBooking is defined and is not null... -->
            <div class="container shadow p-4 mt-4 rounded bg-white border-outline">
            @foreach($booking as $bookList)
                  
                        
                <form method="post" action="{{url('/edit-userbooking/'.$bookList['id'])}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                
                    <div class="container">
                        <div class="row ">
                            <div class="form-group mb-3">
                                <label for="package"><b>Package Name : 
                                    @php echo App\Http\Controllers\UserBookingController::getPackageNameID($bookList['package_id']); 
                                     @endphp
                                </b></label>
                                
                                <input type="hidden" name="package" value="{{old('package_id') ?? $bookList['package_id']  }}" class="form-control" placeholder="Package" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="hall"><b>Hall Name : 
                                    @php echo App\Http\Controllers\UserBookingController::getHallNameID($bookList['hall_id']); 
                                     @endphp</b></label>
                                <input type="hidden" name="hall" value="{{old('hall_id') ?? $bookList['hall_id']  }}" class="form-control" placeholder="Hall">
                            </div>
                        </div>
                        <div class="row-2 ">
                        <div class="form-group mb-3">
                            <label for="date"><b>Booking Date : {{$bookList['date_booking']}}</b></label>
                            <input type="hidden" name="date" value="{{old('date_booking') ?? $bookList['date_booking']  }}" class="form-control" placeholder="Date" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="time"><b>Booking Time : {{$bookList['time']}}</b></label>
                            <input type="hidden" name="time" value="{{old('time') ?? $bookList['time'] }}" class="form-control" placeholder="Time" readonly>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <div class="form-outline w-50 mb-4">
                                <label for="notes"><b>Additional notes :</b></label>
                                <input type="textarea" id="notes" name="notes" value="{{old('notes') ?? $bookList['notes']  }}"class="form-control rounded-4" placeholder="Additional notes..." rows="3" readonly>
                            </div>  
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <div class="form-outline w-50 mb-4">
                                <label for="status"><b>Booking Status : {{$bookList['status']}}</b></label>
                                <input type="hidden" id="status" name="status" value="{{old('status') ?? $bookList['status']  }}"class="form-control rounded-4" placeholder="status" readonly>
                            </div>  
                        </div>
                    </div>
                    
                    <div id="submitDiv" style="display:none">
                        <button type="submit" class="btn btn-primary mt-3" >Submit</button>
                    </div>
                </form>
                @if($bookList['status'] == "active")
                    <div class="text-end">
                        <!-- Edit button -->
                        <button type="button" id="editBtn" class="btn btn-primary mt-3">Edit</button>
                        <!-- Delete button -->
                        <form id="deleteForm" action="{{ url('/userbooking/'.$bookList['id']) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger mt-3" type="submit" onclick="return confirm('Click OK to confirm delete booking.');" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>     
                    </div>
                    <hr>
                @endif
                @endforeach
            </div>
        @endisset
    </div>
    
@endsection
</main>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>

    $(document).ready(function(){
        $('#editBtn').click(function(){
            $("#submitDiv").toggle();
            $('#notes').prop("readOnly",!$('#notes').prop("readOnly"));
        }); 
    }); 
  
</script>
