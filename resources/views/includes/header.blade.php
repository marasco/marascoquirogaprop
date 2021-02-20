<div class="home-header map">
    <div class="home-logo osLight">
        <a href="<?=URL::to('/')?>"><img src="<?=URL::to('/')?>/images/logo.png" height="40" /></a>
    </div>
    <div class="home-nav">
        <ul>
            <li style="text-align:right;font-size:14px" class="info-header"><a href="javascript:void(0)">{{ config('vars.sp.header') }}</a><br />info@marascoquirogaprop.com.ar</li>
            <li style="margin-top:2px"><a href="#contact" class="btn btn-green">Contactanos</a></li>
            @if (!empty($user))
	            <li style="margin-top:8px"><a href="{{ URL::to('/admin/new') }}" class="btn btn-green">Agregar propiedades</a></li>
	            <li></li>
            @endif
        </ul>
    </div>
</div>

@if (!empty($showSearch))
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
 @endif