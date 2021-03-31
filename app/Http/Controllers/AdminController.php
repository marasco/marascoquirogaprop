<?php
use App\Listing;
use App\ListingImage;
namespace App\Http\Controllers;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use File;
use Image;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getDelete($id)
    {
        \App\Listing::find($id)->delete($id);
        return redirect('admin/index');
    }
    public function getUndelete($id){
        $listing= \App\Listing::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect('admin/index');
    }
    public function getIndex(Request $request)
    {
        $search = null;
        $order = 'recent';
        $bath = 0;
        $ambience = 0;
        $room = 0;
        $operation = null;
        $orderField = 'id';
        $orderValue = 'desc';

        $operation = $request->operation;

        if (!empty($request->bath)){
            $bath = $request->bath;
        }
        if (!empty($request->room)){
            $room = $request->room;
        }
        if (!empty($request->ambience)){
            $ambience = $request->ambience;
        }
        if (!empty($request->order)){
            $order = $request->order;
            switch ($order){
                case 'recent':
                    $orderValue ='desc';
                break;
                case 'price_desc':
                    $orderField ='price';
                    $orderValue='desc';
                break;
                case 'price_asc':
                    $orderField ='price';
                    $orderValue='asc';
                break;

            }
        }
        if (!empty($request->search) || !empty($request->bath)) {
            $search = $request->search;
            $listings = \App\Listing::withTrashed()
                ->where('property_code', 'like', '%'.$search.'%')
                //->orWhere('title', 'like', '%'.$search.'%')
                ->where('bath_qty', '>=', $bath)
                ->where('ambience_qty', '>=', $ambience)
                ->where('room_qty', '>=', $room)
                ->orderBy($orderField,$orderValue)
                ->paginate(10);
                if (!empty($request->operation)){
                    $listings->where('operation', '=', $operation);
                }

        }elseif (!empty($request->operation)) {
            $listings = \App\Listing::withTrashed()
                ->where('operation', $operation)
                ->where('bath_qty', '>=', $bath)
                ->where('ambience_qty', '>=', $ambience)
                ->where('room_qty', '>=', $room)
                ->orderBy($orderField, $orderValue)
                ->paginate(10);

        }else{
            $listings = \App\Listing::withTrashed()->orderBy($orderField,$orderValue)->paginate(10);
        }
        return view('admin/index', [
            'bath'=>$bath, 
            'ambience'=>$ambience, 
            'room'=>$room, 
            'listings'=>$listings, 
            'order'=>$order, 
            'search'=>$search, 
            'operation'=>$operation
            ]);
    }

    public function getNew(Request $request)
    {
        if (empty($request->old('operation'))){
            DB::table('listing_images')->where('listing_id', 0)->delete();
        }

        $listing_types = DB::table('listing_types')->get();
        $cities = DB::table('cities')->get();
        $operation = !empty($request->old('operation'))?$request->old('operation'):'sale';
        $currency = !empty($request->old('currency'))?$request->old('currency'):'U$S';
        $listing_type = !empty($request->old('listing_type'))?$request->old('listing_type'):1;
        $city = !empty($request->old('city'))?$request->old('city'):1;
        $location = !empty($request->old('location'))?html_entity_decode($request->old('location')):"{lat:-34.6550036,lng:-58.6784542}";
        if (!empty($request->old('location'))){
            //die($request->old('location'));
        }
        return view('admin/new', [
            'operation' => $operation,
            'listing_type_selected' => $listing_type, 
            'city_selected' => $city, 
            'listing_types'=>$listing_types, 
            'cities'=>$cities, 
            'location'=>$location, 
            'currency'=>$currency]);
    }

    public function getEdit(Request $request, $id)
    {
        $listing = \App\Listing::find($id);
        if (empty($listing)){
            return redirect('admin/index');
        }
        $listing_types = DB::table('listing_types')->get();
        $cities = DB::table('cities')->get();
        $listing_images = DB::table('listing_images')->where('listing_id', $id)->get();
        return view('admin/edit', [
            'listing' => $listing, 
            'listing_types'=>$listing_types, 
            'cities'=>$cities, 
            'listing_images'=>$listing_images
        ]);
    }
    private function Unique(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = 3;
        $randomString = '';
        for ($i = 0; $i < $charactersLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomString.= ''.rand(0,999);
        return $randomString;
    }
    public function postUploads(Request $request){
        try {
            if (!$request->hasFile('data')) {
                throw new \Exception("Error Processing Request", 1);
            }
            if (!$request->data['file']->isValid()) {
                throw new \Exception("Error Processing File", 1);
            }
            $listing_id = 0;
            if (!empty($request->data['id'])) {
                $listing_id = $request->data['id'];
            }
            $fileName = $this->getRandomString(20) . '.jpg';
            $destinationPath = 'uploads';
            $request->data['file']->move($destinationPath, $fileName);

            $listingImages = new \App\ListingImage;
            if (!empty($listing_id)){
                $listingImages->listing_id = $listing_id;
            }
            $listingImages->filename = $fileName;
            $listingImages->save();

            return response()->json(['success' => 'true', 'id' => $listingImages->id]);
        } catch (\Exception $e){
            return response()->json(['success' => 'false', 'message' => $e->getMessage()]);
        }
    }

    public function postDeleteUpload(Request $request){
        try {
            if (empty($request->data['id'])) {
                throw new \Exception("Error Processing Request", 1);
            }
            $id = $request->data['id'];
            $listing_image = \App\ListingImage::where('id',$id)->first();
            if (!empty($listing_image) && !empty($listing_image->filename)){
                File::delete('uploads/'.$listing_image->filename);
            }
            $success = DB::table('listing_images')->delete($id);
            return response()->json(['success' => (bool)$success]);
        } catch (\Exception $e){
            return response()->json(['success' => 'false', 'message' => $e->getMessage()]);
        }
    }
    public function postNew(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'short_desc' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        if ($validator->fails()) {
             return redirect('admin/new')
                ->with('error-message', 'Faltan campos obligatorios.')
                ->withErrors($validator)
                ->withInput();
        }
        if (!empty($request->id)){
            $listing = \App\Listing::find($request->id);
            if (empty($listing->property_code)){ 
                $listing->property_code = $this->Unique();
            }
        } else{
            $listing = new \App\Listing;
            $listing->property_code = $this->Unique();
        }
        $listing->privacy_comment = (string)@$request->privacy_comment;
        $listing->owner_data = @$request->owner_data;
        $listing->title = $request->title;
        $listing->short_desc = $request->short_desc;
        $listing->long_desc = $request->long_desc;
        $listing->type = $request->type;
        $listing->city_id = $request->city_id;
        $listing->operation = $request->operation;
        $listing->likes = 0;
        $listing->currency = !empty($request->currency)?$request->currency:'$';
        $listing->price = $request->price;
        $listing->ambience_qty = (int)$request->ambience_qty;
        $listing->room_qty = (int)$request->room_qty;
        $listing->bath_qty = (int)$request->bath_qty;
        $listing->seller_info = @$request->seller_info;
        $listing->location = $request->location;
        $listing->is_favorite = (!empty($request->is_favorite) && $request->is_favorite =='on')?1:0;
        $listing->has_poster = (!empty($request->has_poster) && $request->has_poster =='on')?1:0;
        $listing->published_in_mercadolibre = (!empty($request->published_in_mercadolibre) && $request->published_in_mercadolibre =='on')?1:0;
        $listing->published_in_zonaprop = (!empty($request->published_in_zonaprop) && $request->published_in_zonaprop =='on')?1:0;
        $listing->published_in_argenprop = (!empty($request->published_in_argenprop) && $request->published_in_argenprop =='on')?1:0;

        $success = $listing->save();
        if ($success){
            if (empty($request->id)){
            DB::table('listing_images')
                ->where('listing_id', 0)
                ->update(array('listing_id' => $listing->id));
            }

            $firstImage = \App\ListingImage::where('listing_id', $request->id)->first();
            if (!empty($firstImage) && !empty($firstImage->filename)){
                error_log($firstImage->filename);
                if (is_readable('uploads/'.$firstImage->filename)){
                    try {
                    \Image::make('uploads/'.$firstImage->filename)->resize(null, 200, 
                        function ($constraint) {
                            $constraint->aspectRatio();
                        }
                    )->save('uploads/'.'thumb_'.$firstImage->filename);
                    } catch (\Exception $e){

                    }
                }
            }

            
            $request->session()->flash('message', 'Propiedad actualizada exitosamente!');
            return redirect('admin/index');

        }else{
            $request->session()->flash('error-message', 'Ha ocurrido un error!');
        }

    }

    public function getCategories()
    {
        $listing_types = DB::table('listing_types')->paginate(20);
        return view('admin/categories', ['items'=>$listing_types]);
    }
    public function getCities()
    {
        $cities = DB::table('cities')->paginate(20);
        return view('admin/cities', ['items'=>$cities]);
    }
    public function getImagery(Request $request){
        return view('admin/create-image');

    }
    public function getCreate(Request $request)
    {
        $precio = $request->query('precio');
        $descripcion = $request->query('descripcion');
        $ubicacion = $request->query('ubicacion');
        $files = $request->query('files');
        $files = explode(',',$files);
        if (empty($files)){
            die('No hay archivos utiles');
        }
        $resources = array();
        $image = Image::make(public_path().'/images/mq_layer.png'); 
        foreach ($files as $k=>$file){
            //$file = storage_path().str_replace('http://marascoquirogaprop.com.ar','',$file);
            $resource[$k] = Image::make($file)->resize('676',null,function($c){
                $c->aspectRatio();
            });
            $image->insert($resource[$k], 'left', 368);
            
        }
        // ubicacion
        $image->text($ubicacion, 60, 164, function($font) {
            $font->file(public_path().'/fonts/sspro/SourceSansPro-Light.ttf');
            $font->size(24);
            $font->color('#666');
            $font->align('left');
            $font->valign('top');
            //$font->angle(0);
        });
        // descripcion
        $y = 200;
        $font_height=28;
        $lines = explode("\n", wordwrap($descripcion, 32));
        $i=0;
        foreach ($lines as $line){
            $i++;
            $image->text($line, 24, $y+($i*$font_height), function($font) {
                $font->file(public_path().'/fonts/sspro/SourceSansPro-Light.ttf');
                $font->size(24);
                $font->color('#222');
                $font->align('left');
                $font->valign('top');
                //$font->angle(0);
            });
        }

        $i++;
        // precio
        $image->text($precio, 24, $y+30+($i*$font_height), function($font) {
            $font->file(public_path().'/fonts/sspro/SourceSansPro-Regular.ttf');
            $font->size(24);
            $font->color('#85bb65');
            $font->align('left');
            $font->valign('top');
            //$font->angle(0);
        });
        return $image->response('png');
    }

    /* Categories */
    public function getNewCategory(Request $request)
    {
        return view('admin/categories-new');
    }
    public function getEditCategory(Request $request, $id)
    {
        $item = \App\ListingType::find($id);
        if (empty($item)){
            return redirect('admin/categories');
        }
        return view('admin/categories-edit', ['item'=>$item]);
    }
    public function postNewCategory(Request $request)
    {
        if (!empty($request->id)){
            $item = \App\ListingType::find($request->id);
        }else{
            $item = new \App\ListingType;
        } 
        $item->name = $request->name;
        $success = $item->save();
         
        return redirect('admin/categories');

    }
    public function getDeleteCategory($id)
    {
        DB::table('listing_types')->delete($id);
        return redirect('admin/categories');
    }

    /* Cities */
    public function getNewCity(Request $request)
    {
        return view('admin/cities-new');
    }
    public function getEditCity(Request $request, $id)
    {
        $item = \App\City::find($id);
        if (empty($item)){
            return redirect('admin/cities');
        }
        return view('admin/cities-edit', ['item'=>$item]);
    }
    public function postNewCity(Request $request)
    {
        if (!empty($request->id)){
            $item = \App\City::find($request->id);
        }else{
            $item = new \App\City;
        } 
        $item->name = $request->name;
        $success = $item->save();
         
        return redirect('admin/cities');

    }
    public function getDeleteCity($id)
    {
        DB::table('cities')->delete($id);
        return redirect('admin/cities');
    }

}
