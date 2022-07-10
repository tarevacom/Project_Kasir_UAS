<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Ciwil</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">T|C</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
        </li>

        <li class="menu-header">Data Menu</li>
        @if (Auth::user()->level == 'admin')
        <li><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-fire"></i> <span>Data
                    Category</span></a></li>
        <li><a class="nav-link" href="{{route('product.index')}}"><i class="far fa-square"></i> <span>Data
                    Product</span></a></li>
        <li><a class="nav-link" href="{{ route('order.index') }}"><i class="far fa-square"></i> <span>Order</span></a></li>
        <li><a class="nav-link" href="{{ route('checkout.index') }}"><i class="far fa-square"></i> <span>Transaction</span></a></li>
        @else
        <li><a class="nav-link" href="{{ route('order.index') }}"><i class="far fa-square"></i> <span>Order</span></a></li>
        <li><a class="nav-link" href="{{ route('checkout.index') }}"><i class="far fa-square"></i> <span>Transaction</span></a></li>
        @endif
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>