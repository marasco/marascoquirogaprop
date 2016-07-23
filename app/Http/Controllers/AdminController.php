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
        DB::table('listings')->delete($id);
        return redirect('admin/index');
    }

    public function getIndex()
    {
        $listings = DB::table('listings')->paginate(20);
        return view('admin/index', ['listings'=>$listings]);
    }

    public function getNew(Request $request)
    {
        if (empty($request->old('operation'))){
            DB::table('listing_images')->where('listing_id', 0)->delete();
        }

        $listing_types = DB::table('listing_types')->get();
        $operation = !empty($request->old('operation'))?$request->old('operation'):'sale';
        $listing_type = !empty($request->old('listing_type'))?$request->old('listing_type'):1;
        $location = !empty($request->old('location'))?$request->old('location'):"{lat:-34.6550036,lng:-58.6784542}";
        return view('admin/new', ['operation' => $operation,'listing_type_selected' => $listing_type, 'listing_types'=>$listing_types,'location'=>$location]);
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
                        ->withErrors($validator)
                        ->withInput();
        }
        if (!empty($request->id)){
            $listing = \App\Listing::find($request->id);
        }else{
            $listing = new \App\Listing;
        }
        $listing->title = $request->title;
        $listing->short_desc = $request->short_desc;
        $listing->long_desc = $request->long_desc;
        $listing->type = $request->type;
        $listing->operation = $request->operation;
        $listing->price = $request->price;
        $listing->location = $request->location;
        $success = $listing->save();
        if ($success){
            if (empty($request->id)){
            DB::table('listing_images')
                ->where('listing_id', 0)
                ->update(array('listing_id' => $listing->id));
            }
        }
        return redirect('admin/index');

    }

}
