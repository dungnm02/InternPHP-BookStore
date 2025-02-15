<div id="navbar-container">
    <div id="user-bar">
        <h1>BOOKSTORE</h1>
        @if(auth()->guest())
            <a href="{{route('login.get')}}">Login</a>
            <a href="{{route('register.get')}}">Register</a>
        @else
            <a href="#">Hello, {{auth()->user()->full_name}}</a>
            <a href="{{route('logout')}}">Logout</a>
        @endif
        <div>
            <a href="{{route('getCart')}}">
                <img src="{{ asset('img/cart-icon.png') }}" alt="Cart">
            </a>
        </div>
    </div>
    <nav id="navbar">
        <ul>
            <li><a href={{route('home')}}>Home</a></li>
            <li><a href=#>Books</a></li>
            <li><a href=#>Authors</a></li>
            <li><a href=#>Publishers</a></li>
        </ul>
    </nav>
    <div id="search-bar">
        <input type="text" placeholder="Search for author">
        <button type="submit">Search</button>
    </div>
</div>

