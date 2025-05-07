<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('My Wishlist') }}
        </h2>
    </x-slot>
    <style>
    body {
        background-color: #f0f6ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header-title {
        font-size: 24px;
        font-weight: bold;
        color: #1e3a8a; /* Deep blue */
    }

    .property-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .section {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 50, 0.05);
    }

    .section-header {
        font-size: 20px;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 1.5rem;
    }

    .wishlist-header .back-button {
        display: flex;
        align-items: center;
        color: #2563eb;
        text-decoration: none;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .wishlist-header .back-button svg {
        margin-right: 0.5rem;
    }

    .property-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .property-card {
        background-color: #ffffff;
        border: 1px solid #dbeafe;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s ease-in-out;
    }

    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(30, 64, 175, 0.1);
    }

    .property-image {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        background-color: #e0f2fe;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e3a8a;
        font-weight: 500;
    }

    .status-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        color: #fff;
    }

    .status-approved {
        background-color: #22c55e;
    }

    .status-rejected {
        background-color: #ef4444;
    }

    .status-pending {
        background-color: #f59e0b;
    }

    .wishlist-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #e0f2fe;
        border: none;
        border-radius: 50%;
        padding: 6px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .wishlist-btn:hover {
        background-color: #bfdbfe;
    }

    .wishlist-btn .wishlist-icon {
        color: #2563eb;
    }

    .property-details {
        padding: 1rem;
    }

    .property-title {
        font-size: 18px;
        font-weight: 600;
        color: #1e3a8a;
        margin-bottom: 0.25rem;
    }

    .property-price {
        font-size: 16px;
        font-weight: bold;
        color: #2563eb;
        margin-bottom: 0.75rem;
    }

    .property-tags {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .property-tag {
        background-color: #eff6ff;
        color: #1e40af;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 500;
    }

    .property-features p,
    .property-agent p {
        font-size: 14px;
        color: #374151;
        margin: 0.25rem 0;
    }

    .feature-label {
        font-weight: 600;
        color: #1e40af;
    }

    .view-btn {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        color: white;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .view-btn:hover {
        background-color: #2563eb;
    }

    .no-results {
        text-align: center;
        padding: 2rem 0;
    }

    .no-results p {
        font-size: 16px;
        color: #475569;
    }

    .btn-primary {
        background-color: #3b82f6;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #2563eb;
    }

    @media (max-width: 640px) {
        .property-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


    <div class="py-6">
        <div class="property-container">
            <div class="section">
                <div class="section-content">
                    <h3 class="section-header">My Wishlist Properties</h3>
                    
                    <div class="wishlist-header">
                        <a href="{{ route('dashboard') }}" class="back-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H5M12 19l-7-7 7-7"></path>
                            </svg>
                            Back to Properties
                        </a>
                    </div>
                    
                    @if($wishlistItems->count() > 0)
                        <div id="property-grid" class="property-grid">
                            @foreach($wishlistItems as $item)
                                <div class="property-card">
                                    <!-- Property Image -->
                                    <div class="property-image">
                                        @if($item->property->image_path)
                                            <img src="{{ asset('storage/' . $item->property->image_path) }}" alt="{{ $item->property->property_name }}">
                                        @else
                                            <div class="no-image">
                                                <span>No Image</span>
                                            </div>
                                        @endif
                                        
                                        <!-- Status Badge -->
                                        <div class="status-badge 
                                            @if($item->property->status == 'approved')
                                                status-approved
                                            @elseif($item->property->status == 'rejected')
                                                status-rejected
                                            @else
                                                status-pending
                                            @endif">
                                            {{ ucfirst($item->property->status) }}
                                        </div>
                                        
                                        <!-- Remove from Wishlist Button -->
                                        <button class="wishlist-btn active" data-property-id="{{ $item->property->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="wishlist-icon">
                                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="property-details">
                                        <h4 class="property-title">{{ $item->property->property_name }}</h4>
                                        <p class="property-price">${{ number_format($item->property->price, 2) }}</p>
                                        
                                        <div class="property-tags">
                                            <span class="property-tag">{{ ucfirst($item->property->property_type) }}</span>
                                            <span class="property-tag">For {{ ucfirst($item->property->sale_or_rent) }}</span>
                                        </div>
                                        
                                        <!-- Property Features -->
                                        <div class="property-features">
                                            <p><span class="feature-label">Address:</span> {{ $item->property->address }}</p>
                                            <p><span class="feature-label">Bedrooms:</span> {{ $item->property->bedroom }} | <span class="feature-label">Bathrooms:</span> {{ $item->property->bathroom }}</p>
                                        </div>
                                        
                                        <!-- Agent Info -->
                                        <div class="property-agent">
                                            <p><span class="feature-label">Listed by:</span> {{ $item->property->username }}</p>
                                        </div>
                                        
                                        <!-- Action Button -->
                                        <a href="{{ route('property.details', $item->property->id) }}" class="view-btn">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-results">
                            <p style="margin-bottom: 20px">You don't have any properties in your wishlist.</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Browse Properties</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wishlist functionality
            const wishlistButtons = document.querySelectorAll('.wishlist-btn');
            
            wishlistButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const propertyId = this.getAttribute('data-property-id');
                    const propertyCard = this.closest('.property-card');
                    
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
                            // Remove the property card from the grid
                            propertyCard.remove();
                            
                            // Check if there are any properties left
                            const propertyCards = document.querySelectorAll('.property-card');
                            if (propertyCards.length === 0) {
                                // Show the no results message
                                const propertyGrid = document.getElementById('property-grid');
                                propertyGrid.innerHTML = `
                                    <div class="no-results">
                                        <p>You don't have any properties in your wishlist.</p>
                                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Browse Properties</a>
                                    </div>
                                `;
                            }
                            
                            // Show notification
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    </script>
</x-app-layout>