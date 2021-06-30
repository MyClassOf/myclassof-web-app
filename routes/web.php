<?php

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

//Frontend Routes
Route::get('/home','MainController@index')->name('home');

Auth::routes();

// Route::get('user/{id}', 'MainController@GetUser');


// Route::get('/home', 'MainController@home')->name('home');
Route::get('/legal', 'MainController@Legal')->name('legal');
Route::get('/conditions', 'MainController@Conditions')->name('conditions');
Route::get('/privacy', 'MainController@Privacy')->name('privacy');
Route::get('/whoweare', 'MainController@WhoWe')->name('who.we.are');
Route::get('/ourservices', 'MainController@OurServices')->name('ourservices');
Route::get('/support', 'MainController@Support')->name('support');
Route::get('/contactus', 'MainController@ContactUs')->name('contactus');
Route::get('/autologout', 'MainController@AutoLogout')->name('autoLogout');

Route::get('/gradgift/{id}', 'MainController@GradGift')->name('grad.gift');
Route::get('/profile/{id}', 'MainController@Profile')->name('profile');

Route::post('/support', 'MainController@Contact')->name('contact');
Route::get('/popup', 'MainController@Popup')->name('popup');
Route::post('/popup', 'MainController@Interested')->name('interested');

Route::post('/createaccount', 'StripeController@CreateAccount')->name('createStripeAccount');
Route::get('/checkoutsession/{id}', 'StripeController@Checkout')->name('checkout');
Route::get('/getcheckout', 'StripeController@GetCheckoutSession')->name('getCheckout');
Route::post('/checkout/{id}', 'StripeController@CreateCheckoutSession')->name('createCheckout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/mygradgift', 'MainController@PrivateGradGift')->name('private.grad.gift');
    Route::get('/myprofile', 'MainController@PrivateProfile')->name('private.profile');
    
//    Route::get('/question/{id}', 'MainController@Questions')->name('questions');
    Route::get('/question', 'MainController@Questions')->name('questions');
    Route::post('/question', 'MainController@Question')->name('question');
    Route::post('/updatequestions', 'MainController@UpdateQuestions')->name('update.questions');

    Route::post('/profile/change', 'MainController@ProfileChange')->name('profile.change');
    Route::post('/updateprofile', 'MainController@UpdateProfile')->name('update.profile');
    Route::post('/changepassword', 'MainController@ChangePassword')->name('change.password');
    
    Route::get('/accountdetails', 'MainController@AccountDetails')->name('account.details');
    Route::post('/accountdetails', 'MainController@AccountDetail')->name('account.detail');
    
    Route::get('/createprofile', 'MainController@CreateProfile')->name('create.profile');
    Route::post('/createprofiles', 'MainController@CreateProfiles')->name('create.profiles');
    
    Route::get('/dashboard', 'MainController@Dashboard')->name('dashboard');
    Route::post('/addDefaultGifts', 'MainController@AddDefaultGifts')->name('addDefaultGifts');
    Route::post('/addGradGifts', 'MainController@AddGradGifts')->name('addgradgifts');
    Route::post('/deleteGift/{id}', 'MainController@DeleteGradGift')->name('deletegift');
    Route::post('/editGift/{id}', 'MainController@EditGradGift')->name('editgift');
    Route::post('/updatePaypal', 'MainController@UpdatePaypal')->name('updatepaypal');
    Route::post('/updatePrivacySettings', 'MainController@UpdatePrivacySettings')->name('updateprivacysettings');
});
