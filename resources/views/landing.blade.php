@extends('layouts.footer')
@extends('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WELCOME TO SAPPHIRE</title>
	<link rel="stylesheet" href="css/home.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

@section('content')
<body>
    <div class="container">
        <div class="sapphhome-s mt-5">
            <div id="home"></div>
            <div class="started p-2">
                <div class="welcome">
                    <h1 class="mb-4">Welcome</h1>
                </div>
                <div class="welcome-paragraph mb-4">
                    <p>We are honoured to present you a wedding hall booking website that could ease your burden and worries of surveying halls physically and expose yourself to the danger of Covid-19. Start booking your dream wedding hall with us now! </p>
                </div>
                <div class="start-button ms-5">
                    <a href="home">Get Started</a>
                </div>
            </div>
            <div class="logocontainer">
                <img src="image/BigLogo2.jpeg" class="biglogo img-fluid" alt="Sapphire Logo" class="center">
            </div>
        </div>
    </div>
    <script>
	    var dd_main = document.querySelector(".dd_main");
	    dd_main.addEventListener("click", function(){
		    this.classList.toggle("active");
	    })
    </script>
</body>

</html>
@endsection