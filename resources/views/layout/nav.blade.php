<div>
    <h1 style="margin: 0; line-height: 0.7;">Dashboard</h1>
    <h2>All the Ideas:</h2>
</div>


<div style="display: flex; justify-content: space-between; gap: 1em; flex: 1;">



    <form action="{{route('dashboard.searchIndex')}}" method="post" style="width: 80%;">
        @csrf
        <input value="{{request('search', '')}}" type="text" name="search" id="" style="width: 80%;">
        <button type="submit">Search</button>
    </form>


    <div style="display: flex; gap: 1em;">
        @guest
            <a href="{{route('login')}}">LogIn here</a>
            <a href="{{route('register')}}">Register here</a>
        @endguest




        @auth
            <a href="">{{Auth::user()->name}}</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        @endauth
    
    </div>



</div>