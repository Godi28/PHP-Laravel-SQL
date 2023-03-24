<!-- The php below uses data passed from the controller to a category and matching article titles -->
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <title>Cool Tech - Category Page</title>
  </head>
  <body id="categorybody" class="font-mono m-2 border-2 border-white"> 
    <h2 class ="text-3xl mt-2 mb-12 mx-2">Article by Category</h2> 
    <img id="category" src="{{url('/images/category.jpg')}}" alt="category"  />  
    <h2 class ="text-xl mt-4 mx-2 mb-2">Category:</h2>
    <p class="text-lg mb-12 mx-2">{{$category[0]}}</p>
    <h2 class ="text-xl mb-2 mx-2">Articles:</h2>
    <p class="text-lg mx-2 mb-8">{!!$title!!}</p>
    <br><br><br><br><br><br><br><br><br><br>
    <x-alert />
  </body>
  <br />
  <footer class=" text-sm font-mono ">
    Copyright &copy Cool Tech <em>2015-2021</em> 
    <a class = "text-cyan-300 hover:underline" href="{{ url('/legal/privacy') }}">Privacy Policy & Terms of Use</a><text> |</text>
    <a class = "text-cyan-300 hover:underline" href="{{ url('/search') }}">Search</a><text> |</text>
    <a class = "text-cyan-300 hover:underline" href="{{ url('/about') }}">About Us</a></a><text> |</text>
    <a class = "text-cyan-300 hover:underline" href="{{ url('/') }}">Home Page</a>
  </footer>
</html>
