<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () { return redirect('/admin/home'); });

Route::get('/', 'Guest\EventsController@index')->name('guest.home');

Route::post('/764554', function () {
    $data = [
        'title' => "Welcome <b>Edward</b>",
        'link' => "https://daystar.ac.ke",
        'body' => "Thank you for registering for the conference",
    ];
    $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.email_v1', ['data' => $data], function ($message) {
        $message
            ->from('conferences@daystar.ac.ke')
            ->to('edwardmuss5@gmail.com', 'Edward Muss')
            ->subject('Welcome!');
    });
});

//Route::get('events', 'Guest\EventsController@index')->name('events.index');
//Route::get('events/{event}', 'Guest\EventsController@show')->name('events.show');
Route::get('/event/resources', 'Guest\EventsController@resources');
Route::resource('event', 'Guest\EventsController');
Route::resource('event-speakers', 'Guest\SpeakersController');
Route::resource('sponsors-and-partners', 'Guest\PartnersController');

Route::post('payment', 'Guest\PaymentsController@store')->name('guest.payment');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Authentication Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('register', 'Auth\RegisterController@register')->name('auth.register.post');
Route::post('registerjson', 'Auth\RegisterController@registerjson')->name('auth.register.json');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password.patch');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset.post');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset.post2');
Route::post('event-registration', 'Guest\EventRegistrationController@store')->name('event-reg');

Route::group(['middleware' => ['auth'], 'prefix' => 'account', 'as' => 'account.'], function () {
    Route::resource('eventregistration', 'Guest\EventRegistrationController');
    Route::get('profile', 'Guest\DashboardController@dashboard')->name('profile');
    Route::post('update', 'Guest\DashboardController@update')->name('profile.store');
    Route::get('conferences', 'Guest\DashboardController@conferences')->name('profile.conferences');
    Route::get('my-registrations', 'Guest\DashboardController@my_registrations')->name('profile.my-registrations');
    Route::get('certificates', 'Guest\DashboardController@certificates')->name('profile.certificates');
    Route::get('feedback', 'Guest\DashboardController@feedback')->name('profile.feedback');
    Route::get('abstracts', 'Guest\DashboardController@abstracts')->name('profile.abstracts');
    Route::get('links', 'Guest\DashboardController@links')->name('profile.links');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('events', 'Admin\EventsController');
    Route::post('events_mass_destroy', ['uses' => 'Admin\EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::resource('tickets', 'Admin\TicketsController');
    Route::post('tickets_mass_destroy', ['uses' => 'Admin\TicketsController@massDestroy', 'as' => 'tickets.mass_destroy']);
    Route::resource('payments', 'Admin\PaymentsController');
    Route::resource('registrations', 'Admin\RegistrationsController');
    Route::get('unregistered/{id}', 'Admin\RegistrationsController@unregistered')->name('registrations.unregistered');
    Route::get('communication/{id}', 'Admin\RegistrationsController@communication')->name('registrations.communication');
    Route::post('communication/sendmail/{id}', 'Admin\RegistrationsController@sendmail')->name('registrations.communication.sendmail');
    Route::get('nametags/{id}', 'Admin\RegistrationsController@nametags')->name('registrations.nametags');
    Route::post('registrations_mass_destroy', ['uses' => 'Admin\RegistrationsController@massDestroy', 'as' => 'registrations.mass_destroy']);
    Route::resource('speakers', 'Admin\SpeakersController');
    Route::resource('partners', 'Admin\PartnersController');
});

Route::middleware(['auth'])->group(function () {
    Route::get('laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});
