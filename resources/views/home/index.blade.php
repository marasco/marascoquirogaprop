@extends('layouts.app')

@section('content')
<?php 
$map_listings = array(); 
foreach ($listings as $item) {
    $showPrice = ($item->price==0)?'Oportunidad':$item->currency.' '.number_format($item->price,0,',','.'); 
    $imageToShow = URL::to('/'). "/images/prop/1-1.png";
    $images = $item->Images()->get();
    $operation = ($item->operation=='rent')?'VENTA':'ALQUILER';
    if (!empty($images[0]) && !empty($images[0]['filename'])){
        $imageToShow = URL::to('/').'/uploads/'.$images[0]['filename'];
    }

    $map_listings[] = array(
        'title' => $item->title,
        'image' => $imageToShow,
        'type'  => $operation,
        'price' => $showPrice,
        'address' => $item->short_desc,
        'position' => htmlspecialchars_decode($item->location),
        'markerIcon' => 'marker-green.png'
        );
}
$map_items = json_encode($map_listings);
?>
<script type="text/javascript">
    window._mapItems = <?=$map_items?>;
</script>
<div id="hero-container-map">
    <div id="home-map"></div>
    <div class="home-header map">
        <div class="home-logo osLight">
        <img src="<?=URL::to('/')?>/images/logo.png" height="40" />
        </div>
        <a href="#" class="home-navHandler visible-xs"><span class="fa fa-bars"></span></a>
        <div class="home-nav">
            <ul>
                <li><a href="#"><?=config('vars.sp.header')?></a></li>
                <li><a href="#contact" class="btn btn-green">Contáctenos</a></li>
            </ul>
        </div>
    </div>
    <div class="search-panel">
        <form class="form-inline" role="form"> 
            <div class="form-group">
            @if (count($listing_types))
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle">
                    <span class="dropdown-label">{{ $listing_types[0]->name }}</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-select">
                    <?php $i = 0; ?>
                    @foreach ($listing_types as $i=>$listing_type) 
                    <?php $ifActive = ($i==0)?'class="active" ':'';$i++; ?>
                        <li {{ $ifActive }}>
                            <input type="radio" name="listing_type" value="{{ $listing_type->id }}" checked="checked"><a href="javascript:void(0)">{{ $listing_type->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            </div> 
            <div class="form-group hidden-xs adv">
                <div class="checkbox custom-checkbox"><label><input type="checkbox" checked="checked"><span class="fa fa-check"></span> Alquiler</label></div>
            </div>
            <div class="form-group hidden-xs adv">
                <div class="checkbox custom-checkbox"><label><input type="checkbox" checked="checked"><span class="fa fa-check"></span> Venta</label></div>
            </div>
            <div class="form-group">
                <a href="explore.html" class="btn btn-green">Buscar</a> 
            </div>
        </form>
    </div>
</div>
<div class="highlight">
    <div class="h-title osLight">Encontrá tu nueva casa en Marasco Quiroga Propiedades</div>
    <div class="h-text osLight">Llamanos y buscaremos la mejor ubicación o proyecto para tu vivienda.</div>
</div>
 

<div class="home-wrapper">
    <div class="home-content">
        <h2 class="osLight">Servicios</h2>
        <div class="row pb40">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-pointer s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Encontrá las mejores ofertas inmobiliarias</h2>
                        <h3 class="s-sub osLight">Existe una casa para cada persona.</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-users s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Agentes con experiencia</h2>
                        <h3 class="s-sub osLight">Honestidad, sin sorpresas ni dolores de cabeza.</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-home s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Comprá o alquilá tu próximo hogar</h2>
                        <h3 class="s-sub osLight">Garantía de confianza en alquileres y operaciones inmobiliarias.</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <a href="javascript:void(0)">
                    <span class="icon-cloud-upload s-icon"></span>
                    <div class="s-content">
                        <h2 class="s-main osLight">Tazaciones y proyectos</h2>
                        <h3 class="s-sub osLight">Pedí tasación para vender o traenos tu proyecto y lo gestionamos juntos.</h3>
                    </div>
                </a>
            </div>
        </div>
        <h2 class="osLight">Últimas publicaciones</h2>
        <div class="row pb40">
            @foreach ($listings as $i=>$item) 
                <?php 
                $show = ($i<6)?true:false;
                $showclass=!$show?' style="display:none"':null;
                $showPrice = ($item->price==0)?'Oportunidad':$item->currency.' '.number_format($item->price,0,',','.'); 
                $imageToShow = URL::to('/'). "/images/prop/1-1.png";
                $images = $item->Images()->get();
                $operation = ($item->operation=='sale')?'VENTA':'ALQUILER';
                if (!empty($images[0]) && !empty($images[0]['filename'])){
                    $imageToShow = URL::to('/').'/uploads/'.$images[0]['filename'];
                }
                $page = intval(($i+1)/6);
                if (intval(($i+1)%6)>0) $page+=1;

                $cssItemPage = 'item-page-'. (string)$page;
                ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 <?=$cssItemPage?>" <?=$showclass?>>
                <a href="<?=URL::to('/home/view/'). '/'.$item->id?>" class="propWidget-2">
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
        <h2 class="osLight color-white">Contactenos</h2>
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel-body">
                <form class="form-horizontal" role="form">

                <input type="email" class="form-control input-lg" value="n@n.com" id="fakeemail1" style="opacity:0;width:0;position:absolute;height:0px;">
                <input type="password" class="form-control input-lg" id="fakeform2" style="opacity:0;width:0;position:absolute;height:0px;" >
                
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label color-white">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label color-white">Tu Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label color-white">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" placeholder="Teléfono">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label color-white">Mensaje</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="message" placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12 pull-right">
                            <a href="#" class="btn btn-o btn-white">Enviar</a>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection


@section('footer')

<div class="home-footer">
    <div class="home-wrapper">
        <div class="row">
            
            <div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="osLight footer-header">Buscá</div>
                <ul class="footer-nav pb20">
                <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Oficinas</a></li>
                    <li><a href="#">Casas</a></li>
                    <li><a href="#">Terrenos</a></li>
                    <li><a href="#">Locales</a></li>
                    <li><a href="#">Garages</a></li>
                    <li><a href="#">Cocheras</a></li>
                    <li><a href="#">PHs</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="osLight footer-header">Contactanos</div>
                <ul class="footer-nav pb20">
                    <li class="footer-phone"><span class="fa fa-phone"></span> +54 911 4624 4850</li>
                    <li class="footer-address osLight">
                        <p>Cnel. Brandsen 342</p>
                        <p>Ituzaingó, Buenos Aires</p>
                        <p>Argentina</p>
                    </li>
                    <li><a target="_blank" href="https://www.facebook.com/Marasco-Quiroga-propiedades-440321106054766/?fref=ts" class="btn btn-sm btn-icon btn-round btn-o btn-white"><span class="fa fa-facebook"></span></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="osLight footer-header">Recibí ofertas a tu email</div>
                <form role="form">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Tu Email">
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-green btn-block">Suscribirme</a>
                    </div>
                </form>
            </div>
            <div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
        </div>
        <div class="copyright"><a href="http://www.flydevs.com/" target="_blank">flyDevs.com &copy; <?php echo date('Y'); ?></a></div>
    </div>
</div>

@endsection
