<style>
    .cdc-nav-logo-img { height: 2.5rem; width: auto; object-fit: contain; border: none; box-shadow: none; background: transparent; display: block; }
    @media (min-width: 768px) { .cdc-nav-logo-img { height: 3rem; } }
</style>
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="cdc-nav-logo-img">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand d-flex align-items-center py-0" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="cdc-nav-logo-img">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Restaurant</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                All Rooms
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="#" class="nav-link">Room Type 1</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Room Type 2</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Room Type 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item-btn">
                            <a href="#" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                        </li>
                    </ul>

                    <div class="nav-btn">
                        <a href="#" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
