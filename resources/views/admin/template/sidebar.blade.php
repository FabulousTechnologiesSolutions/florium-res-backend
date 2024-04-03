<div class="panel-left">
    <div class="logo position-relative">
        <i class="fas fa-close fs-4 text-white d-md-none position-absolute close-side"></i>
        <a href="{{ route('admin.dashboard') }}">
            <p>Restaurant Searching</p>
        </a>
    </div>
    <div class="list">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"
                    class=" {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
            {{-- <li><a href="{{ route('admin.managerestaurant') }}"
                    class=" {{ request()->routeIs('admin.managerestaurant','admin.editrestaurant', 'admin.addrestaurant', 'admin.restaurantdetail') ? 'active' : '' }}">Restaurant</a>
            </li> --}}
            <li><a href="{{ route('admin.managefood') }}"
                    class=" {{ request()->routeIs('admin.managefood', 'admin.addfood', 'admin.editfood') ? 'active' : '' }}">Food
                    Types</a></li>
            <li><a href="{{ route('admin.managefaq') }}"
                    class=" {{ request()->routeIs('admin.managefaq', 'admin.addfaq', 'admin.editfaq') ? 'active' : '' }}">Manage
                    FAQ</a>
            </li>
            <li><a href="{{ route('admin.fromqueries') }}"
                    class=" {{ request()->routeIs('admin.fromqueries') ? 'active' : '' }}">Form Queries</a></li>
            <li><a href="{{ route('admin.manageabout') }}"
                    class=" {{ request()->routeIs('admin.manageabout') ? 'active' : '' }}">Manage About</a></li>
            <li><a href="{{ route('admin.managecontact') }}"
                    class=" {{ request()->routeIs('admin.managecontact') ? 'active' : '' }}">Manage contact</a></li>
            <li><a href="{{ route('admin.managereviews') }}"
                    class=" {{ request()->routeIs('admin.managereviews') ? 'active' : '' }}">Manage Reviews</a></li>
        </ul>
    </div>
    <div class="text-center mt-auto py-4">
        @if(auth()->user())
        {{-- {{ Auth::user()->name }} --}}
        <a class="lgout text-decoration-none fw-bold" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endif
      
    </div>
</div>
