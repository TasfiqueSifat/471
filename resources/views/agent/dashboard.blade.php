<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agent Dashboard') }}
        </h2>
    </x-slot>
    
    <style>
        .filter-container {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
        }

        .filter-group {
            flex: 1;
            min-width: 120px;
        }

        .filter-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .filter-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .filter-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .filter-btn {
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }

        .filter-btn-apply {
            background-color: #28a745;
            color: white;
        }

        .filter-btn-reset {
            background-color: #6c757d;
            color: white;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
        .dashboard-header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .add-property-btn {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
            float: right;
            cursor: pointer;
        }
        .add-property-btn:hover {
            background-color: #0056b3;
        }
        .empty-message {
            text-align: center;
            margin-top: 60px;
            color: #777;
            font-size: 14px;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            width: 80%;
            max-width: 600px;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .form-actions {
            text-align: right;
            margin-top: 20px;
        }
        
        .btn-submit {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .inq-button{
            background-color: #007BFF;
        }
    </style>
    
   <div class="dashboard-container">
        <div class="dashboard-header">
            Agent Dashboard
            <a id="openModalBtn" class="add-property-btn">+ Add Property</a>
        </div>
        
        <div class="filter-container">
            <h4 style="margin-top: 0; margin-bottom: 15px;">Filter Properties</h4>
            <div class="filter-row">
                <div class="filter-group">
                    <label class="filter-label" for="filter-bedrooms">Bedrooms</label>
                    <select class="filter-control" id="filter-bedrooms">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                        <option value="5">5+</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label" for="filter-bathrooms">Bathrooms</label>
                    <select class="filter-control" id="filter-bathrooms">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label" for="filter-price-min">Min Price (৳)</label>
                    <input type="number" class="filter-control" id="filter-price-min" placeholder="Min Price">
                </div>
                <div class="filter-group">
                    <label class="filter-label" for="filter-price-max">Max Price (৳)</label>
                    <input type="number" class="filter-control" id="filter-price-max" placeholder="Max Price">
                </div>
            </div>
            <div class="filter-buttons">
                <button class="filter-btn filter-btn-reset" id="reset-filters">Reset</button>
                <button class="filter-btn filter-btn-apply" id="apply-filters">Apply Filters</button>
            </div>
            
        </div>
        <div class="my-4">
            <a href="{{ route('agent.inquiries') }}" class="inq-button inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                View Inquiries
                @if($unreadInquiriesCount > 0)
                    <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                        {{ $unreadInquiriesCount }}
                    </span>
                @endif
            </a>
        </div>
        
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px;">
                {{ session('success') }}
            </div>
        @endif
        
        @if($properties->count() > 0)
            <div class="property-grid" id="property-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                @foreach($properties as $property)
                    <div class="property-card" data-bedrooms="{{ $property->bedroom }}" data-bathrooms="{{ $property->bathroom }}" data-price="{{ $property->price }}" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <div class="property-image" style="height: 200px; overflow: hidden; position: relative;">
                            @if($property->image_path)
                                <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->property_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 100%; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                    <span style="color: #adb5bd;">No Image</span>
                                </div>
                            @endif
                            <div class="property-status" style="position: absolute; top: 10px; right: 10px; padding: 5px 10px; border-radius: 4px; font-size: 14px; font-weight: bold; 
                                @if($property->status == 'approved')
                                    background-color: #28a745; color: white;
                                @elseif($property->status == 'rejected')
                                    background-color: #dc3545; color: white;
                                @else
                                    background-color: #ffc107; color: #212529;
                                @endif">
                                {{ ucfirst($property->status) }}
                            </div>
                        </div>
                        <div class="property-details" style="padding: 15px;">
                            <h3 style="margin-top: 0; margin-bottom: 10px;">{{ $property->property_name }}</h3>
                            <p style="font-weight: bold; color: #007bff; font-size: 18px; margin-bottom: 10px;">${{ number_format($property->price, 2) }}</p>
                            <p style="margin-bottom: 5px;"><strong>Address:</strong> {{ $property->address }}</p>
                            <p style="margin-bottom: 5px;"><strong>Bedrooms:</strong> {{ $property->bedroom }} | <strong>Bathrooms:</strong> {{ $property->bathroom }}</p>
                            <p style="margin-bottom: 5px;">
                                <strong>Type:</strong> {{ ucfirst($property->property_type) }} | 
                                <strong>Listing:</strong> For {{ ucfirst($property->sale_or_rent) }}
                            </p>
                            <p style="margin-bottom: 10px;"><strong>Details:</strong> {{ $property->other_details }}</p>
                            <div class="property-actions" style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <a href="{{ route('agent.property.edit', $property->id) }}" style="text-decoration: none; background-color: #007bff; color: white; padding: 8px 15px; border-radius: 4px; flex: 1; text-align: center; margin-right: 10px;">
                                    Edit
                                </a>
                                <a href="{{ route('property.reviews', $property->id) }}" style="text-decoration: none; background-color: #17a2b8; color: white; padding: 8px 15px; border-radius: 4px; flex: 1; text-align: center; margin-right: 5px;">
                                    Reviews
                                </a>
                                <a href="{{ route('agent.property.delete', $property->id) }}" style="text-decoration: none; background-color: #dc3545; color: white; padding: 8px 15px; border-radius: 4px; flex: 1; text-align: center;"
                                onclick="return confirm('Are you sure you want to delete this property?')">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="no-results" style="display: none; text-align: center; margin-top: 50px; color: #6c757d;">
                <p>No properties found matching your filters.</p>
            </div>
        @else
            <div style="text-align: center; margin-top: 50px; color: #6c757d;">
                <p>No properties found. Add your first property using the button above.</p>
            </div>
        @endif
        @include("exchange-rates")
        
    </div>
    @include('components.footer')
    
    <div id="propertyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Property</h3>
                <span class="close">&times;</span>
            </div>
            
            <form id="propertyForm" action="{{ route('agent.property.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="property_name">Property Name</label>
                    <input type="text" class="form-control" id="property_name" name="property_name" required>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                
                <div class="form-group">
                    <label for="bedroom">Bedrooms</label>
                    <input type="number" class="form-control" id="bedroom" name="bedroom" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="bathroom">Bathrooms</label>
                    <input type="number" class="form-control" id="bathroom" name="bathroom" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="property_type">Property Type</label>
                    <select class="form-control" id="property_type" name="property_type" required>
                        <option value="residential">Residential</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sale_or_rent">For Sale or Rent</label>
                    <select class="form-control" id="sale_or_rent" name="sale_or_rent" required>
                        <option value="sale">For Sale</option>
                        <option value="rent">For Rent</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="property_image">Property Image</label>
                    <input type="file" class="form-control" id="property_image" name="property_image" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label for="other_details">Other Details</label>
                    <textarea class="form-control" id="other_details" name="other_details" rows="3"></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Submit Property</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
     
        var modal = document.getElementById("propertyModal");
        
      
        var btn = document.getElementById("openModalBtn");
        
    
        var span = document.getElementsByClassName("close")[0];
        
     
        btn.onclick = function() {
          modal.style.display = "block";
        }
        

        span.onclick = function() {
          modal.style.display = "none";
        }
        
       
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        
        document.getElementById('apply-filters').addEventListener('click', function() {
            filterProperties();
        });
        
        document.getElementById('reset-filters').addEventListener('click', function() {
            document.getElementById('filter-bedrooms').value = '';
            document.getElementById('filter-bathrooms').value = '';
            document.getElementById('filter-price-min').value = '';
            document.getElementById('filter-price-max').value = '';
            filterProperties();
        });
        
        function filterProperties() {
            const minBedrooms = document.getElementById('filter-bedrooms').value;
            const minBathrooms = document.getElementById('filter-bathrooms').value;
            const minPrice = document.getElementById('filter-price-min').value;
            const maxPrice = document.getElementById('filter-price-max').value;
            
            const propertyCards = document.querySelectorAll('.property-card');
            let visibleCount = 0;
            
            propertyCards.forEach(card => {
                const bedrooms = parseInt(card.getAttribute('data-bedrooms'));
                const bathrooms = parseInt(card.getAttribute('data-bathrooms'));
                const price = parseFloat(card.getAttribute('data-price'));
                let shouldShow = true;
                
                if (minBedrooms && bedrooms < parseInt(minBedrooms)) shouldShow = false;
                if (minBathrooms && bathrooms < parseInt(minBathrooms)) shouldShow = false;
                if (minPrice && price < parseFloat(minPrice)) shouldShow = false;
                if (maxPrice && price > parseFloat(maxPrice)) shouldShow = false;
                
                if (shouldShow) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            const noResults = document.getElementById('no-results');
            if (visibleCount === 0 && propertyCards.length > 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }
    </script>
</x-app-layout>