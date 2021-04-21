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
        $imageToShow = URL::to('/').'/uploads/thumb_'.$images[0]['filename'];
        $imageToShow2 = URL::to('/').'/uploads/'.$images[0]['filename'];
        $sliding.= '
        <li><div style="background-image:url('.$imageToShow.'),url('.$imageToShow2.')"
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
@include('includes.header')
<div class="publication container-fluid margintop100 ">
    
    <div class="row">
        <div id="search-left-map" style=""> 
        <div class="col-xs-12">
        <h1>Buscador de propiedades</h1>
    </div> 
    <div class="col-xs-12 line-gray">
    </div>
    <div class="col-xs-12 search-panel-top">
        <form class="form-inline" role="form"> 
            <div class="form-group">
            @if (count($listing_types))
            <div class="btn-group right20">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                    <span class="dropdown-label"><?php if (!empty($listing_type_selected)){ echo $listing_type_selected->name; } else { echo "Tipo"; } ?></span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-select">
                    <?php $i = 0; ?>
                    <li>
                        <input type="radio" name="listing_type" value="0" <?php if (empty($listing_type_selected)) { echo ' checked="checked" '; } ?>><a href="javascript:void(0)">Todas</a>
                        </li>
                    @foreach ($listing_types as $i=>$listing_type) 
                        
                        <li <?php if (!empty($listing_type_selected) && $listing_type->id == $listing_type_selected->id){ echo 'class="active"'; } ?>>
                            <input type="radio" name="listing_type" value="{{ $listing_type->id }}" <?php if (!empty($listing_type_selected) && $listing_type->id == $listing_type_selected->id){ echo ' checked="checked" '; } ?>><a href="javascript:void(0)">{{ $listing_type->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (count($cities))
            <div class="btn-group right20">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                    <span class="dropdown-label"><?php if (!empty($city_selected)){ echo $city_selected->name; } else { echo "Ubicacion"; } ?></span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-select">
                    <?php $i = 0; ?>
                    <li>
                        <input type="radio" name="city_id" value="0" <?php if (empty($city_selected)) { echo ' checked="checked" '; } ?>><a href="javascript:void(0)">Todas</a>
                        </li>
                    @foreach ($cities as $i=>$city) 
                        
                        <li <?php if (!empty($city_selected) && $city->id == $city_selected->id){ echo 'class="active"'; } ?>>
                            <input type="radio" name="city_id" value="{{ $city->id }}" <?php if (!empty($city_selected) && $city->id == $city_selected->id){ echo ' checked="checked" '; } ?>>
                            <a href="javascript:void(0)">{{ $city->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
        </div> 
        
            <div class="form-group adv">
                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="rent" <?php if (empty($request) || empty($request['sale']) || !empty($request['rent']) ) { echo 'checked="checked"'; } ?>><span class="fa fa-check"></span> Alquiler</label></div>
            </div>
            <div class="form-group adv right20">
                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="sale" <?php if (empty($request) || empty($request['rent'])  || !empty($request['sale']) ) { echo 'checked="checked"'; } ?>><span class="fa fa-check"></span> Venta</label></div>
            </div>
            <div class="form-group adv right20">
                <label><input type="text" class="form-control" placeholder="Código" style="width: 100px;" name="codigo"></label>
            </div>
            <div class="form-group clear" style="clear:both;display:block;">
                @if (count($currencies))
                <div class="btn-group right20">
                    <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                        <span class="dropdown-label"><?php if (!empty($currency_selected)){ echo $currency_selected; } else { echo "U\$S"; } ?></span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-select">
                        <?php $i = 0; ?>
                        @foreach ($currencies as $i=>$currency) 
                            <li <?php if (!empty($currency_selected) && $currency == $currency_selected){ echo 'class="active"'; } ?>>
                                <input type="radio" name="currency" value="{{ $currency }}" <?php if (!empty($currency_selected) && $currency == $currency_selected){ echo ' checked="checked" '; } ?>>
                                <a href="javascript:void(0)">{{ $currency }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group adv">
                    <div class="input-group btn-group">
                        <div class="input-group-addon">$</div>
                        <input class="form-control price" type="text" name="price-a" placeholder="Desde" value="{{ @$request['price-a'] }}" style="width:100px!important" />
                    </div>
                </div>
                <div class="form-group adv">
                    <div class="input-group btn-group">
                        <div class="input-group-addon">$</div>
                        <input class="form-control price" type="text" name="price-b" placeholder="Hasta" value="{{ @$request['price-b'] }}" style="width:100px!important" />
                    </div>
                </div>
                <a href="javascript:document.forms[0].submit()" class="btn btn-black btn-group">BUSCAR</a> 
            </div>
        </form>
    </div>  
            <div class="col-xs-12">
            	<div id="propery-list">
    				 
    			 @foreach ($listings as $i=>$item) 
                    <?php 
                    $showPrice = ($item->price==0)?'Oportunidad':$item->currency.' '.number_format($item->price,0,',','.'); 
                    $imageToShow = URL::to('/'). "/images/prop/1-1.png";
                    $images = $item->Images()->get();
                    $operation = ($item->operation=='sale')?'VENTA':'ALQUILER';
                    if (!empty($images[0]) && !empty($images[0]['filename'])){
                        $imageToShow = URL::to('/').'/uploads/thumb_'.$images[0]['filename'];
                        $imageToShow2 = URL::to('/').'/uploads/'.$images[0]['filename'];
                    }
                    ?>
                    <a href="{{ URL::to('/home/view/'). '/'.$item->id }}" class="property">
                    <div class="col-xs-12 property-item" id="property-div-{{ $item->id }}">

                        <div class="property-image" style="background-image: url({{ $imageToShow }}), url({{ $imageToShow2 }});" alt="{{ $item->title }} ">
                            <div class="figType property-operation">{{ $operation }}</div>
                        </div>
                        <div class="property-data">
                            <div class="priceCap osLight"><span>COD: {{ $item->property_code }} / {{ $showPrice }}</span></div>
                            <h3 class="osLight title-search">{{ $item->title }} </h3>
                            <div class="address">{{ $item->short_desc }} </div>
                            <div class="desc"><?= nl2br($item->long_desc) ?></div>
                             
                        </div>
                </div>
                    </a>
                <div class="col-xs-12 line-gray">
                </div>
                
                @endforeach	
    			</div>
            </div>
        </div>
        <div id="search-home-map-container">
            <div id="search-home-map" class="use-map search-map"></div>
        </div>
    </div>
</div>
@endsection 
@section('footer')
@include('includes.footer')
@endsection
@section('scripts')
  
@endsection