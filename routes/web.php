<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandeLocationController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Routes Services
Route::get('/services/conciergerie', [ServiceController::class, 'concierge'])->name('services.concierge');
Route::get('/services/nettoyage-professionnel', [ServiceController::class, 'cleaning'])->name('services.cleaning');
Route::get('/services/accueil-personnalise', [ServiceController::class, 'welcome'])->name('services.welcome');

// Routes Features
Route::get('/features/qualite-premium', [FeatureController::class, 'premiumQuality'])->name('features.premium-quality');
Route::get('/features/support-24-7', [FeatureController::class, 'support'])->name('features.support');
Route::get('/features/emplacements-privilegies', [FeatureController::class, 'locations'])->name('features.locations');
Route::get('/features/securite-garantie', [FeatureController::class, 'security'])->name('features.security');

// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
   
    Route::middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::post('/demandes/{id}/accept', [AdminController::class, 'acceptDemande'])->name('admin.demandes.accept');
        Route::post('/demandes/{id}/reject', [AdminController::class, 'rejectDemande'])->name('admin.demandes.reject');
    });
});

Route::get('/demande-location', [DemandeLocationController::class, 'create'])->name('demande-location.create');
Route::post('/demande-location', [DemandeLocationController::class, 'store'])->name('demande-location.store');

// Routes Locataire
Route::get('/locataire/login', [LocataireController::class, 'showLoginForm'])->name('locataire.login.form');
Route::post('/locataire/login', [LocataireController::class, 'login'])->name('locataire.login');

Route::middleware('is_locataire')->group(function () {
    Route::get('/locataire/dashboard', [LocataireController::class, 'dashboard'])->name('locataire.dashboard');
    Route::get('/locataire/statistiques', [LocataireController::class, 'statistiques'])->name('locataire.statistiques');
    Route::get('/locataire/mes-biens/{house}', [LocataireController::class, 'manageHouse'])->name('locataire.house.manage');
    Route::post('/locataire/logout', [LocataireController::class, 'logout'])->name('locataire.logout');
    Route::resource('houses', HouseController::class)->except(['index', 'show'])->middleware('auth');
});

// Routes publiques pour la consultation des biens
Route::get('/nos-biens', [HouseController::class, 'index'])->name('houses.index');
Route::get('/nos-biens/{house}', [HouseController::class, 'show'])->name('houses.show');

// Routes pour les réservations
Route::middleware('auth')->group(function () {
    Route::get('/reservations/create/{house}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/houses/{house}/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/mes-reservations', [ReservationController::class, 'myReservations'])->name('reservations.index');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');
    
    // Routes de paiement
    Route::get('/reservations/{reservation}/payment', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/reservations/{reservation}/payment/create-session', [PaymentController::class, 'createCheckoutSession'])->name('payment.create-session');
    Route::get('/reservations/{reservation}/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/reservations/{reservation}/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});

// Route publique pour vérifier la disponibilité
Route::get('/houses/{house}/check-availability', [ReservationController::class, 'checkAvailability']);

// Webhook Stripe (sans middleware auth car appelé par Stripe)
Route::post('/webhook/stripe', [PaymentController::class, 'webhook'])->name('payment.webhook');