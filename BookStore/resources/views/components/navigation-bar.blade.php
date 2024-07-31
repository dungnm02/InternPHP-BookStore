<div id="navbar-container">
    <div id="user-bar">
        <h1>BOOKSTORE</h1>
        @if(empty($user))
            <a href="#">Login</a>
            <a href="#">Register</a>
        @else
            <a href="#">Hello {{$user->fullName}}}</a>
            <a href="#">Logout</a>
        @endif
        <div>
            <a href="#">
                <img id="cart-icon" src="{{ asset('cart-icon.png') }}" alt="Proj">
            </a>
        </div>
    </div>
    <nav id="nav-main">
        <ul>
            <li><a href=#>Home</a></li>
            <li><a href=#>Books</a></li>
            <li><a href=#>Authors</a></li>
            <li><a href=#>Publishers</a></li>
        </ul>
    </nav>
    <div id="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
    </div>
</div>

