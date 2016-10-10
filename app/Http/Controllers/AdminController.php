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
        if (!empty($request->search)){
            $search = $request->search;
            $listings = \App\Listing::withTrashed()
                ->where('property_code', 'like', '%'.$search.'%')
                ->orWhere('title', 'like', '%'.$search.'%')
                ->orderBy('price','ASC')
                ->paginate(10);
        }else{
            $listings = \App\Listing::withTrashed()->paginate(10);
        }
        return view('admin/index', ['listings'=>$listings, 'search'=>$search]);
    }

    public function getNew(Request $request)
    {
        if (empty($request->old('operation'))){
            DB::table('listing_images')->where('listing_id', 0)->delete();
        }

        $listing_types = DB::table('listing_types')->get();
        $operation = !empty($request->old('operation'))?$request->old('operation'):'sale';
        $currency = !empty($request->old('currency'))?$request->old('currency'):'U$S';
        $listing_type = !empty($request->old('listing_type'))?$request->old('listing_type'):1;
        $location = !empty($request->old('location'))?html_entity_decode($request->old('location')):"{lat:-34.6550036,lng:-58.6784542}";
        if (!empty($request->old('location'))){
            //die($request->old('location'));
        }
        return view('admin/new', ['operation' => $operation,'listing_type_selected' => $listing_type, 'listing_types'=>$listing_types,'location'=>$location,'currency'=>$currency]);
    }

    public function getEdit(Request $request, $id)
    {
        $listing = \App\Listing::find($id);
        if (empty($listing)){
            return redirect('admin/index');
        }
        $listing_types = DB::table('listing_types')->get();
        $listing_images = DB::table('listing_images')->where('listing_id', $id)->get();
        return view('admin/edit', ['listing' => $listing, 'listing_types'=>$listing_types, 'listing_images'=>$listing_images]);
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
            if (empty($listing->property_code))
                $listing->property_code = $this->Unique();
            // resize the first image -> thumbnail

            $firstImage = \App\ListingImage::where('listing_id', $request->id)->first();
            if (!empty($firstImage) && !empty($firstImage->filename)){
                \Image::make(\App::make('url')->to('/').'/uploads/'.$firstImage->filename)->resize(null, 200, 
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                )->save('uploads/'.'thumb_'.$firstImage->filename);
            }
            //
        }else{
            $listing = new \App\Listing;
            $listing->property_code = $this->Unique();
        }
        $listing->privacy_comment = $request->privacy_comment;
        $listing->owner_data = $request->owner_data;
        $listing->title = $request->title;
        $listing->short_desc = $request->short_desc;
        $listing->long_desc = $request->long_desc;
        $listing->type = $request->type;
        $listing->operation = $request->operation;
        $listing->likes = 0;
        $listing->currency = !empty($request->currency)?$request->currency:'$';
        $listing->price = $request->price;
        $listing->location = $request->location;
        $success = $listing->save();
        if ($success){
            if (empty($request->id)){
            DB::table('listing_images')
                ->where('listing_id', 0)
                ->update(array('listing_id' => $listing->id));
            }

            $firstImage = \App\ListingImage::where('listing_id', $request->id)->first();
            if (!empty($firstImage) && !empty($firstImage->filename)){
                \Image::make(\App::make('url')->to('/').'/uploads/'.$firstImage->filename)->resize(null, 200, 
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                )->save('uploads/'.'thumb_'.$firstImage->filename);
            }

            
            $request->session()->flash('message', 'Propiedad creada exitosamente!');
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

}
