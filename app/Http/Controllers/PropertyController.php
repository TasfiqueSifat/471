<?php
namespace App\Http\Controllers;
use App\Models\AgentProperty;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function details($id)
    {
        $property = AgentProperty::with('reviews')->findOrFail($id);
        $agent = User::where('username', $property->username)->first();
        
        return view('property.details', compact('property', 'agent'));
    }
    
}