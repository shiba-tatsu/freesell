<form method="POST" action="{{ route('users.storeProfile', ['user' => 1]) }}" enctype="multipart/form-data">
  @csrf
  <input type="text" name="test">
  <input type="submit">
</form>