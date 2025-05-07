<x-app-layout>
    <style>
       
        .header-title {
            font-weight: 600;
            font-size: 1.25rem;
            color: #333333;
            line-height: 1.5;
        }

      
        .py-container {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .content-container {
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        .main-card {
            background-color: #ffffff;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            border-top: 4px solid #1656b6;
        }
        .card-padding {
            padding: 1.5rem;
        }

     
        .flex-col {
            display: flex;
            flex-direction: column;
        }
        .prop-image-container {
            margin-bottom: 1.5rem;
        }
        .prop-info-container {
            width: 100%;
        }
        
     
        .property-image {
            width: 100%;
            height: auto;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 4px solid #ffffff;
        }
        .no-image-placeholder {
            width: 100%;
            height: 16rem;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e5e5;
        }
        .no-image-text {
            color: #666666;
        }

        .property-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #222222;
        }
        .property-price {
            color: #1555b4;
            font-weight: 700;
            font-size: 1.875rem;
            margin-top: 0.5rem;
        }
        .tag-container {
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
        }
        .tag {
            padding: 0.25rem 0.75rem;
            background-color: #f5f5f5;
            color: #333333;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 9999px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .tag-spacer {
            margin-left: 0.75rem;
        }
        
       
        .agent-info {
            margin-top: 1rem;
            color: #333333;
            background-color: #f5f5f5;
            padding: 1rem;
            border-radius: 0.5rem;
            border-left: 4px solid #005ed8;
        }
        .agent-title {
            font-weight: 600;
            color: #222222;
            margin-bottom: 0.5rem;
        }
        .agent-detail {
            margin-bottom: 0.25rem;
        }
        .agent-label {
            font-weight: 500;
            color: #444444;
        }
        
        
        .address-container {
            margin-top: 1rem;
        }
        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #333333;
        }
        .address-box {
            color: #333333;
            background-color: #f5f5f5;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border-left: 4px solid #005fcc;
            margin-top: 0.5rem;
        }
        
    
        .features-section {
            margin-top: 2rem;
        }
        .section-title-border {
            font-size: 1.125rem;
            font-weight: 600;
            color: #333333;
            border-bottom: 2px solid #cccccc;
            padding-bottom: 0.5rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }
        .feature-box {
            background-color: #f5f5f5;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e5e5;
        }
        .feature-label {
            display: block;
            font-weight: 600;
            color: #333333;
        }
        .feature-value {
            font-size: 1.5rem;
            color: #444444;
        }
        .feature-value-text {
            font-size: 1.25rem;
            color: #444444;
        }
        
     
        .description-section {
            margin-top: 2rem;
        }
        .description-box {
            background-color: #f5f5f5;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e5e5;
        }
        .description-text {
            color: #333333;
        }
        
       
        .button-container {
            margin-top: 2rem;
            display: flex;
        }
        .back-button {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #0065fc;
            color: #ffffff;
            font-weight: 500;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .back-button:hover {
            background-color: #222222;
            transform: translateY(-2px);
        }
        .button-icon {
            height: 1.25rem;
            width: 1.25rem;
            margin-right: 0.5rem;
        }
        
        
        @media (min-width: 768px) {
            .flex-col {
                flex-direction: row;
            }
            .prop-image-container {
                width: 50%;
                margin-bottom: 0;
                padding-right: 1.5rem;
            }
            .prop-info-container {
                width: 50%;
            }
            .features-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        .reviews-section {
            margin-top: 2rem;
            padding-top: 1rem;
        }

        .reviews-container {
            margin-bottom: 2rem;
        }

        .review-box {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid #4a7aff;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .review-username {
            font-weight: bold;
            color: #333;
        }

        .review-date {
            color: #777;
            font-size: 0.9rem;
        }

        .review-text {
            line-height: 1.5;
        }

        .no-reviews {
            color: #777;
            font-style: italic;
        }

        .add-review-title {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .review-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .submit-review-btn {
            background-color: #4a7aff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .submit-review-btn:hover {
            background-color: #3867e0;
        }
        .inquiry-section {
        margin-top: 2rem;
        padding-top: 1rem;
    }
    
    .inquiry-container {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 1.5rem;
        margin-top: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e5e5e5;
    }
    
    .inquiry-form {
        width: 100%;
    }
    
    .alert {
        padding: 0.75rem 1.25rem;
        border-radius: 0.25rem;
    }
    
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    
    .my-3 {
        margin-top: 0.75rem;
        margin-bottom: 0.75rem;
    }
    </style>

    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Property Details') }}
        </h2>
    </x-slot>

    <div class="py-container">
        <div class="content-container">
            <div class="main-card">
                <div class="card-padding">
                    
                    <div class="flex-col">
                       
                        <div class="prop-image-container">
                            @if($property->image_path)
                                <img src="{{ asset('storage/' . $property->image_path) }}" 
                                     alt="{{ $property->property_name }}" 
                                     class="property-image">
                            @else
                                <div class="no-image-placeholder">
                                    <span class="no-image-text">No Image Available</span>
                                </div>
                            @endif
                        </div>
                        
                        
                        <div class="prop-info-container">
                            <h1 class="property-title">{{ $property->property_name }}</h1>
                            <p class="property-price">${{ number_format($property->price, 2) }}</p>
                            
                            
                            <div class="tag-container">
                                <span class="tag">{{ ucfirst($property->property_type) }}</span>
                                <span class="tag tag-spacer">For {{ ucfirst($property->sale_or_rent) }}</span>
                            </div>
                            
                           
                            <div class="agent-info">
                                <h3 class="agent-title">Agent Information</h3>
                                <p class="agent-detail"><span class="agent-label">Name:</span> {{ $agent->name }}</p>
                                <p class="agent-detail"><span class="agent-label">Username:</span> {{ $agent->username }}</p>
                                <p class="agent-detail"><span class="agent-label">Email:</span> {{ $agent->email }}</p>
                            </div>
                            
                          
                            <div class="address-container">
                                <h2 class="section-title">Address</h2>
                                <p class="address-box">{{ $property->address }}</p>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="features-section">
                        <h2 class="section-title-border">Property Features</h2>
                        
                        <div class="features-grid">
                            <div class="feature-box">
                                <span class="feature-label">Bedrooms</span>
                                <span class="feature-value">{{ $property->bedroom }}</span>
                            </div>
                            
                            <div class="feature-box">
                                <span class="feature-label">Bathrooms</span>
                                <span class="feature-value">{{ $property->bathroom }}</span>
                            </div>
                            
                            <div class="feature-box">
                                <span class="feature-label">Property Type</span>
                                <span class="feature-value-text">{{ ucfirst($property->property_type) }}</span>
                            </div>
                            
                            <div class="feature-box">
                                <span class="feature-label">For</span>
                                <span class="feature-value-text">{{ ucfirst($property->sale_or_rent) }}</span>
                            </div>
                        </div>
                        
                        
                        <div class="description-section">
                            <h2 class="section-title-border">Description</h2>
                            <div class="description-box">
                                <p class="description-text">{{ $property->other_details ?? 'No additional details provided.' }}</p>
                            </div>
                        </div>
                        
                        
                        <div class="button-container">
                            <a href="{{ route('dashboard') }}" class="back-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="button-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Properties
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reviews-section">
    <h2 class="section-title-border">Reviews</h2>

    <div class="reviews-container">
        @if($property->reviews && $property->reviews->count() > 0)
            @foreach($property->reviews as $review)
                <div class="review-box">
                    <div class="review-header">
                        <span class="review-username">{{ $review->username }}</span>
                        <span class="review-date">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="review-text">
                        {{ $review->review_text }}
                    </div>
                </div>
            @endforeach
        @else
            <p class="no-reviews">No reviews yet for this property.</p>
        @endif
    </div>
    
   
    <div class="add-review-container">
        <h3 class="add-review-title">Add Your Review</h3>
        <form action="{{ route('review.store') }}" method="POST" class="review-form">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <div class="form-group">
                <label for="review_text">Your Review:</label>
                <textarea id="review_text" name="review_text" rows="4" class="review-textarea" required></textarea>
            </div>
            <button type="submit" class="submit-review-btn">Submit Review</button>
        </form>
        </div>
    </div>
    <div class="inquiry-section">
    <h2 class="section-title-border">Send an Inquiry to the Agent</h2>

    @if(session('success'))
        <div class="alert alert-success my-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="inquiry-container">
        <form action="{{ route('inquiry.store') }}" method="POST" class="inquiry-form">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" class="review-textarea" required 
                    placeholder="Please provide your phone number with the inquiry..."></textarea>
            </div>
            <button type="submit" class="submit-review-btn">Send Inquiry</button>
        </form>
    </div>
</div>
    </div>
    


    </div>
    
    @include('components.footer')
</x-app-layout>