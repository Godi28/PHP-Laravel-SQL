<?php

/** function which returns the legal subsection based on the entered url .
 *
 *  @access private
 *  @author Ogodiseng Sehoole
 *  @param $subsection string the entered subsection
 **/
function pageName($subsection){
    // control statement used to returnt a legal title based on the url entered
    if ($subsection === 'tou'){
        return 'Terms of Use';
    }else{
            return 'Privacy Policy';
    }
}

// EOF

?>
<!-- The php below calls the fucntion and dispays the relevant page-->
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet" />
    <title>Cool Tech - {{pageName($subsection)}} Page</title>
  </head>
  <body id="legalbody" class="font-mono m-2 border-2 border-white">
    <h1 class="text-3xl mt-2 mb- mx-2">{{pageName($subsection)}}</h1>

    @if(pageName($subsection)== 'Terms of Use')

    <h2 class="text-xl mt-4 mx-2 mb-2">Date of issue: 2020/12/11</h2>
    <p class="mx-2 mb-3 indent-2">
      Welcome to the Cool Tech company website. These Terms of Use outline your
      legal obligations when using the website. Please go through these Terms
      with care before using the website.By using the website you accept these
      Terms and agree to be held legally accountable. Please check
      <a
        class="text-cyan-300 hover:underline"
        href="{{ url('/legal/privacy') }}"
      >
        Privacy Policy</a
      >
      for details regarding our privacy policy.
    </p>
    <p class="mx-2 mb-3 indent-2">
      The web services are provided to you free of charge while certain other
      articles related to the web content can be made available for purchase on
      request.
    </p>

    <p class="mx-3 indent-2">
      We reserve the right to make any suitable changes to our Terms in the
      future so please acquaint yourself with the latest issue.
    </p>

    <h2 class="text-xl mt-4 mx-2 mb-2">Article Use</h2>

    <p class="mx-2 indent-2">
      Under no circumstances can articles on this website be taken and used as
      your own intellectual propery.
    </p>

    <h2 class="text-xl mt-4 mx-2 mb-2">Disputes and Arbitration</h2>

    <p class="mx-2 mb-4 indent-2">
      If you have any dispute or claim against us regarding a purchase and it is
      not resolved by contacting us, you and we each agree to attempt to resolve
      the matter first through informal negotiation. If unsuccesful,the next
      step is to try and resolve the matter through binding arbitration or an
      individual action in a small claims court in South Africa.
    </p>
    @else

    <h2 class="text-xl mt-4 mx-2 mb-3">Date of issue: 2020/09/09</h2>

    <p class="mx-2 mb-3 indent-2">
      This Policy describes how Cool Tech collect, use and disclose certain
      information, including your Personal Information, both online and offline,
      and the choices your known agreement thereof.
    </p>

    <p class="mx-2 mb-3 indent-2">
      We will let you know the kind of information we collect about you and how
      we use it and will give you choices about how your information is
      collected and used. if required by law, the information you provided will
      be accessible. We will protect your information reasonably and also take
      responsibility for the secure processing of your information.Concerns or
      questions that you have about how we process your information will be
      addressed with transparency. Some information collected about you will
      only be for the purposes of improving our services.
    </p>
    <p class="mx-2 mb-4 indent-2">
      Please check
      <a class="text-cyan-300 hover:underline mb-8 " href="{{ url('/legal/tou') }}">
        Terms of Use</a
      >
      for details regarding our terms of use.
    </p>
    @endif
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    <x-alert />
  </body>
  <br />
  <footer class="text-sm font-mono">
    Copyright &copy Cool Tech <em>2015-2021</em>
    <a class="text-cyan-300 hover:underline" href="{{ url('/search') }}"
      >Search</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/about') }}"
      >About Us</a
    ><text> |</text>
    <a class="text-cyan-300 hover:underline" href="{{ url('/') }}">Home Page</a>
  </footer>
</html>


