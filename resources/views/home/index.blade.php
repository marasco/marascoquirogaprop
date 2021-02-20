@extends('layouts.app')

@section('content')
<?php 
$map_listings = array(); 
$sliding = null;
foreach ($listings as $item) {
    $showPrice = ($item->price==0)?'Oportunidad':$item->currency.' '.number_format($item->price,0,',','.'); 
    $imageToShow = URL::to('/'). "/images/prop/1-1.png";
    $images = $item->Images()->get();
    $operation = ($item->operation=='sale')?'VENTA':'ALQUILER';
    $markerIcon = ($item->operation=='sale')?'marker-green.png':'marker-yellow.png';
    if (!empty($images[0]) && !empty($images[0]['filename'])){
        $imageToShow = URL::to('/').'/uploads/'.$images[0]['filename'];
        $sliding.= '
        <li><div class="wow-image" style="background-image:url('.$imageToShow.')"
" alt="'.$item->title.'" title="'.$item->title.'" id="wows1_0">'.$item->short_desc.'</div<</li>
';
    }

    $map_listings[] = array(
        'id' => $item->id,
        'title' => $item->title,
        'image' => $imageToShow,
        'type'  => $operation,
        'price' => $showPrice,
        'address' => $item->short_desc,
        'position' => htmlspecialchars_decode($item->location),
        'markerIcon' => $markerIcon
        );
}
$map_items = json_encode($map_listings);
?>

<script type="text/javascript">
    window._isAdmin = <?=(int)(!empty($user))?>;
    window._mapItems = <?=$map_items?>;

</script>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us13.list-manage.com","uuid":"2f49dfc9c797577bc9c22e0fd","lid":"54e9991af1"}) })</script>

<div id="hero-container-map">
    <div id="left-map">
        <div class="space-top"></div>
        <div class="row pb40 icon-top-container">
            <div class="col-xs-12 col-sm-6 s-menu-item-top top-icon1">
                <a href="{{ URL::to('/home/search') }}">
                    <span class="icon-home s-icon-top"></span>
                    <div class="s-content-top">
                    <div class="title-wrapper">
                        <h2 class="osLight">Buscador de propiedades</h2>
                    </div></div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 s-menu-item-top top-icon2">
                <a href="#services">
                    <span class="icon-settings s-icon-top"></span>
                    <div class="s-content-top">
                    <div class="title-wrapper">
                        <h2 class="osLight">Servicios</h2>
                    </div></div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 s-menu-item-top top-icon3">
                <a href="#who-we-are">
                    <span class="icon-users s-icon-top"></span>
                    <div class="s-content-top">
                    <div class="title-wrapper">
                        <h2 class="osLight">Quiénes somos</h2>
                    </div></div>
                </a>
            </div>
            
            <div class="col-xs-12 col-sm-6 s-menu-item-top top-icon4">
                <a href="#contact">
                    <span class="icon-envelope s-icon-top"></span>
                    <div class="s-content-top">
                    <div class="title-wrapper">
                        <h2 class="osLight">Contactanos</h2>
                    </div></div>
                </a>
            </div>
        </div>
    </div>
    <!--<div id="home-map" class="use-map"></div>-->

<div id="wowslider-container1">
<div class="ws_images"><ul>
<?=$sliding?>
 
</ul></div>
 
</div>
    @include('includes.header')

</div>
<div class="highlight">
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="h-title osLight">Encontrá tu nueva casa en Marasco Quiroga Propiedades</div>
        <div class="h-text osLight">Llamanos y buscaremos la mejor ubicación o proyecto para tu vivienda.</div>
    </div>
    <div class="col-xs-12 col-sm-4 phone-big">
        4624-4850
    </div>
</div>
</div>
 
<div class="home-wrapper">
    <div class="home-content">
        <div class="col-xs-12 backTitle"><h1 class="osLight">Quienes Somos</h1></div>
            <div class="col-xs-12">
