<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->

    </head>
    <body>
        <div class="container">
            <div class="content" id="app">
              <div class="row">
                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs" id="myNavbar1">
                    <ul class="nav navbar-nav">
                         <router-link tag="li" to="/" exact>
                             <a>Home</a>
                         </router-link>

                         <router-link tag="li" to="/write">
                             <a>Write</a>
                         </router-link>

                         <router-link tag="li" to="/gallery">
                             <a>Gallery</a>
                         </router-link>
                     </ul>
                 </div>
             </div>
             <section>
                <router-view></router-view>
             </section>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
