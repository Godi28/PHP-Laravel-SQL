<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet" />
    <title>Cool Tech - Search Page</title>
  </head>
  <body id="searchbody" class="m-2 font-mono border-2 border-white">
    <h1 class="mx-2 mt-2 mb-11 text-4xl">Search Options</h1>
    <br />
    <img id="search" src="{{url('/images/search.jpg')}}" alt="search" />
    <form action="redirect" method="get">
      <label class="mx-2" for="input_search_id">Article id:</label>
      <input
        class="border-2 border-black placeholder:text-center"
        type="number"
        name="id_search"
        placeholder="enter article id"
        min="0"
        style="margin: 15px"
      />
      <button class="button" type="submit">Submit</button>
    </form>
    <br />
    <form action="redirect" method="get">
      <label class="mx-2" for="input_category_search"> Category:</label>
      <input
        class="border-2 border-black placeholder:text-center"
        type="text"
        name="category_search"
        placeholder="enter category"
        style="margin: 15px"
      />
      <button class="button" type="submit">Submit</button>
    </form>
    <br />
    <form action="redirect" method="get" class="mb-3">
      <label class="mx-2" for="input_tag_search"> Tag:</label>
      <input
        class="border-2 border-black placeholder:text-center"
        type="text"
        name="tag_search"
        placeholder="enter tag"
        style="margin: 15px"
      />
      <button class="button" class="outline-offset-2" type="submit">
        Submit
      </button>
    </form>
    <br /><br /><br /><br /><br /><br /><br />
    <x-alert />
  </body>
  <br />
  <footer class="text-sm font-mono">
    Copyright &copy Cool Tech <em>2015-2021</em>
    <a class="text-cyan-300 hover:underline" href="{{ url('/legal/privacy') }}"
      >Privacy Policy & Terms of Use</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/about') }}"
      >About Us</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/') }}">Home Page</a>
  </footer>
</html>