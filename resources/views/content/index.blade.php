@extends('templates.main')

@section('content')

<!-- Hero Section with Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://placehold.co/1600x600" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Welcome to Our Website</h1>
                <p>Explore our amazing products and services.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/1600x600" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Discover Something New</h1>
                <p>Join us in our journey of innovation.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Main Content Section -->
<div class="container my-5">
    <div class="row">
        <!-- Featured Cards -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Featured Product</h5>
                    <p class="card-text">This is a featured product description.</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Special Offer</h5>
                    <p class="card-text">Check out our limited-time offer!</p>
                    <a href="#" class="btn btn-primary">Grab Deal</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Our Services</h5>
                    <p class="card-text">Explore our range of services.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection