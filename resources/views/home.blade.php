<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .hero {
            background: url('{{ asset('images/bus-banner.jpg') }}') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 10px 15px;
            position: relative;
        }
        .hero h1 { font-weight: 700; }
        .hero img
        width { 100%; height: auto; max-height: 500px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        .social a { font-size: 1.6rem; margin: 0 10px; color: white; }
        .social a:hover { color: #0d6efd; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">🚌 Bus Reservation</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
<section class="hero">

    <!-- Image -->
    <div class="my-4">
        <img src="{{ asset('image/bus.png') }}" 
             alt="Bus" 
             class="img-fluid w-100" 
     style="height: 100vh; object-fit: cover;">

    </div>

    <!-- Only one button -->
    <a href="{{ route('booking') }}" class="btn btn-primary btn-lg mt-3">Book Now</a>
</section>
<!-- End Hero Section -->

      

    <!-- Available Buses Table -->
    <section class="container py-5">
        <h2 class="mb-4 text-center">Available Buses</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Bus Name</th>
                    <th>Ticket Price</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Time</th>
                    <th>Book</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GreenLine</td>
                    <td>160</td>
                    <td>Dhaka</td>
                    <td>Chittagong</td>
                    <td>7:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>Shyamoli</td>
                    <td>150</td>
                    <td>Dhaka</td>
                    <td>Khulna</td>
                    <td>9:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>Hanif</td>
                    <td>170</td>
                    <td>Dhaka</td>
                    <td>Rajshahi</td>
                    <td>8:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>Saudia</td>
                    <td>180</td>
                    <td>Dhaka</td>
                    <td>Barisal</td>
                    <td>10:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>Volvo</td>
                    <td>200</td>
                    <td>Sylhet</td>
                    <td>Dhaka</td>
                    <td>6:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>Sohag</td>
                    <td>140</td>
                    <td>Dhaka</td>
                    <td>Cox's Bazar</td>
                    <td>5:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>BRTC</td>
                    <td>130</td>
                    <td>Dhaka</td>
                    <td>Rangamati</td>
                    <td>11:00 AM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>ExpressLine</td>
                    <td>120</td>
                    <td>Dhaka</td>
                    <td>Comilla</td>
                    <td>4:00 PM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
                <tr>
                    <td>S.Alam</td>
                    <td>190</td>
                    <td>Chittagong</td>
                    <td>Dhaka</td>
                    <td>3:00 PM</td>
                    <td><a href="{{ route('booking') }}" class="btn btn-success btn-sm">Book Now</a></td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="social mb-2">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
        <p class="mb-0">&copy; 2025 Bus Ticket. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


