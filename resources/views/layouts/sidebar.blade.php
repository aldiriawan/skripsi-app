<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">FTI UKDW</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 text-decoration-none {{ Request::is('/') ? 'active' : '' }}"
                        aria-current="page" href="/">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 text-body-secondary text-uppercase">
                <span style="color: black;">Admin</span>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/dosen') ? 'active' : '' }}"
                        aria-current="page" href="/dosen?dosen_id=1">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        <span style="color: black; font-weight: normal;">Data Dosen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/') ? 'active' : '' }}"
                        aria-current="page" href="/user">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        <span style="color: black; font-weight: normal;">Data User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
