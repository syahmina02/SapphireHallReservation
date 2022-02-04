@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')

@section('content')

<div class="container-fluid bg">
    <div class="row">
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
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-5 fw-bold text-center p-4">Dashboard</h1>      
      </div>

      <!-- Content Row -->
      <div class="row">
        
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Halls</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hallSum}}</div>
                <a href="{{url('/hall')}}" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-house-door icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Package</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$packageSum}}</div>
                <a href="{{url('/package')}}" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-box-seam icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bookings</div>
                <div class="h5 mb-0 font-weight-bold">{{$bookingSum}}</div>
                <a href="{{url('/adminbooking')}}" class="stretched-link"></a>
              </div>
              <div class="col-auto">
                <i class="bi bi-calendar-week icon-brown opacity-75"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Content Row -->
      <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold">Bookings per month</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <div id="myChart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Number of halls per state</h6>
        </div>
        
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <div id="myPie"></div>
          </div>
        </div>
      </div>
    
    </div>
  </div>

<script src="https://code.highcharts.com/highcharts.js"></script>


<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;
    Highcharts.chart('myChart', {
        title: {
            text: 'Bookings per month'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'No of booking'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Booked',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

     var locationKL = <?php echo json_encode($locationKL)?>;
     var locationJB = <?php echo json_encode($locationJB)?>;
     var locationP = <?php echo json_encode($locationP)?>;
     var locationM = <?php echo json_encode($locationM)?>;
    Highcharts.chart('myPie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Hall by state (%)'
    },
    tooltip: {
        pointFormat: 'Total: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Location',
        colorByPoint: true,
        data: [{
            name: 'Kuala Lumpur',
            y: locationKL,
        }, {
            name: 'Johor Bahru',
            y: locationJB,
        }, {
            name: 'Perak',
            y: locationP,
        }, {
            name: 'Melaka',
            y: locationM ,
        
        }]
    }]
});
</script>

@endsection
</main>

