<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('back.index') ? 'active' : '' }}" href="{{route('back.index')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('category*') ? 'active' : '' }}" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('category*') ? 'show' : '' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}" href="{{route('category.index')}}">Show Category</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->routeIs('category.create') ? 'active' : '' }}" href="{{route('category.create')}}">Create Category</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Gallery</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('gallery*') ? 'show' : '' }}" id="gallery">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}" href="{{route('gallery.index')}}">Show Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.create') ? 'active' : '' }}" href="{{route('gallery.create')}}">Create Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.create.image') ? 'active' : '' }}" href="{{route('gallery.create.image')}}">Upload Image</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->routeIs('user.index') ? 'show' : '' }}" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register.html">Register</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">About</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Comments</span>
            </a>
        </li>

    </ul>
</nav>
