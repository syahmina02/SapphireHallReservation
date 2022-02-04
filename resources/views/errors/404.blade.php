@include('layouts.styles')
@extends('layouts.footer')
@extends('layouts.bar')


@section('content')
    <title>404 Error</title>
    <body>
        <section style="padding-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col md-8  text-center">
                        <img src="/image/undraw_Page_not_found_re_e9o6.png" class="img-fluid" style="height: 400px;" alt="">
                        <h4>Page not found</h4>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection