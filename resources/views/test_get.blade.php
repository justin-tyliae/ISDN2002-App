{{-- <ol>
@if (count($data) > 0)
    @foreach ($data as $dat)
        <li> {{ $dat }} </li>
    @endforeach
@endif
</ol> --}}

{{ $data }}

<!DOCTYPE html>
<html>
<body>
<form action="/test" method="post">
  <label for="timestamp">timestamp:</label>
  <input type="text" id="timestamp" name="timestamp"><br><br>
  <label for="finger1">finger1:</label>
  <input type="text" id="finger1" name="finger1"><br><br>
  <label for="finger2">finger2:</label>
  <input type="text" id="finger2" name="finger2"><br><br>
  <label for="finger3">finger3:</label>
  <input type="text" id="finger3" name="finger3"><br><br>
  <label for="finger4">finger4:</label>
  <input type="text" id="finger4" name="finger4"><br><br>
  <label for="finger5">finger5:</label>
  <input type="text" id="finger5" name="finger5"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
