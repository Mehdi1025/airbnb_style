<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo inline-flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" width="200" height="80" loading="eager" decoding="async" class="h-10 md:h-12 w-auto object-contain">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container px-6 py-4 md:px-10 md:py-5">
            <nav class="navbar navbar-expand-md navbar-light align-items-center py-0">
                <a class="navbar-brand inline-flex items-center m-0 p-0 leading-none" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" width="200" height="80" loading="eager" decoding="async" class="h-10 md:h-12 w-auto object-contain">
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
