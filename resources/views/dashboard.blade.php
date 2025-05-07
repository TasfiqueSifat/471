<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property Marketplace') }}
        </h2>
    </x-slot>

    <style>
        
        :root {
            --primary-blue: #3b82f6;
            --primary-blue-dark: #2563eb;
            --primary-blue-light: #dbeafe;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --border-radius: 0.5rem;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

    
        .property-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .section {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            margin-bottom: 1.5rem;
        }

        .section-header {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 1.5rem;
        }

        .section-content {
            padding: 1.5rem;
        }

        .filter-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .filter-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .filter-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .filter-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-600);
            margin-bottom: 0.375rem;
        }

        .filter-control {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
            background-color: var(--white);
            transition: all 0.2s ease-in-out;
        }

        .filter-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        .filter-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .btn {
            padding: 0.625rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .btn-secondary {
            background-color: var(--gray-200);
            color: var(--gray-600);
        }

        .btn-secondary:hover {
            background-color: var(--gray-300);
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-blue-dark);
        }

        .property-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .property-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .property-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .property-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .property-image {
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--gray-100);
            color: var(--gray-600);
        }

        .status-badge {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-approved {
            background-color: var(--success);
            color: var(--white);
        }

        .status-pending {
            background-color: var(--warning);
            color: var(--gray-800);
        }

        .status-rejected {
            background-color: var(--danger);
            color: var(--white);
        }

        .property-details {
            padding: 1.25rem;
        }

        .property-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .property-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.75rem;
        }

        .property-tags {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .property-tag {
            padding: 0.25rem 0.5rem;
            background-color: var(--primary-blue-light);
            color: var(--primary-blue-dark);
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .property-features {
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-bottom: 1rem;
        }

        .feature-label {
            font-weight: 500;
        }

        .property-agent {
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-bottom: 1rem;
        }

        .view-btn {
            display: block;
            width: 100%;
            padding: 0.625rem 1rem;
            background-color: var(--primary-blue);
            color: var(--white);
            text-align: center;
            font-weight: 500;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
            text-decoration: none;
        }

        .view-btn:hover {
            background-color: var(--primary-blue-dark);
        }

        .no-results {
            padding: 3rem 0;
            text-align: center;
            color: var(--gray-600);
        }
        .wishlist-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(202, 234, 255, 0.8);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 5;
        }

        .wishlist-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .wishlist-icon {
            stroke: #666;
            fill: none;
            transition: all 0.2s ease;
        }

        .wishlist-btn.active .wishlist-icon {
            fill: #ff6b6b;
            stroke: #ff6b6b;
        }

        .property-image {
            position: relative;
        }

      
        .wishlist-nav-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: var(--primary-blue);
            color: var(--white);
            border-radius: 0.375rem;
            text-decoration: none;
            margin-right: 1rem;
            transition: background-color 0.2s ease-in-out;
        }

        .wishlist-nav-btn:hover {
            background-color: var(--primary-blue-dark);
        }

        .wishlist-nav-btn svg {
            margin-right: 0.5rem;
        }
    </style>

    <div class="py-6">
        <div class="property-container">
            @include("exchange-rates")
            <!-- Filter Container -->
            <div class="section">
                <div class="section-content">
                    <h3 class="section-header">Filter Properties</h3>
                    
                    <div class="filter-container">
                        <!-- Property Type Filter -->
                        <div class="filter-group">
                            <label for="filter-property-type">Property Type</label>
                            <select id="filter-property-type" class="filter-control">
                                <option value="">All Types</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                        
                        <!-- For Sale or Rent Filter -->
                        <div class="filter-group">
                            <label for="filter-sale-rent">Listing Type</label>
                            <select id="filter-sale-rent" class="filter-control">
                                <option value="">All Listings</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                        
                        <!-- Bedrooms Filter -->
                        <div class="filter-group">
                            <label for="filter-bedrooms">Bedrooms</label>
                            <select id="filter-bedrooms" class="filter-control">
                                <option value="">Any</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5+</option>
                            </select>
                        </div>
                        
                        <!-- Price Range Filter -->
                        <div class="filter-group">
                            <label for="filter-price-max">Max Price</label>
                            <input type="number" id="filter-price-max" class="filter-control" placeholder="Max Price">
                        </div>
                    </div>
                    
                    <div class="filter-actions">
                        <button id="reset-filters" class="btn btn-secondary">Reset</button>
                        <button id="apply-filters" class="btn btn-primary">Apply Filters</button>
                    </div>
                </div>
            </div>
            
            <!-- Properties Container -->
            <div class="section">
                <div class="section-content">
                    <h3 class="section-header">Available Properties</h3>
                    <a href="{{ route('wishlist.index') }}" class="wishlist-nav-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        My Wishlist
                    </a>
                    
                    <div id="property-grid" class="property-grid">
                        @foreach($properties as $property)
                            <div class="property-card" 
                                data-property-type="{{ $property->property_type }}"
                                data-sale-rent="{{ $property->sale_or_rent }}"
                                data-bedrooms="{{ $property->bedroom }}"
                                data-price="{{ $property->price }}">
                                
                                <!-- Property Image -->
                                <div class="property-image">
                                    @if($property->image_path)
                                        <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->property_name }}">
                                    @else
                                        <div class="no-image">
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Status Badge -->
                                    <div class="status-badge 
                                        @if($property->status == 'approved')
                                            status-approved
                                        @elseif($property->status == 'rejected')
                                            status-rejected
                                        @else
                                            status-pending
                                        @endif">
                                        {{ ucfirst($property->status) }}
                                    </div>
                                </div>
                                <button class="wishlist-btn" data-property-id="{{ $property->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="wishlist-icon">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                                
                              
                                <div class="property-details">
                                    <h4 class="property-title">{{ $property->property_name }}</h4>
                                    <p class="property-price">৳{{ number_format($property->price, 2) }}</p>
                                    
                                    
                                    <div class="property-tags">
                                        <span class="property-tag">{{ ucfirst($property->property_type) }}</span>
                                        <span class="property-tag">For {{ ucfirst($property->sale_or_rent) }}</span>
                                    </div>
                                    
                                    <!-- Property Features -->
                                    <div class="property-features">
                                        <p><span class="feature-label">Address:</span> {{ $property->address }}</p>
                                        <p><span class="feature-label">Bedrooms:</span> {{ $property->bedroom }} | <span class="feature-label">Bathrooms:</span> {{ $property->bathroom }}</p>
                                    </div>
                                    
                               
                                    <div class="property-agent">
                                        <p><span class="feature-label">Listed by:</span> {{ $property->username }}</p>
                                    </div>
                                  
                                    <a href="{{ route('property.details', $property->id) }}" class="view-btn">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                
                    <div id="no-results" class="hidden no-results">
                        <p>No properties found matching your filters.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const propertyGrid = document.getElementById('property-grid');
            const noResults = document.getElementById('no-results');
            const applyFiltersBtn = document.getElementById('apply-filters');
            const resetFiltersBtn = document.getElementById('reset-filters');
            
            function filterProperties() {
                const propertyType = document.getElementById('filter-property-type').value;
                const saleRent = document.getElementById('filter-sale-rent').value;
                const bedrooms = document.getElementById('filter-bedrooms').value;
                const maxPrice = document.getElementById('filter-price-max').value;
                
                
                const propertyCards = document.querySelectorAll('.property-card');
                let visibleCount = 0;
                
                propertyCards.forEach(card => {
                    let show = true;
                   
                    if (propertyType && card.dataset.propertyType !== propertyType) {
                        show = false;
                    }
                    
                    if (saleRent && card.dataset.saleRent !== saleRent) {
                        show = false;
                    }
                    
                    if (bedrooms && parseInt(card.dataset.bedrooms) < parseInt(bedrooms)) {
                        show = false;
                    }
                    
                    if (maxPrice && parseFloat(card.dataset.price) > parseFloat(maxPrice)) {
                        show = false;

                    }
                   
                    if (show) {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
            
            applyFiltersBtn.addEventListener('click', filterProperties);
            
            resetFiltersBtn.addEventListener('click', function() {
                document.getElementById('filter-property-type').value = '';
                document.getElementById('filter-sale-rent').value = '';
                document.getElementById('filter-bedrooms').value = '';
                document.getElementById('filter-price-max').value = '';
                
                document.querySelectorAll('.property-card').forEach(card => {
                    card.classList.remove('hidden');
                });
                
                noResults.classList.add('hidden');
            });
        });
        const wishlistButtons = document.querySelectorAll('.wishlist-btn');
    
    checkWishlistStatus();
    
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const propertyId = this.getAttribute('data-property-id');
            
            if (this.classList.contains('active')) {
                // Remove from wishlist
                removeFromWishlist(propertyId, this);
            } else {
                // Add to wishlist
                addToWishlist(propertyId, this);
            }
        });
    });
    
    function addToWishlist(propertyId, button) {
        fetch('{{ route("wishlist.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                property_id: propertyId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                button.classList.add('active');
                showNotification(data.message);
            } else {
                showNotification(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    function removeFromWishlist(propertyId, button) {
        fetch('{{ route("wishlist.remove") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                property_id: propertyId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                button.classList.remove('active');
                showNotification(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    function checkWishlistStatus() {
        fetch('{{ route("wishlist.index") }}', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const wishlistPropertyIds = data.wishlistItems.map(item => item.property_id);
            
            wishlistButtons.forEach(button => {
                const propertyId = button.getAttribute('data-property-id');
                if (wishlistPropertyIds.includes(parseInt(propertyId))) {
                    button.classList.add('active');
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    function showNotification(message) {
        alert(message);
    }
    </script>
</x-app-layout>