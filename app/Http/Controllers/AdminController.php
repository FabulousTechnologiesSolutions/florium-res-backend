<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\About;
use App\Models\Faq;
use App\Models\Queries;
use App\Models\Contact;
use App\Models\Restaurant;
use App\Models\RestaurantImages;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function countt(){
        $totalrestaurants = Restaurant::count();
        $locations = Restaurant::distinct()->count('location');
        $totalavailable = Restaurant::where('avaibility','Available')->count();
        $foodtypes = Food::count();
        $Queries = Queries::count();
        $totalusers = User::where('role',1)->count();
        return view('admin.dashboard' ,compact('totalrestaurants','locations','totalusers','totalavailable','foodtypes','Queries'));
    }
    public function managereviews(){
        $data =Review::leftjoin('users','reviews.userid','=','users.id')
        ->select('users.*','reviews.*','reviews.id as rid')
        ->orderBy('rid', 'desc')->get();
        return view('admin.managereviews',['reviews'=>$data]);
    }
    public function deletereview($id){
        $data =Review::find($id);
        $data->delete();
        return redirect()->route('admin.managereviews')->with ('Delete','Review Deleted Successfully');
    }


    public function managerestaurant(){
        $data =Restaurant::orderBy('id', 'desc')->get();
        return view('admin.managerestaurant',['restaurants'=>$data]);
    }
    public function addrestaurant(){
        return view('admin.addrestaurant');
    }
    public function saverestaurant(request $request){
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'location' => 'required',
            'link' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'price' => 'required',
            'avaibility' => 'required',
            'details' => 'required',
            'about' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'image1' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'image2' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'image3' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'image4' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'image5' => 'required|mimes:jpeg,png,jpg,svg,webp',
        ]);

        $photo = $request->file('image');
        $photo_name =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name);

        $photo = $request->file('image1');
        $photo_name1 =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name1);

        $photo = $request->file('image2');
        $photo_name2 =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name2);

        $photo = $request->file('image3');
        $photo_name3 =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name3);

        $photo = $request->file('image4');
        $photo_name4 =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name4);

        $photo = $request->file('image5');
        $photo_name5 =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name5);

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'location' => $request->location,
            'link' => $request->link,
            'phone' => $request->phone,
            'type' => $request->type,
            'price' => $request->price,
            'avaibility' => $request->avaibility,
            'details' => $request->details,
            'about' => $request->about,
            'image' => $photo_name,
            'image1' => $photo_name1,
            'image2' => $photo_name2,
            'image3' => $photo_name3,
            'image4' => $photo_name4,
            'image5' => $photo_name5,

        ]);
        $imagePaths = $request->file('images');
        if ($imagePaths) {
            foreach ($imagePaths as $image) {
                $originalName = time() . "-" . $image->getClientOriginalName();
                $imagePathDestination = public_path('uploads');
                $image->move($imagePathDestination, $originalName);
                RestaurantImages::create([
                    'restaurant_id' => $restaurant->id,
                    'image' => $originalName,
                ]);
            }
        }

        return redirect()->route('admin.managerestaurant')->with('success', 'Restaurant added successfully');
    }
    public function editrestaurant($id){
        $data['restaurant'] =Restaurant::find($id);
        $restaurantId = $data['restaurant']->id;

        $data['galleryImages'] = RestaurantImages::leftJoin('restaurants', 'restaurant_images.restaurant_id', '=', 'restaurants.id')
        ->where('restaurant_images.restaurant_id', $restaurantId)
        ->select('restaurant_images.*')
        ->get();
        return view('admin.editrestaurant',$data);
    }
    public function updaterestaurant(Request $request) {
        $request->validate([
        ]);

        $restaurant = Restaurant::find($request->id);

        if (!$restaurant) {
            return redirect()->route('admin.managerestaurant')->with('error', 'Restaurant not found');
        }

        if ($request->hasFile('image') || $request->hasFile('image1') || $request->hasFile('image2') || $request->hasFile('image3') || $request->hasFile('image4') || $request->hasFile('image5')) {
            $restaurantData = [
                'name' => $request->name,
                'location' => $request->location,
                'link' => $request->link,
                'phone' => $request->phone,
                'type' => $request->type,
                'price' => $request->price,
                'avaibility' => $request->avaibility,
                'details' => $request->details,
                'about' => $request->about,
            ];

            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $photoName = time() . "-" . $photo->getClientOriginalName();
                $photo->move(public_path('uploads'), $photoName);
                $restaurantData['image'] = $photoName;
            }

            for ($i = 1; $i <= 5; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $photo = $request->file('image' . $i);
                    $photoName = time() . "-" . $photo->getClientOriginalName();
                    $photo->move(public_path('uploads'), $photoName);
                    $restaurantData['image' . $i] = $photoName;
                }
            }

            $restaurant->update($restaurantData);
        } else {
            $restaurant->update([
                'name' => $request->name,
                'location' => $request->location,
                'link' => $request->link,
                'phone' => $request->phone,
                'type' => $request->type,
                'price' => $request->price,
                'avaibility' => $request->avaibility,
                'details' => $request->details,
                'about' => $request->about,
            ]);
        }

        // Handle gallery images update if new images are provided
        $galleryIds = $request->input('gallery_id', []);

        foreach ($galleryIds as $key => $galleryId) {
            $gimg = RestaurantImages::find($galleryId);
            if (!$gimg) {
                return redirect()->route('admin.managerestaurant')->with('error', 'Gallery image not found');
            }
            $imagePathsOld = $request->file('imagesold');
            if (isset($imagePathsOld[$key])) {
                $image = $imagePathsOld[$key];
                $originalName = time() . "-" . $image->getClientOriginalName();
                $imagePathDestination = public_path('uploads');
                $image->move($imagePathDestination, $originalName);
                $gimg->update([
                    'image' => $originalName,
                ]);
            }
        }

        // Handle new gallery images
        $imagePaths = $request->file('images');
        if ($imagePaths) {
            foreach ($imagePaths as $image) {
                $originalName = time() . "-" . $image->getClientOriginalName();
                $imagePathDestination = public_path('uploads');
                $image->move($imagePathDestination, $originalName);
                RestaurantImages::create([
                    'restaurant_id' => $restaurant->id,
                    'image' => $originalName,
                ]);
            }
        }

        return redirect()->route('admin.managerestaurant')->with('savectour', 'Museum updated successfully');
    }
    public function deleterestaurant($id){
        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return redirect()->back()->with('error', 'Restaurant not found.');
        }
            $imagePaths = [
            $restaurant->image,
            $restaurant->image1,
            $restaurant->image2,
            $restaurant->image3,
            $restaurant->image4,
            $restaurant->image5,
        ];
        foreach ($imagePaths as $image) {
            $imagePath = public_path('uploads/' . $image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $restaurantImages = RestaurantImages::where('restaurant_id', $restaurant->id)->get();
        foreach ($restaurantImages as $restaurantImage) {
            $imagePath = public_path('uploads/' . $restaurantImage->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $restaurantImage->delete();
        }
        $restaurant->delete();

        return redirect()->route('admin.managerestaurant')->with('success', 'Restaurant deleted successfully');
    }
    public function restaurantdetail($id){
        $data['restaurant'] =Restaurant::find($id);
        $restaurantId = $data['restaurant']->id;

        $data2 = RestaurantImages::leftJoin('restaurants', 'restaurant_images.restaurant_id', '=', 'restaurants.id')
        ->where('restaurant_images.restaurant_id', $restaurantId)
        ->select('restaurant_images.*')
        ->get();
        return view('admin.restaurantdetail',$data,['restaurantdets'=>$data2]);
    }


    public function managefaq(){
        $data =Faq::orderBy('id', 'desc')->get();
        return view('admin.managefaq',['faqs'=>$data]);
    }
    public function addfaq(){
        return view('admin.addfaq');
    }
    public function savefaq(request $request){
        $request->validate([
        '*'=>'required',
        ]);
        $data =$request->all();
        Faq::create($data);
        return redirect()->route('admin.managefaq')->with('success', 'Faq added successfully');
    }
    public function editfaq($id){
        $data['faq'] =Faq::find($id);
        return view('admin.editfaq',$data);
    }
    public function updatefaq(request $request) {
        $request->validate([
            '*' => 'required',
        ]);
        $data = Faq::find($request->id);
        $data->update($request->all());;
        return redirect()->route('admin.managefaq')->with('update', 'Faq updated successfully');
    }
    public function deletefaq($id){
        $data =Faq::find($id);
        $data->delete();
        return redirect()->route('admin.managefaq')->with ('Delete','Faq Deleted Successfully');
    }


    public function manageabout(){
        $details = About::first();
        if($details) {
            $data['details'] = $details;
        } else {
            $data['details'] = [];
        }
        return view('admin.manageabout', $data);
    }
    public function updateabout(request $request) {
        $about = About::find(1);

        $request->validate([
            '*' => 'required',
            'image' => 'sometimes|required|file|mimes:jpeg,png,jpg,svg,webp',
        ]);

        $data = $request->except('_token', '_method', 'image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . "-" . $image->getClientOriginalName();
            $image_destination = public_path('uploads');
            $image->move($image_destination, $image_name);
            $data['image'] = $image_name;

            if ($about && $about->image) {
                $oldImagePath = public_path('uploads/' . $about->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        if ($about) {
            $about->update($data);
            return redirect()->route('admin.manageabout')->with('update', 'About page updated successfully');
        } else {
            About::create($data);
            return redirect()->route('admin.manageabout')->with('success', 'About Data added successfully');
        }
    }


    public function managefood(){
        $data = Food::orderBy('id', 'desc')->take(4)->get();
        return view('admin.managefood', ['types' => $data]);
    }
    public function addfood(){
        return view('admin.addfood');
    }
    public function savefood(request $request){
        $request->validate([
        '*'=>'required',
        'image'   =>'required|file|mimes:jpeg,png,jpg,svg,webp',
        ]);
        $data =$request->all();
        $photo = $request->file('image');
        $photo_name =time()."-".$photo->getClientOriginalName();
        $photo_destination=public_path('uploads');
        $photo->move($photo_destination,$photo_name);
        $data['image'] = $photo_name;
        $feedback = Food::create($data);
        return redirect()->route('admin.managefood')->with('success', 'Food Type added successfully');
    }
    public function editfood($id){
        $data['type'] =Food::find($id);
        return view('admin.editfood',$data);
    }
    public function updatefood(request $request){
        if($request->file('image')==null){
            Food::find($request->id)->update(
            $request->except('image')
            );
        }else {
            $photo = $request->file('image');
            $photo_name = time() . "-" . $photo->getClientOriginalName();
            $photo_destination = public_path('uploads');
            $photo->move($photo_destination, $photo_name);

            $list = Food::find($request->id);
            $list->update([
                'image' => $photo_name,
            ] + $request->all());
        }
        return redirect()->route('admin.managefood')->with ('update','Food Type updated Successfully');

    }
    public function deletefood($id){
        $data =Food::find($id);
        $imagePath = public_path('uploads/' . $data->image);
        $data->delete();
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        return redirect()->route('admin.managefood')->with ('Delete','Food Type Deleted Successfully');
    }


    public function managecontact(){
        $details = Contact::first();
        if($details) {
            $data['details'] = $details;
        } else {
            $data['details'] = [];
        }
        return view('admin.managecontact', $data);
    }
    public function updatecontact(request $request) {
        $contact = Contact::find(1);

        $request->validate([
            '*' => 'required',
            'image1' => 'sometimes|required|file|mimes:jpeg,png,jpg,svg,webp',
            'image2' => 'sometimes|required|file|mimes:jpeg,png,jpg,svg,webp',
            'image3' => 'sometimes|required|file|mimes:jpeg,png,jpg,svg,webp',
            'image4' => 'sometimes|required|file|mimes:jpeg,png,jpg,svg,webp',
        ]);

        $data = $request->except('_token', '_method', 'image1', 'image2', 'image3', 'image4');

        for ($i = 1; $i <= 4; $i++) {
            $imageKey = 'image' . $i;
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $image_name = time() . "-" . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $image_name);
                $data[$imageKey] = $image_name;

                if ($contact && $contact->$imageKey) {
                    $oldImagePath = public_path('uploads/' . $contact->$imageKey);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        if ($contact) {
            $contact->update($data);
            return redirect()->route('admin.managecontact')->with('update', 'About page updated successfully');
        } else {
            Contact::create($data);
            return redirect()->route('admin.managecontact')->with('success', 'About Data added successfully');
        }
    }

    public function fromqueries(){
        $data =Queries::orderBy('id', 'desc')->get();
        return view('admin.fromqueries',['queries'=>$data]);
    }
    public function deletequery($id){
        $data =Queries::find($id);
        $data->delete();
        return redirect()->route('admin.fromqueries')->with ('Delete','Query Deleted Successfully');
    }


}
