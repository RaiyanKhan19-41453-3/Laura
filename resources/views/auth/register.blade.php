<form action="{{route('register')}}" method="post" style="display: flex; flex-direction: column; align-items: center; gap: 1em;">
    
    <h3>Registration</h3>

    @csrf
    <input type="text" name="name" id="" placeholder="write name ...">
    <input type="text" name="email" id="" placeholder="write email ...">
    <input type="password" name="password" id="" placeholder="write password ...">
    <input type="password" name="password_confirmation" id="" placeholder="write confirm password ...">
    <button type="submit">Register</button>
</form>