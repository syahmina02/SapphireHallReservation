<body style="background: -webkit-linear-gradient(left, #F9F1E7, #F9F1E7 50%, #FCF8F3 50%, #FCF8F3);">
@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="container"><div class="modal-body row">
    <!-- Left -->
    <div class="col-md-6">
        <div class="ms-5 d-grid" style="height: 70vh; width: 25vw;">
        <h1 class="text-center">Almost there..</h1>
            <!-- User Details -->
            <div class="p-2 my-auto">
                <table>
                    <tr>
                        <td><i class="bi bi-circle-fill icon-brown"></i> </td>
                        <td> </td>
                        <td><h5 style="color: #564130;">User Details</h5></td>
                    </tr>
                </table>
                <div class="ms-4 p-3" style="border-radius: 25px; background-color: #FCF8F3;">
                    <table class="table table-borderless">
                        <tr style="height: 6vh;">
                            <td><b>Name</b></td> <td>{{$usern}}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td><td>{{$usere}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Booking Details -->
            <div class="p-2 my-auto">
                <table>
                    <tr>
                        <td><i class="bi bi-circle-fill icon-brown"></i> </td>
                        <td> </td>
                        <td><h5 style="color: #564130;">Booking Details</h5></td>
                    </tr>
                </table>
                <div class="ms-4 p-3" style="border-radius: 25px; background-color: #FCF8F3;">
                    <table class="table table-borderless">
                        <tr style="height: 6vh;">
                            <td style="width: 7vw;"> <b>Hall Name</b> </td>
                            <td>{{$hall}}</td>
                        </tr>
                        <tr style="height: 6vh;">
                            <td> <b>Date</b> </td> <td>{{$booking->date_booking}}</td>
                        </tr>
                        <tr style="height: 6vh;">
                            <td> <b>Session</b> </td> <td>{{$booking->sessions}}</td>
                        </tr>
                        <tr style="height: 6vh;">
                            <td> <b>Time</b> </td> <td>{{$booking->time}}</td>
                        </tr>
                        <tr>
                            <td> <b>Package</b> </td> <td>{{$package}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Right -->
    <div class="col-md-6" style="margin-top:10vh;">
        <div class="ms-5" style="height: 70vh; width: 25vw;">
            <!-- Checkout Details -->
            <div class="p-2 my-auto" >
                <div class="ms-4 p-5" style="border-radius: 25px; background-color: #F9F1E7;">
                <div class="m-1"><h2>Order Details</h2></div>
                    <table class="table table-borderless">
                        <tr style="height: 8vh;">
                            <td style="width: 7vw;"> <b>ORDER ID #</b>{{$booking->id}} </td>
                            <td class="text-end" colspan="2"><small>{{$booking->updated_at}}</small></td>
                        </tr>
                        <tr style="height: 4vh;">
                            <td> <b>Hall price</b> </td> <td></td> <td class="text-end">RM{{$hallprice}}</td>
                        </tr>
                        <tr style="height: 4vh;">
                            <td> <b>Package price</b> </td> <td></td> <td class="text-end">RM{{$packageprice}}</td>
                        </tr>
                        <tr style="height: 10vh;">
                            <td> <b>Tax</b> <small>(6%)</small> </td> <td></td> <td class="text-end">RM{{$tax}}</td>
                        </tr>
                        <tfoot>
                            <td> <b>Total price</b> </td> <td></td> <td style="border-top: 2px solid #564130" class="text-end">RM{{$booking->totalPrice}}</td>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- Payment Button-->
            <div class="p-2 my-auto">
                <div class="ms-4 p-3" >
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <form action="{{ url('charge') }}" method="post">
                                <input type="hidden" name="amount" value={{$booking->totalPrice}}>
                                {{ csrf_field() }}
                                <input type="submit" class="shadow-sm p-3 mb-5" style="width:10vw; border: 1px solid #564130; border-radius: 25px; background-color: #F9F1E7;" name="submit" value="Make payment">
                            </form>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div></div>

@endsection
</body>
