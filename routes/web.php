<?php

use App\Http\Controllers\{
    ProfileController,
    HomeController,
    AdminController,
    ManagerController,
    UserController,
    EquipeController,
    StreamerController,
    RedacteurController,
    PresentationController,
    ShopController,
    OrderController,
    PaymentController,
    ContactController,
    RejoindController,
    PalmaresController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/equipe', [EquipeController::class, 'show'])->name('equipe');
Route::get('/streamers', [StreamerController::class, 'index'])->name('streamers');
Route::get('/presentation', [PresentationController::class, 'index']);
Route::get('/palmares', [PalmaresController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/rejoind', [HomeController::class, 'showRejoindPage'])->name('rejoind');
Route::post('/user/become-member', [UserController::class, 'becomeMember'])->name('user.become-member');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Order and payment routes
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('/order/{order}/pay', [OrderController::class, 'pay'])->name('order.pay');
Route::get('/payment/status', [PaymentController::class, 'status'])->name('payment.status');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard-route', [UserController::class, 'redirectToDashboard'])->name('dashboard.route');

    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/profile/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::delete('/profile/destroy', [UserController::class, 'destroy'])->name('user.profile.destroy');

    // User routes
    Route::middleware(['checkrole:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders');
        Route::get('/user/membership', [UserController::class, 'membership'])->name('user.membership'); // Ici, modifiez le chemin de la route pour qu'il corresponde à la méthode du contrôleur
        Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile'); // Ici, modifiez le chemin de la route pour qu'il corresponde à la méthode du contrôleur
    });
    // Manager routes
    Route::middleware(['checkrole:manager'])->group(function () {
        Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
    });

    // Redacteur routes
    Route::middleware(['checkrole:redacteur'])->group(function () {
        Route::get('/redacteur/dashboard', [RedacteurController::class, 'dashboard'])->name('redacteur.dashboard');
    });
});

// Admin routes
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User routes
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users.list');
    Route::get('/admin/users/index', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('/admin/users/{id}/send-password-reset-email', [AdminController::class, 'sendPasswordResetEmail'])->name('admin.users.send_password_reset_email');

    // Streamer routes
    Route::get('/admin/streamers', [AdminController::class, 'listStreamers'])->name('admin.streamers.list');
    Route::get('/admin/streamers/index', [AdminController::class, 'streamers'])->name('admin.streamers.index');
    Route::get('/admin/streamers/create', [AdminController::class, 'createStreamer'])->name('admin.streamers.create');
    Route::post('/admin/streamers', [AdminController::class, 'storeStreamer'])->name('admin.streamers.store');
    Route::get('/admin/streamers/{id}/edit', [AdminController::class, 'editStreamer'])->name('admin.streamers.edit');
    Route::put('/admin/streamers/{id}', [AdminController::class, 'updateStreamer'])->name('admin.streamers.update');
    Route::delete('/admin/streamers/{id}', [AdminController::class, 'destroyStreamer'])->name('admin.streamers.destroy');

    // Team routes
    Route::get('/admin/teams', [AdminController::class, 'listTeams'])->name('admin.teams.list');
    Route::get('/admin/teams/index', [AdminController::class, 'teams'])->name('admin.teams.index');
    Route::get('/admin/teams/create', [AdminController::class, 'createTeam'])->name('admin.teams.create');
    Route::post('/admin/teams', [AdminController::class, 'storeTeam'])->name('admin.teams.store');
    Route::get('/admin/teams/{id}/edit', [AdminController::class, 'editTeam'])->name('admin.teams.edit');
    Route::put('/admin/teams/{id}', [AdminController::class, 'updateTeam'])->name('admin.teams.update');
    Route::delete('/admin/teams/{id}', [AdminController::class, 'deleteTeam'])->name('admin.teams.delete');

    //order routes
    Route::get('/admin/orders', [AdminController::class, 'listOrders'])->name('admin.orders.list');
    Route::get('/admin/orders/create', [AdminController::class, 'createOrder'])->name('admin.orders.create');
    Route::post('/admin/orders', [AdminController::class, 'storeOrder'])->name('admin.orders.store');
    Route::get('/admin/orders/{id}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
    Route::get('/admin/orders/{id}/edit', [AdminController::class, 'editOrder'])->name('admin.orders.edit');
    Route::put('/admin/orders/{id}', [AdminController::class, 'updateOrder'])->name('admin.orders.update');
    Route::delete('/admin/orders/{id}', [AdminController::class, 'deleteOrder'])->name('admin.orders.delete');

    // Carousel routes
    Route::get('/admin/carousel', [AdminController::class, 'listCarousel'])->name('admin.carousel.list');
    Route::post('/admin/carousel/add-member', [AdminController::class, 'addMember'])->name('admin.carousel.add_member');
    Route::delete('/admin/carousel/{id}/delete-member', [AdminController::class, 'deleteMember'])->name('admin.carousel.delete_member');

});

require __DIR__ . '/auth.php';
