<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentProperty;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Inquiry;

class AgentController extends Controller
{
    public function dashboard()
    {
        Log::info('User authenticated as: ' . Auth::user()->username);
        $properties = AgentProperty::where('username', Auth::user()->username)->get();
        
        // Get unread inquiries count
        $unreadInquiriesCount = Inquiry::where('receiver_username', Auth::user()->username)
            ->where('read', false)
            ->count();
            
        Log::info('Properties found: ' . $properties->count());
        return view('agent.dashboard', compact('properties', 'unreadInquiriesCount'));
    }
    public function propertyDetails($id)
        {
        
            $property = AgentProperty::findOrFail($id);
            
            return view('property.details', compact('property'));
        }
    public function marketplace()
        {
            $properties = AgentProperty::where('username', '!=', Auth::user()->username)
                        ->where('status', 'approved')
                        ->get();
            return view('dashboard', compact('properties'));
        }
    public function storeProperty(Request $request)
    {
    try {
        $request->validate([
            'property_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bedroom' => 'required|integer|min:0',
            'bathroom' => 'required|integer|min:0',
            'other_details' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'property_type' => 'required|string|in:residential,commercial',
            'sale_or_rent' => 'required|string|in:sale,rent',
            'property_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        
        Log::info('Validation passed for property');
        
        $imagePath = null;
        if ($request->hasFile('property_image')) {
            $imagePath = $request->file('property_image')->store('property_images', 'public');
            Log::info('Image saved at: ' . $imagePath);
        }
        
        $property = AgentProperty::create([
            'username' => Auth::user()->username,
            'property_name' => $request->property_name,
            'address' => $request->address,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'other_details' => $request->other_details,
            'price' => $request->price,
            'status' => $request->status ?? 'pending',
            'property_type' => $request->property_type,
            'sale_or_rent' => $request->sale_or_rent,
            'image_path' => $imagePath,
        ]);
        
        Log::info('Property created with ID: ' . $property->id);
        
        return redirect()->route('agent.dashboard')->with('success', 'Property added successfully!');
    } catch (\Exception $e) {
        Log::error('Error creating property: ' . $e->getMessage());
        return redirect()->route('agent.dashboard')->with('error', 'Error adding property: ' . $e->getMessage());
    }
}
    public function editProperty($id)
    {
        $property = AgentProperty::where('id', $id)
            ->where('username', Auth::user()->username)
            ->firstOrFail();
        
        return view('agent.edit-property', compact('property'));
    }



public function updateProperty(Request $request, $id)
{
    $property = AgentProperty::where('id', $id)
        ->where('username', Auth::user()->username)
        ->firstOrFail();
        
    $request->validate([
        'property_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'bedroom' => 'required|integer|min:0',
        'bathroom' => 'required|integer|min:0',
        'other_details' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'status' => 'required|string|max:255',
        'property_type' => 'required|string|in:residential,commercial',
        'sale_or_rent' => 'required|string|in:sale,rent',
        'property_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
    $updateData = [
        'property_name' => $request->property_name,
        'address' => $request->address,
        'bedroom' => $request->bedroom,
        'bathroom' => $request->bathroom,
        'other_details' => $request->other_details,
        'price' => $request->price,
        'status' => $request->status,
        'property_type' => $request->property_type,
        'sale_or_rent' => $request->sale_or_rent,
    ];
    
    if ($request->hasFile('property_image')) {
        if ($property->image_path && Storage::disk('public')->exists($property->image_path)) {
            Storage::disk('public')->delete($property->image_path);
        }
        
        $updateData['image_path'] = $request->file('property_image')->store('property_images', 'public');
    }
    
    $property->update($updateData);
    
    return redirect()->route('agent.dashboard')->with('success', 'Property updated successfully!');
}

    public function deleteProperty($id)
    {
        $property = AgentProperty::where('id', $id)
            ->where('username', Auth::user()->username)
            ->firstOrFail();
            
        $property->delete();
        
        return redirect()->route('agent.dashboard')->with('success', 'Property deleted successfully!');
    }
}