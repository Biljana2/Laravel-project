<?php 

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCommentsController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PurchasedTicketsController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AdminCommentController;
use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;




Route::get('/',  [EventController::class, 'index']);
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/getTownsByCategory/{category}', [EventController::class, 'getTownsByCategory']);

Route::get('categories/{category:slug}', function (Category $category) {
    $events = $category->events()->paginate(7);

    return view('events', [
        'events' => $events,
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
});
Route::get('events/{event:slug}', [EventController::class, 'showEvents']);
Route::post('events/{event:slug}/comments', [ EventCommentsController::class, "store"]);

Route::get('/buy/{event_id}', [TicketController::class, 'showTickets'])->name('buy');
Route::post('purchaseTickets', [PurchasedTicketsController::class, 'store'])->name('purchaseTickets');






Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/events', [AdminEventController::class, 'index'])->name('admin.events.index');

    Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');

    Route::post('/admin/events', [AdminEventController::class, 'store'])->name('admin.events.store');

Route::get('/admin/events/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');

    Route::patch('/admin/events/{event}', [AdminEventController::class, 'update'])->name('admin.events.update');

    Route::delete('/admin/events/{event}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');


     Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');

         Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');

    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');

Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');

    Route::patch('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');

      Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

      Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');

         Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');

    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');

    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');

      Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');


      Route::get('/admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');

         Route::get('/admin/tickets/create', [AdminTicketController::class, 'create'])->name('admin.tickets.create');

    Route::post('/admin/tickets', [AdminTicketController::class, 'store'])->name('admin.tickets.store');

Route::get('/admin/tickets/{ticket}/edit', [AdminTicketController::class, 'edit'])->name('admin.tickets.edit');

    Route::patch('/admin/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('admin.tickets.update');

      Route::delete('/admin/tickets/{ticket}', [AdminTicketController::class, 'destroy'])->name('admin.tickets.destroy');


      Route::get('/admin/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');

     

      Route::delete('/admin/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');
});







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


