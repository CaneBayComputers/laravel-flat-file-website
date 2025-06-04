@extends('templates.main')

@section('content')

<!-- Service 2 Page Content -->

<div class="container my-5">
    <!-- Hero Section -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to Service 2 Excellence</h1>
            <p class="col-md-8 fs-4">Revolutionizing your experience with next-generation solutions. Our Service 2 is designed for the ambitious, the bold, and the visionary. Discover what true innovation looks like.</p>
            <button class="btn btn-primary btn-lg" type="button">Learn More</button>
        </div>
    </div>

    <!-- Feature Cards -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://placehold.co/600x400" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Speed & Precision</h5>
                    <p class="card-text">Experience unmatched delivery times with precision-tuned services designed for maximum impact and efficiency.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://placehold.co/600x400" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Unwavering Support</h5>
                    <p class="card-text">Our support team is a click away 24/7, ensuring you are never alone in your journey to excellence.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://placehold.co/600x400" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Cutting-Edge Technology</h5>
                    <p class="card-text">Stay ahead of the competition with our constantly evolving suite of technological solutions tailored for you.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quote Section -->
    <div class="bg-primary text-white text-center p-5 rounded shadow mb-5">
        <blockquote class="blockquote">
            <p class="mb-0">"Innovation distinguishes between a leader and a follower."</p>
            <footer class="blockquote-footer text-white">Steve Jobs</footer>
        </blockquote>
    </div>

    <!-- Accordion FAQ -->
    <div class="accordion mb-5" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What makes Service 2 different?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Service 2 combines cutting-edge technology with unbeatable customer service, ensuring you get the best of both worlds.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How fast is the delivery?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Our optimized processes ensure industry-leading turnaround times, often delivering results in record time.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Is support available 24/7?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Absolutely. Our dedicated team is available around the clock to assist you with any needs or inquiries.
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="p-5 text-center bg-light rounded-3 shadow">
        <h2 class="fw-bold">Ready to Elevate Your Business?</h2>
        <p class="lead">Partner with us and experience Service 2 — a new standard of excellence.</p>
        <a href="#" class="btn btn-success btn-lg mt-3">Get Started</a>
    </div>

</div>

@endsection
