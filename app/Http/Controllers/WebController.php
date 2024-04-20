<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\About;
use App\Models\Faq;
use App\Models\Queries;
use App\Models\Contact;
use App\Models\Restaurant;
use App\Models\RestaurantImages;
use App\Models\RestaurantReview;
use App\Models\Suggestion;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class WebController extends Controller
{
    public function about(){
        $details = About::first();
        if($details) {
            $data['details'] = $details;
        } else {
            $data['details'] = null;
        }
    
        $foodTypes = Food::orderBy('id', 'desc')->take(4)->get();
        $data['types'] = $foodTypes;
    
        $reviews = Review::leftJoin('users', 'reviews.userid', '=', 'users.id')
                         ->select('users.*', 'reviews.*', 'reviews.id as rid')
                         ->orderBy('rid', 'desc')
                         ->get();
    
        // Pass both $data and $reviews to the view
        return view('about', compact('data', 'reviews'));
    }
    
    
    public function contact(){
        $details = Contact::first();
        if($details) {
            $data['details'] = $details;
        } else {
            $data['details'] = [];
        }
        return view('contact', $data);
    }
    public function send(request $request){
        $request->validate([
        '*'=>'required',
        ]);
        $data =$request->all();
        Queries::create($data);
        return redirect()->route('contact')->with('success', 'Message sent successfully');
    }
    public function details($id){
        $data['restaurant'] =Restaurant::find($id);
        $restaurantId = $data['restaurant']->id;

        $data2 = RestaurantImages::leftJoin('restaurants', 'restaurant_images.restaurant_id', '=', 'restaurants.id')
        ->where('restaurant_images.restaurant_id', $restaurantId)
        ->select('restaurant_images.*')
        ->get();
        return view('details',$data,['restaurantdets'=>$data2]);
    }
    public function index()
    {
        if (auth()->check()) {
            $loginid = auth()->user()->id;
            $suggestion = Suggestion::where('userid', $loginid)->orderBy('created_at', 'desc')->take(4)->get();
        } else {
            $suggestion = []; // Or handle it as per your application's logic
        }
    
        $faqs = Faq::orderBy('id', 'desc')->get();
        $restaurants = Restaurant::orderBy('id', 'desc')->get();
        $reviews = Review::leftJoin('users', 'reviews.userid', '=', 'users.id')
            ->select('users.*', 'reviews.*', 'reviews.id as rid')
            ->orderBy('rid', 'desc')
            ->get();
    
        return view('index', [
            'faqs' => $faqs,
            'restaurants' => $restaurants,
            'reviews' => $reviews,
            'suggestion' => $suggestion,
        ]);
    }
    public function sendReview(request $request){
        $user = Auth::user();
        $reviewExists = Review::where('userid', $user->id)->exists();
        if ($reviewExists) {
            return redirect()->route('about')->with('error', 'You have already submitted a review.');
        }
        $request->validate([
        '*'=>'required',
        ]);
        $data = $request->all();
        $data['userid'] = $user->id; 
        Review::create($data);
        return redirect()->route('about')->with('success', 'Review added successfully');
    }
    public function restaurantreview(Request $request){
        $user = Auth::user();
        $reviewExists = RestaurantReview::where('userid', $user->id)->exists();
        
        if ($reviewExists) {
            return redirect()->back()->with('error', 'You have already submitted a review.');
        }

        $request->validate([
            'restaurantid' => 'required',
            'ratingInput' => 'required',
            'msg' => 'required',
        ]);

        $data = $request->all();
        $data['userid'] = $user->id;

        RestaurantReview::create($data);

        return redirect()->back()->with('success', 'Review added successfully');
    }
    
    public function searchfilter(Request $request)
    {
        if (auth()->check()) {
            $location = $request->input('location');
            $foodType = $request->input('foodType');
            $userId = auth()->id();
            $loginId = auth()->user()->id;
    
            $data = $request->all();
            $data['userid'] = $userId;
    
            // Create a new suggestion
            $newSuggestion = Suggestion::create($data);
    
            $uniquesugg = Suggestion::where('userid', $loginId)
            ->orderBy('created_at', 'desc')
            ->get();
            $latestSuggestions = Suggestion::where('userid', $loginId)
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get();
    
            // Check if there are more than 4 suggestions for the user
            $totalSuggestions = $uniquesugg->count();
            // print_r($totalSuggestions);die();
    
            if ($totalSuggestions > 4) {
                // Fetch IDs of suggestions to keep
                $suggestionIdsToKeep = $latestSuggestions->pluck('id')->toArray();
                // print_r($suggestionIdsToKeep);die();
                // Delete suggestions except the latest 4
                Suggestion::where('userid', $loginId)
                    ->whereNotIn('id', $suggestionIdsToKeep)
                    ->delete();
            }
    
            return view('googlerestaurants', [
                'location' => $location,
                'foodType' => $foodType,
                'suggestions' => $latestSuggestions,
            ]);
        } else {
            return redirect()->route('/')->with('error', 'In order to make a search, Login first');
        }
    }
      
    public function detailssearch(){
        return view('detailssearch');
    }       
    public function terms(){
        return view('terms');
    }
} 


