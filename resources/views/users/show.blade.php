test

<form id="logout-button" method="POST" action="{{ route('logout') }}">
  @csrf
  <button form="logout-button" class="dropdown-item" type="submit">
    ログアウト
  </button>
</form>