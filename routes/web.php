<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Models\ConnectedAccount;

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

use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    // Note, if they registered with another method that uses the same email, this will automatically
    // bind this GitHub to that account. It assumes nobody else managed to make a GitHub with their email.
    $user = User::updateOrCreate([
        'email' => $githubUser->email,
    ], [
        'name' => $githubUser->name,
        'github_id' => $githubUser->id,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    // Create connected account record for this
    $connectedAccount = ConnectedAccount::updateOrCreate([
        'user_id' => $user->id,
        'provider' => 'github',
        'provider_id' => $githubUser->id,
    ], [
        'token' => $githubUser->token,
        'refresh_token' => $githubUser->refreshToken,
    ]);

    // Insert the record into the connected_accounts table
    // $user->addConnectedAccount([
    //     'provider_name' => 'github',
    //     'provider_id' => $githubUser->id,
    //     'provider_token' => $githubUser->token,
    //     'provider_refresh_token' => $githubUser->refreshToken,
    // ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/test', function () {
    return Inertia::render('Test', [
        
    ]);
});