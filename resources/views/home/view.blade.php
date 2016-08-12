@extends('layouts.app')

@section('content')
<div class="home-header map">
    <div class="home-logo osLight">
        <img height="40" src="<?=URL::to('/')?>/images/logo.png"/>
    </div>
    <a class="home-navHandler visible-xs" href="#">
        <span class="fa fa-bars">
        </span>
    </a>
    <div class="home-nav">
        <ul>
            <li>
                <a href="#">
                    <?=config('vars.sp.header')?>
                </a>
            </li>
            <li>
                <a class="btn btn-green" href="#contact">
                    Contáctenos
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="publication container margintop100 ">
    <div class="row">
        <div class="col-xs-12">
            <h1>
                {{ $listing->title }}
            </h1>
        </div>
        <div class="col-xs-12">
        	<h3>{{ $listing->short_desc }}</h3>
        </div>
        
        <div class="col-xs-12 col-sm-8">
        	<div id="gallery" style="display:none;">
				@foreach ($listing_images as $i=>$image)
                   	<img alt="{{ $listing->title }}"
					 src="<?=URL::to('/')?>/uploads/{{ $image->filename }}"
					 data-image="<?=URL::to('/')?>/uploads/{{ $image->filename }}"
					 data-description="{{ $listing->short_desc }}" />
                @endforeach
				
			</div>
        </div>
        <div class="col-xs-12 col-sm-4">
        	<h4><?=nl2br($listing->long_desc)?></h4>
        </div>
    </div>
</div>
@endsection

@section('scripts')

	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-common-libraries.js'></script>	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-functions.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsgeneral.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsstrip.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-touchthumbs.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-panelsbase.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-strippanel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-gridpanel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsgrid.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-tiles.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-tiledesign.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-avia.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-slider.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-sliderassets.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-touchslider.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-zoomslider.js'></script>	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-video.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-gallery.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-lightbox.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-carousel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-api.js'></script>

	<link rel='stylesheet' href='<?=URL::to('/')?>/js/plugins/unitegallery/css/unite-gallery.css' type='text/css' />
	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/themes/default/ug-theme-default.js'></script>
	<link rel='stylesheet' 		  href='<?=URL::to('/')?>/js/plugins/unitegallery/themes/default/ug-theme-default.css' type='text/css' />
	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery();

		});
		
	</script>


@endsection