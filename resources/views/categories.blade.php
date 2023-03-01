@php
    $categories = App\Models\Category::whereNull('parent_id')->get();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Categories</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
      <h1>Categories</h1>
      @foreach ($categories as $category)
        <div id="div{{$category->id}}">
          <input
            level="0"
            type="checkbox"
            id="{{$category->id}}"
            onchange="checkCategory(this)"
          >
          <label for="{{$category->id}}">{{$category->name}}</label>
          <br>
        </div>
      @endforeach
    </body>
</html>

