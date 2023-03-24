<!-- The php below uses data passed from the controller to print an article title, its category and tags  -->
<html>
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <title>Cool Tech - Article Page</title>
  </head>
  <body id="articlebody" class="font-mono m-2 border-2 border-white">   
    @foreach($article_category_linked_data as $entry)
        <img id="logo2" src="{{url('/images/logo.jpg')}}" alt="logo"  />
    <h2 class ="text-3xl mt-2  mb-16 mx-2">Title: {{$entry->titles}}</h2>
    <p class ="text-3xl  mb-16 mx-2">Category: {{$entry->categories}}</p>
    <p class ="text  mb-8 mx-2 ">{!!$entry->content!!}</p>
    @endforeach
    <h3 class ="text-3xl mt-2 mb-4 mx-2">Tags:</h3>
    @foreach($article_tag_linked_data as $entry)
    <a class ="text-lg mt-2 mb-2 mx-2 text-cyan-300 hover:underline" href="{{url('tag', $entry->tags)}}">{{$entry->tags}}</a><br />
    @endforeach
    <br>
    <br>
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
