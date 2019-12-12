<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Penbrothers - Nikko</title>

        <link rel="stylesheet" href="/css/app.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div id="app">
        
        <div class="container mx-auto ">
        <div class="pt-5 row justify-content-center">
        <router-link to="/"> Order </router-link>
        <router-link class="pl-5" to="/list"> Past Order List </router-link>

        </div>
</div>

            <router-view></router-view>
            

        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
