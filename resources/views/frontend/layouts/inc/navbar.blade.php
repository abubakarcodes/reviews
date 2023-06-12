<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light border">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-semibold" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0 mb-2">
                <li class="nav-item me-2">
                    <a class="nav-link {{ request()->routeIs('submitReview') ? 'active' : '' }}" href="{{ route('submitReview') }}">Submit Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 {{ request()->routeIs('submitResponse') ? 'active' : '' }}" href="{{ route('submitResponse') }}">Submit Response</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 {{ request()->routeIs('donate') ? 'active' : '' }}" href="{{ route('donate') }}">Donate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contactUs') ? 'active' : '' }}" href="{{ route('contactUs') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
