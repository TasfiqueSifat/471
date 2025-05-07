<?php
// app/Http/Controllers/ReviewController.php
namespace App\Http\Controllers;

use App\Models\PropertyReview;
use App\Models\AgentProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Store a new review
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:agent_properties,id',
            'review_text' => 'required|string|max:500'
        ]);

        PropertyReview::create([
            'property_id' => $request->property_id,
            'user_id' => Auth::id(),
            'username' => Auth::user()->username,
            'review_text' => $request->review_text
        ]);

        return redirect()->back()->with('success', 'Your review has been added.');
    }
    public function showPropertyReviews($property_id)
    {
        $property = AgentProperty::findOrFail($property_id);
        $reviews = PropertyReview::where('property_id', $property_id)
                                ->orderBy('created_at', 'desc')
                                ->get();
                                
        return view('reviews.property_reviews', compact('property', 'reviews'));
    }
}