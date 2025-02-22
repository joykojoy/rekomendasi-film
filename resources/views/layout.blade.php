<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CineMatch')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        /* Sidebar styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px;
            background-color: #343a40;
            padding-top: 20px;
            height: 100vh;
            overflow-y: auto;
            transform: translateX(-200px); /* Changed to -200px to hide completely */
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar:hover,
        .sidebar.show {
            transform: translateX(0);
        }

        /* Adjust trigger area */
        .sidebar-trigger {
            position: fixed;
            top: 0;
            left: 0;
            width: 10px; /* Reduced width */
            height: 100vh;
            z-index: 999;
        }

        /* Update main content */
        .main-content {
            margin-left: 10px; /* Reduced margin */
            padding: 20px;
            width: calc(100% - 10px);
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 200px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
        }

        .navbar h3 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body class="bg-dark text-white">

<div class="d-flex flex-column">
    <!-- Navbar -->
    <div class="navbar">
        <h3>CineMatch</h3>
    </div>

    <div class="d-flex">
        <!-- Add the trigger area before the sidebar -->
        <div class="sidebar-trigger" id="sidebarTrigger"></div>

        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('top-picks') }}" class="nav-link text-white">Top Picks</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('films.advance-search') }}" class="nav-link text-white">Search</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a href="{{ route('films.recommendations', ['userId' => auth()->id()]) }}" class="nav-link text-white">Recommendations</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link text-white">Recommendations (Login Required)</a>
                    @endauth
                </li>
                <li class="nav-item">
                    @auth
                        <a href="{{ route('films.newforyou', ['userId' => auth()->id()]) }}" class="nav-link text-white">New For You</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link text-white">New For You (Login Required)</a>
                    @endauth
                </li>

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('films.index') }}" class="nav-link text-white">Films</a>
                        </li>
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link text-white">Users</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item mt-3">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm w-100">Login</a>
                    @else
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                        </form>
                    @endguest
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <!-- Content Area -->
            @yield('content')
        </div>
    </div>
</div>

<script>
    console.log("Sidebar script loaded");

    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarTrigger = document.getElementById('sidebarTrigger');
    const menuToggle = document.getElementById('menuToggle');

    // Handle hover events
    sidebarTrigger.addEventListener('mouseenter', () => {
        sidebar.classList.add('show');
        mainContent.classList.add('shifted');
    });

    sidebar.addEventListener('mouseleave', () => {
        sidebar.classList.remove('show');
        mainContent.classList.remove('shifted');
    });

    // Keep the existing click handler for the menu button
    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('show');
        mainContent.classList.toggle('shifted');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/advance-search.js') }}"></script>
</body>
</html>
