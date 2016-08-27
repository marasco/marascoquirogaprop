<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Marasco Quiroga Propiedades</title>

        <link href="<?=URL::to('/')?>/css/font-awesome.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/fullscreen-slider.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/app.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/wow.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/custom.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class=""> 

        @yield('content') 
        @yield('contact') 
        @yield('footer') 
        <script type="text/javascript">
        window._baseUrl = '<?=URL::to("/")?>/';

          window.fbAsyncInit = function() {
            FB.init({
              appId      : '1580557768907207',
              xfbml      : true,
              version    : 'v2.7'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));


        </script>
        <script src="<?=URL::to('/')?>/js/jquery-2.1.1.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui-touch-punch.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.placeholder.js"></script>
        <script src="<?=URL::to('/')?>/js/bootstrap.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.touchSwipe.min.js"></script>
        <script src="//maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=geometry&amp;libraries=places" type="text/javascript"></script>

        <script src="<?=URL::to('/')?>/js/infobox.js"></script>

        <script src="<?=URL::to('/')?>/js/jquery.visible.js"></script>
        <script src="<?=URL::to('/')?>/js/wowslider.js"></script>
        <script src="<?=URL::to('/')?>/js/home.js" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>