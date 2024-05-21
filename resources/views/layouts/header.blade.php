<header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">FTI UKDW</a>
    
    <ul class="navbar-nav ms-auto mx-3">
        @auth
        <li class="nav-item dropdown">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        @endauth
    </ul>
</header>
