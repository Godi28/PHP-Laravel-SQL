<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet" />
    <title>Cool Tech - About us Page</title>
  </head>
  <body id="aboutbody" class="m-2 border-2 border-white">
    <h1 class="font-mono text-3xl mx-2 mt-2">About Us</h1>
    <p class="text-lg font-mono mt-6 mb-4 indent-2 mx-2">
      Cool Tech specialises in bringing digestible information about all things
      technology for popular consumption. We are excited about technology and we
      have a passion for it that we can't help but share with the world.
    </p>
    <p class="text-lg font-mono mb-4 indent-2 mx-2">
      The organisation was formed in 2015 by a group of individuals who are
      enthusiastics about all things technology who made it their purpose to
      make quality reading material, on a variety of subjects pertaining to
      technology, accessible on this platform to those who have interest.
    </p>
    <p class="text-lg font-mono mb-14 indent-2 mx-2"> Since
      our conception we have been steadily growing with regards to our user
      interaction. We appreciate the invaluable support and we are looking
      forward to what the future holds for our ever growing Cool Tech family.</p>
    <img  id="logo3" src="{{url('/images/logo.jpg')}}" alt="logo"  />
    <h3 class="font-mono mx-2 my-2 text-xl">Contact Details:</h3>
    <p class="font-mono mx-2 my-2">011 234 5678</p>
    <p class="font-mono mx-2 mt-2 mb-4">cooltech@ct.co.za</p>
    <h3 class="font-mono mx-2 my-4 mb-2 text-xl">Physical Address:</h3>
    <p class="font-mono mx-2 my-2">158 Cool Boulevard</p>
    <p class="font-mono mx-2 my-2">Coolfontein</p>
    <p class="font-mono mx-2 mb-5 mt-2">Coolburg</p>
    <br /><br /><br /><br /><br />
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
    <a class="text-cyan-300 hover:underline" href="{{ url('/') }}">Home Page</a>
  </footer>
</html>

