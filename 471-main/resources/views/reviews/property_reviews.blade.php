<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Property Reviews') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="content-container">
            <div class="main-card">
                <div class="card-padding">
                    <div class="property-header">
                        <h1>Reviews for: {{ $property->property_name }}</h1>
                        <a href="{{ route('agent.dashboard') }}" class="back-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H5M12 19l-7-7 7-7"></path>
                            </svg>
                            Back to Dashboard
                        </a>
                    </div>
                    
                    <div class="property-summary">
                        <p><strong>Address:</strong> {{ $property->address }}</p>
                        <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                    </div>
                    
                    <div class="reviews-list">
                        <h2>All Reviews</h2>
                        
                        @if($reviews->count() > 0)
                            @foreach($reviews as $review)
                                <div class="review-item">
                                    <div class="review-header">
                                        <span class="review-author">{{ $review->username }}</span>
                                        <span class="review-date">{{ $review->created_at->format('M d, Y - h:i A') }}</span>
                                    </div>
                                    <div class="review-content">
                                        {{ $review->review_text }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-reviews">
                                <p>No reviews have been submitted for this property yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .main-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .card-padding {
            padding: 20px;
        }
        
        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .property-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }
        
        .back-button {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            background-color: #3188eb;
            border-radius: 4px;
            color: #ffffff;
            text-decoration: none;
        }
        
        .back-button svg {
            margin-right: 8px;
        }
        
        .property-summary {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .property-summary p {
            margin: 5px 0;
        }
        
        .reviews-list h2 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }
        
        .review-item {
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .review-author {
            font-weight: bold;
        }
        
        .review-date {
            color: #777;
            font-size: 0.9rem;
        }
        
        .review-content {
            line-height: 1.6;
        }
        
        .no-reviews {
            text-align: center;
            padding: 30px;
            color: #777;
            background-color: #f9f9f9;
            border-radius: 6px;
        }
    </style>
</x-app-layout>