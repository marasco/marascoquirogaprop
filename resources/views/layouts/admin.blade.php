
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Marasco Quiroga Propiedades</title>

        <link href="<?=URL::to('/')?>/css/font-awesome.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/jquery-ui.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/datepicker.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/app.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/colors.css" rel="stylesheet">
        <link href="<?=URL::to('/')?>/css/jquery.growl.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="notransition">
    <script>
        window.__baseUrl = "<?php echo URL::to('/'); ?>"; 
    </script>
        <!-- Header -->

        <div id="header">
            <div class="logo">
                <a href="index.html">
                    <span class="fa fa-home marker"></span>
                    <span class="logoText">MQ</span>
                </a>
            </div>
            <a href="#" class="navHandler"><span class="fa fa-bars"></span></a>
            <div class="search">
                <span class="searchIcon icon-magnifier"></span>
                <input type="text" placeholder="Buscador de propiedades">
            </div>
            <div class="headerUserWraper">
                 
                <a href="#" class="headerUser dropdown-toggle" data-toggle="dropdown">
                    <img class="avatar headerAvatar pull-left" src="<?=URL::to('/').'/images/avatar-1.png'?>" alt="avatar">
                    <div class="userTop pull-left">
                        <span class="headerUserName">MQ PROP</span> <span class="fa fa-angle-down"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
                <div class="dropdown-menu pull-right userMenu" role="menu">
                    <div class="mobAvatar">
                        <img class="avatar mobAvatarImg" src="<?=URL::to('/').'/images/avatar-1.png'?>" alt="avatar">
                        <div class="mobAvatarName">MQ PROP</div>
                    </div>
                    <ul>
                        <li><a href="#"><span class="icon-settings"></span>Opciones</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL::to('/logout'); ?>"><span class="icon-power"></span>Salir</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- Left Side Navigation -->

        <div id="leftSide">
            <nav class="leftNav scrollable">
                <div class="search">
                    <span class="searchIcon icon-magnifier"></span>
                    <input type="text" placeholder="Search for houses, apartments...">
                    <div class="clearfix"></div>
                </div>
                <ul>
                     
                   
                    <li class="hasSub">
                        <a href="#"><span class="navIcon icon-layers"></span><span class="navLabel">Propiedades</span><span class="fa fa-angle-left arrowRight"></span></a>
                        <ul>
                            <li><a href="<?=URL::to('/')?>/admin/?operation=sell">Ventas</a></li>
                            <li><a href="<?=URL::to('/')?>/admin/?operation=rent">Alquileres</a></li>
                        </ul>
                    </li>
                     
                </ul>
            </nav>
             
        </div>
        <div class="closeLeftSide"></div>





        @yield('content')


        <script src="<?=URL::to('/')?>/js/jquery-2.1.1.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery-ui-touch-punch.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.placeholder.js"></script>
        <script src="<?=URL::to('/')?>/js/bootstrap.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.touchSwipe.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.slimscroll.min.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.visible.js"></script>
        <script src="//maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=geometry&amp;libraries=places" type="text/javascript"></script>
        <script src="<?=URL::to('/')?>/js/signin.js" type="text/javascript"></script>
        <script src="<?=URL::to('/')?>/js/jquery.mjs.nestedSortable.js"></script>
        <script src="<?=URL::to('/')?>/js/infobox.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.tagsinput.min.js"></script>
        <script src="<?=URL::to('/')?>/js/bootstrap-datepicker.js"></script>
        <script src="<?=URL::to('/')?>/js/app.js" type="text/javascript"></script>
        <script src="<?=URL::to('/')?>/js/sortable.js"></script>
        <script src="<?=URL::to('/')?>/js/jquery.growl.js"></script>
        <script src="<?=URL::to('/')?>/js/bootstrap-filestyle.min.js"></script>
        @yield('scripts')

    </body>
</html>