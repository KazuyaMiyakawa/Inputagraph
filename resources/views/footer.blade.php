<footer>
  @if (Route::has('login'))
    @auth
      <ul>
        <li><a href="{{ url('/list') }}"><img src="images/icon_home.png" alt="HOME"></a></li>
        <li><a href="{{ url('/upload') }}"><img src="images/icon_up.png" alt="POST"></a></li>
        <li><a href="{{ url('/user') }}"><img src="images/icon_motakutoh.png" alt="USER"></a></li>
      </ul>
    @endauth
  @endif
</footer>
