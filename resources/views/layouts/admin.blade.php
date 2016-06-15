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
        <link href="<?=URL::to('/')?>/css/colors.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="notransition black">
        <div id="page-container">
            <ul class="cb-slideshow">
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
            </ul>
        </div>

        @yield('content')


        <script src="<?=URL::to('/')?>/js/jquery-2.1.1.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui-touch-punch.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.placeholder.js"></script>
        <script src="<?=URL::to('/')?>/js/bootstrap.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.touchSwipe.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.visible.js"></script>
        <script src="<?=URL::to('/')?>/js/signin.js" type="text/javascript"></script>
    </body>
</html>