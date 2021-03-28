<div class="home-header map ">
<div class="container">
    <div class="home-logo osLight">
        <a href="<?=URL::to('/')?>"><img src="<?=URL::to('/')?>/images/logo.png" height="60" /></a>
    </div>

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
                <a href="{{ URL::to('/home/search') }}">
                    Buscar
                </a>
            </li>
           <li>
                <a href="/#services">
                    Servicios
                </a>
            </li>
            <li>
                <a href="/#who-we-are">
                    Quiénes somos
                </a>
            </li>
           <li>
                <a href="/#contact">
                    Contactanos
                </a>
            </li>
      </ul>
</div>
 
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