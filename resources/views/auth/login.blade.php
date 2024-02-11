<form action="{{route('login.authenticate')}}" method="post" style="display: flex; flex-direction: column; align-items: center; gap: 1em;">
    
    <h3>Log in</h3>

    @csrf
    <input type="text" name="email" id="" placeholder="write email ...">
    <input type="password" name="password" id="" placeholder="write password ...">
    <button type="submit">Log in</button>
</form>