<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\AgentProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
      {
          $wishlistItems = Wishlist::where('user_id', Auth::id())
              ->with('property')
              ->get();
          if (request()->ajax()) {
              return response()->json([
                  'wishlistItems' => $wishlistItems
              ]);
          }
        
          return view('wishlist.index', compact('wishlistItems'));
      }

    public function addToWishlist(Request $request)
    {
        $property_id = $request->property_id;
        
      
        $existingItem = Wishlist::where('user_id', Auth::id())
            ->where('property_id', $property_id)
            ->first();
            
        if ($existingItem) {
            return response()->json([
                'status' => 'error',
                'message' => 'Property already in wishlist'
            ]);
        }
        
       
        Wishlist::create([
            'user_id' => Auth::id(),
            'property_id' => $property_id
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Added to wishlist'
        ]);
    }

    public function removeFromWishlist(Request $request)
    {
        $property_id = $request->property_id;
        
        Wishlist::where('user_id', Auth::id())
            ->where('property_id', $property_id)
            ->delete();
            
        return response()->json([
            'status' => 'success',
            'message' => 'Removed from wishlist'
        ]);
    }
}