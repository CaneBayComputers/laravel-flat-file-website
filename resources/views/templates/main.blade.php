<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Your Brand</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/reviews">Reviews</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="/services">All Services</a></li>
                                <li><a class="dropdown-item" href="/services/service-1">Service 1</a></li>
                                <li><a class="dropdown-item" href="/services/service-2">Service 2</a></li>
                                <li><a class="dropdown-item" href="/services/service-3">Service 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        @yield('content')
        
        <!-- Call to Action Section -->
        <div class="bg-primary text-white py-5 text-center">
            <div class="container">
                <h2>Ready to get started?</h2>
                <p>Explore our website to learn more about what we offer.</p>
                <a href="/contact" class="btn btn-lg btn-light">Get in Touch</a>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-dark text-white text-center py-4">
            <p>&copy; 2025 Your Company. All rights reserved.</p>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        @stack('script')
        
    </body>
</html>
