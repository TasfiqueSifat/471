<?php

use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\InquiryController;
//Fabiha's part
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgentRegisterController;

//Fabiha's part


Route::get('/', function () {
    return view('welcome');
});
//Fabiha's part
Route::get('/agent/register', [AgentRegisterController::class, 'showForm'])->name('agent.register');
Route::post('/agent/register', [AgentRegisterController::class, 'register']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
    Route::post('/agent/property/store', [AgentController::class, 'storeProperty'])->name('agent.property.store');
    
    Route::get('/agent/property/edit/{id}', [AgentController::class, 'editProperty'])->name('agent.property.edit');
    Route::post('/agent/property/update/{id}', [AgentController::class, 'updateProperty'])->name('agent.property.update');
    Route::get('/agent/property/delete/{id}', [AgentController::class, 'deleteProperty'])->name('agent.property.delete');
    Route::get('/property/details/{id}', [PropertyController::class, 'details'])->name('property.details');
    Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
    Route::get('/agent/inquiries', [InquiryController::class, 'agentInquiries'])->name('agent.inquiries');
    Route::get('/inquiry/mark-read/{id}', [InquiryController::class, 'markAsRead'])->name('inquiry.mark-read');
    Route::get('/inquiry/delete/{id}', [InquiryController::class, 'delete'])->name('inquiry.delete');

    
});






Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
});

Route::get('/dashboard', [AgentController::class, 'marketplace'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Add these routes inside your auth middleware group
Route::middleware(['auth'])->group(function () {
    // Review routes
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/property/{id}/reviews', [ReviewController::class, 'showPropertyReviews'])->name('property.reviews');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});