<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Style Sheets-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- uses existing css file containing bootstap-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

        <title>{{config('app.name', 'ASForum')}}</title>
    </head>
    <body>
        @include('include.navbar')
        <div class="container">
            @include('include.messages')
            @yield('content')           <!--laravel blade snippets exention -->
        </div>

        <!-- Scripts -->
        <script src="{{ URL::asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-1544886932221166",
                enable_page_level_ads: true
            });
        </script>

        <script>
            $(function() {
                $( "#datepicker1" ).datepicker({
                    dateFormat: 'yy/mm/dd'
                });
            });
        </script>
        <script>
        $(function() {
            $( "#datepicker2" ).datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
        </script>


    </body>
</html>
