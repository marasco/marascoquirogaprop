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
        $sliding.= '
        <li><div style="background-image:url('.$imageToShow.')"
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
    
    <div class="row">
        <div id="search-left-map" style=""> 
        <div class="col-xs-12">
        <h1>Buscador de propiedades</h1>
    </div> 
    <div class="col-xs-12 line-gray">
    </div>
    @if (1 || !empty($showSearch))
    <div class="col-xs-12 search-panel-top">
        <form class="form-inline" role="form"> 
            <div class="form-group">
            @if (count($listing_types))
            <div class="btn-group right20">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                    <span class="dropdown-label"><?php if (!empty($listing_type_selected)){ echo $listing_type_selected->name; } else{ echo $listing_types[0]->name; } ?></span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-select">
                    <?php $i = 0; ?>
                    @foreach ($listing_types as $i=>$listing_type) 
                        <li <?php if ($listing_type->id == $listing_type_selected->id){ echo 'class="active"'; } ?>>
                            <input type="radio" name="listing_type" value="{{ $listing_type->id }}" <?php if ($listing_type->id == $listing_type_selected->id){ echo ' checked="checked" '; } ?>><a href="javascript:void(0)">{{ $listing_type->name }}</a>
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
            <div class="form-group">
                <a href="javascript:document.forms[0].submit()" class="btn btn-green">Buscar</a> 
            </div>
        </form>
    </div>  
    @endif
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
                    }
                    ?>
                    <a href="{{ URL::to('/home/view/'). '/'.$item->id }}" class="property">
                    <div class="col-xs-12 property-item" id="property-div-{{ $item->id }}">

                        <div class="property-image" style="background-image: url({{ $imageToShow }});" alt="{{ $item->title }} ">
                            <div class="figType property-operation">{{ $operation }}</div>
                        </div>
                        <div class="property-data">
                            <div class="priceCap osLight"><span>{{ $showPrice }}</span></div>
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