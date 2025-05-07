<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\AgentProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:agent_properties,id',
            'message' => 'required|string|max:500',
        ]);
        
       
        $property = AgentProperty::findOrFail($request->property_id);
 
        $inquiry = Inquiry::create([
            'sender_username' => Auth::user()->username,
            'receiver_username' => $property->username,
            'property_id' => $request->property_id,
            'message' => $request->message,
            'read' => false
        ]);
        
        Log::info('Inquiry created with ID: ' . $inquiry->id);
        
        return redirect()->back()->with('success', 'Your inquiry has been sent to the agent!');
    }
    
  
    public function agentInquiries()
    {
        $inquiries = Inquiry::with('property')
            ->where('receiver_username', Auth::user()->username)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('agent.inquiries', compact('inquiries'));
    }
 
    public function markAsRead($id)
    {
        $inquiry = Inquiry::where('id', $id)
            ->where('receiver_username', Auth::user()->username)
            ->firstOrFail();
            
        $inquiry->update(['read' => true]);
        
        return redirect()->back()->with('success', 'Inquiry marked as read');
    }
    
 
    public function delete($id)
    {
        $inquiry = Inquiry::where('id', $id)
            ->where('receiver_username', Auth::user()->username)
            ->firstOrFail();
            
        $inquiry->delete();
        
        return redirect()->back()->with('success', 'Inquiry deleted successfully');
    }
}