<a id="who-we-are"></a>
            <p class="who-we-are">
    Somos una empresa joven que trabaja para satisfacer las necesidades inmobiliarias de nuestros clientes ofreciendo <span class="profesionalidad">profesionalidad</span>, <span class="eficacia">eficacia</span> y <span class="seriedad">seriedad</span>.
    </p>
    </div>

        <div class="col-xs-12 backTitle"><h1 class="osLight">Servicios</h1></div>
        <a id="services"></a>
        <div class="row pb40">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-pointer s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Encontrá las mejores ofertas inmobiliarias</h2>
                        <h3 class="s-sub osLight">Apta Créditos - PROCREAR</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-users s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Tasaciones</h2>
                        <h3 class="s-sub osLight">Tasamos su propiedad de manera gratuita y confiable.</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-home s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Confianza</h2>
                        <h3 class="s-sub osLight">Garantía de confianza en la zona. Seguridad y Honestidad.</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-cloud-upload s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Inversiones y Proyectos</h2>
                        <h3 class="s-sub osLight">Inversión inmobiliaria - Proyectos edilicios - Zonificaciones.</h3>
                    </div>
                </a>
            </div>
        </div>
        <a id="last"></a>
        <div class="col-xs-12 backTitle"><h1 class="osLight">Últimas publicaciones</h1></div>
        <div class="row pb40">
            @foreach ($listings as $i=>$item) 
                <?php 
                $per_page=9;
                $show = ($i<$per_page)?true:false;
                $showclass=!$show?' style="display:none"':null;
                $showPrice = ($item->price==0)?'Oportunidad':$item->currency.' '.number_format($item->price,0,',','.'); 
                $imageToShow = URL::to('/'). "/images/prop/1-1.png";
                $images = $item->Images()->get();
                $operation = ($item->operation=='sale')?'VENTA':'ALQUILER';
                if (!empty($images[0]) && !empty($images[0]['filename'])){
                    $imageToShow = URL::to('/').'/uploads/thumb_'.$images[0]['filename'];
                }
                $page = intval(($i+1)/$per_page);
                if (intval(($i+1)%$per_page)>0) $page+=1;

                $cssItemPage = 'item-page-'. (string)$page;
                ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 {{ $cssItemPage }}" <?=$showclass?>>
                <a href="{{ URL::to('/home/view/'). '/'.$item->id }}" class="propWidget-2">
                    <div class="fig">

                        <div class="listing-home" style="background-image: url({{ $imageToShow }});" alt="{{ $item->title }} "></div>
                        <div class="listing-home blur" style="background: black"  alt="image"></div>
                        <div class="opac"></div>

                        <div class="priceCap osLight"><span>{{ $showPrice }}</span></div>
                        <div class="figType">{{ $operation }}</div>
                        <h3 class="osLight">{{ $item->title }} </h3>
                        <div class="address">{{ $item->short_desc }} </div>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star-o star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>

            
            @endforeach
            @if (count($listing_types)>6)

            <div class="row">
                <div class="col-xs-12">
                    <div class="see-more" onclick="seeMoreItems()">
                    Ver más
                    </div>
                </div>
            </div>
            @endif
        </div>
        
       

    </div>
</div>
@endsection
@section('contact')
    <div class="row pb40 highlight">
        <a id="contact"></a>
        <div class="col-xs-12 backTitle"><h1 class="osLight color-white">Contactanos</h1></div>
        <div class="col-xs-12 subcontact">
            Escribinos a info@marascoquirogaprop.com.ar<br /> o completá el formulario de contacto.
        </div>
        <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-6 col-md-offset-3">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="/?contact=sent">
                {{ csrf_field() }}

                <input type="email" class="form-control input-lg" value="n@n.com" id="fakeemail1" style="opacity:0;width:0;position:absolute;height:0px;">
                <input type="password" class="form-control input-lg" id="fakeform2" style="opacity:0;width:0;position:absolute;height:0px;" >
                
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label color-white">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name"  id="contact_name" placeholder="Nombre">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label color-white">Tu Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label color-white">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label color-white">Mensaje</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="message" placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12 pull-right">
                            <a href="javascript:void(0)" onclick="javascript:document.forms[0].submit()" class="btn btn-o btn-white">Enviar</a>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection


@section('footer')

@include('includes.footer')

@endsection
