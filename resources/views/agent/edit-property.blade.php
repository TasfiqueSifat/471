<div class="edit-property-container" style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2>Edit Property</h2>
    
    <form action="{{ route('agent.property.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label for="property_name">Property Name</label>
            <input type="text" id="property_name" name="property_name" value="{{ $property->property_name }}" 
                required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ $property->address }}" 
                required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div class="form-group">
            <label for="property_type">Property Type</label>
            <select class="form-control" id="property_type" name="property_type" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="residential" {{ $property->property_type == 'residential' ? 'selected' : '' }}>Residential</option>
                <option value="commercial" {{ $property->property_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sale_or_rent">For Sale or Rent</label>
            <select class="form-control" id="sale_or_rent" name="sale_or_rent" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="sale" {{ $property->sale_or_rent == 'sale' ? 'selected' : '' }}>For Sale</option>
                <option value="rent" {{ $property->sale_or_rent == 'rent' ? 'selected' : '' }}>For Rent</option>
            </select>
        </div>
        
        <div style="margin-bottom: 15px; display: flex; gap: 15px;">
            <div style="flex: 1;">
                <label for="bedroom">Bedrooms</label>
                <input type="number" id="bedroom" name="bedroom" value="{{ $property->bedroom }}" 
                    required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="flex: 1;">
                <label for="bathroom">Bathrooms</label>
                <input type="number" id="bathroom" name="bathroom" value="{{ $property->bathroom }}" 
                    required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
        </div>
        
        <div style="margin-bottom: 15px; display: flex; gap: 15px;">
            <div style="flex: 1;">
                <label for="price">Price ($)</label>
                <input type="number" id="price" name="price" value="{{ $property->price }}" step="0.01" 
                    required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="flex: 1;">
                <label for="status">Status</label>
                <select id="status" name="status" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="pending" {{ $property->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $property->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $property->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="other_details">Other Details</label>
            <textarea id="other_details" name="other_details" rows="4" 
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">{{ $property->other_details }}</textarea>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="property_image">Property Image</label>
            @if($property->image_path)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $property->image_path) }}" alt="Current property image" 
                        style="max-width: 100%; max-height: 200px; border-radius: 4px;">
                    <p style="margin-top: 5px; color: #6c757d;">Current image</p>
                </div>
            @endif
            <input type="file" id="property_image" name="property_image" accept="image/*"
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        
        <div>
            <button type="submit" style="background-color: #6c0909; color: rgb(127, 17, 17); border: none; 
                padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                Update Property
            </button>
            <a href="{{ route('agent.dashboard') }}" style="text-decoration: none; color: #6c757d; 
                padding: 10px 20px; margin-left: 10px;">
                Cancel
            </a>
        </div>
    </form>
</div>