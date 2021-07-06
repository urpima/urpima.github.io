<?php
Route::get('/master', function () {
    return view('master');
});
Route::get('/Team', function () {
    return view('Team');
});
Route::get('/Services', function () {
    return view('Services');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', 'PagesController@posts');
Route::get('/posts/{post}', 'PagesController@post');
Route::post('/posts/store', 'PagesController@store');
Route::post('/posts/{post}/store', 'CommentsController@store');

Route::get('/category/{name}', 'PagesController@category');


Route::get('/', 'HomeController@index')->name('master');
Route::get('/semin', 'seminController@index')->name('semin');
Route::get('/Team', 'TeamController@index')->name('Team');
Route::get('/posts', 'PagesController@posts')->name('posts');
Route::get('/semin/speaker/{speaker}', 'HomeController@view')->name('speaker');
Route::redirect('/home', '/admin');
Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::resource('users', 'UsersController');
    
    // Posts
    Route::delete('posts/destroy', 'PagesController@massDestroy')->name('posts.massDestroy');
    Route::resource('posts', 'PagesController');

    
    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Speakers
    Route::delete('speakers/destroy', 'SpeakersController@massDestroy')->name('speakers.massDestroy');
    Route::post('speakers/media', 'SpeakersController@storeMedia')->name('speakers.storeMedia');
    Route::resource('speakers', 'SpeakersController');

     // Speakers
     Route::delete('cherches/destroy', 'CherchesController@massDestroy')->name('cherches.massDestroy');
     Route::post('cherches/media', 'CherchesController@storeMedia')->name('cherches.storeMedia');
     Route::resource('cherches', 'CherchesController');
 
    // Schedules
    Route::delete('schedules/destroy', 'ScheduleController@massDestroy')->name('schedules.massDestroy');
    Route::resource('schedules', 'ScheduleController');

    // Venues
    Route::delete('venues/destroy', 'VenuesController@massDestroy')->name('venues.massDestroy');
    Route::post('venues/media', 'VenuesController@storeMedia')->name('venues.storeMedia');
    Route::resource('venues', 'VenuesController');

    // Hotels
    Route::delete('hotels/destroy', 'HotelsController@massDestroy')->name('hotels.massDestroy');
    Route::post('hotels/media', 'HotelsController@storeMedia')->name('hotels.storeMedia');
    Route::resource('hotels', 'HotelsController');

    // Galleries
    Route::delete('galleries/destroy', 'GalleriesController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleriesController@storeMedia')->name('galleries.storeMedia');
    Route::resource('galleries', 'GalleriesController');

    // Sponsors
    Route::delete('sponsors/destroy', 'SponsorsController@massDestroy')->name('sponsors.massDestroy');
    Route::post('sponsors/media', 'SponsorsController@storeMedia')->name('sponsors.storeMedia');
    Route::resource('sponsors', 'SponsorsController');

    // Faqs
    Route::delete('faqs/destroy', 'FaqsController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqsController');

    // Amenities
    Route::delete('amenities/destroy', 'AmenitiesController@massDestroy')->name('amenities.massDestroy');
    Route::resource('amenities', 'AmenitiesController');

    // Prices
    Route::delete('prices/destroy', 'PricesController@massDestroy')->name('prices.massDestroy');
    Route::resource('prices', 'PricesController');
});
