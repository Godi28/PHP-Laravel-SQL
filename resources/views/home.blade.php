<!-- The php below uses data passed from the controller to print article titles, creation date and thier frist paragraphs -->
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet" />
    <title>Cool Tech - Home Page</title>
  </head>
  <body id="homebody" class="m-2 border-2 border-white">
    <h1 class="text-6xl mb-6 mt-2 font-mono text-center">&#9733 Welcome to Cool Tech &#9733</h1>
    <img id="logo" src="{{url('/images/logo.jpg')}}" alt="logo" />
    <h2 class="text-xl font-mono mx-2 mb-6 mt-60">Latest 5 articles:</h2>
    <a
      class="text-lg font-mono mx-2 text-cyan-300 hover:underline"
      href="{{url('full-article', $titles[0])}}"
      >{{$titles[0]}} - ({{$dates[0]}})</a
    >
    <p class="font-mono indent-3 mx-2 my-3">{!! $paragraph1 !!}....</p>
    <a
      class="text-lg font-mono mx-2 text-cyan-300 hover:underline"
      href="{{url('full-article', $titles[1])}}"
      >{{$titles[1]}} - ({{$dates[1]}})</a
    >
    <p class="font-mono indent-6 mx-2 my-3">{!! $paragraph2 !!}....</p>
    <a
      class="text-lg font-mono mx-2 text-cyan-300 hover:underline"
      href="{{url('full-article', $titles[2])}}"
      >{{$titles[2]}} - ({{$dates[2]}})</a
    >
    <p class="font-mono indent-3 mx-2 my-3">{!! $paragraph3 !!}....</p>
    <a
      class="text-lg font-mono mx-2 text-cyan-300 hover:underline"
      href="{{url('full-article', $titles[3])}}"
      >{{$titles[3]}} - ({{$dates[3]}})</a
    >
    <p class="font-mono indent-6 mx-2 my-3">{!! $paragraph4 !!}....</p>
    <a
      class="text-lg font-mono mx-2 text-cyan-300 hover:underline"
      href="{{url('full-article', $titles[4])}}"
      >{{$titles[4]}} - ({{$dates[4]}})</a
    >
    <p class="font-mono indent-3 mx-2 my-3">{!! $paragraph5 !!}....</p>
    <x-alert />
  </body>
  <br />
  <footer class="text-sm font-mono">
    Copyright &copy Cool Tech <em>2015-2021</em>
    <a class="text-cyan-300 hover:underline" href="{{ url('/legal/privacy') }}"
      >Privacy Policy & Terms of Use</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/search') }}"
      >Search</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/about') }}"
      >About Us</a
    >
  </footer>
</html>

