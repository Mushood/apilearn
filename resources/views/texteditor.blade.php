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
            <h1> Text Editor Page </h1>
            <div class="content" id="app">
                <button @click="submitForm"> Submit </button>
                <vue-editor v-model="content"></vue-editor>
                <textarea class="form-control" name="content" id="content" rows="8" v-model="content"></textarea>
                <p v-if="content">
                    @{{content}}
                </p>
            </div>

        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
