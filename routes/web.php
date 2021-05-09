<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('signup_login');
})->name('login');

Route::get('/logout','LoginController@logout');

Route::post('/register','LoginController@store');
Route::post('/loginlogic','LoginController@loginusers')->name('loginlogic');

Route::get('/donation_process','DonationController@donationprocess');
Route::post('/donation_medication','DonationController@store');
Route::get('/request_process','RequestController@index');
Route::post('/request_medication','RequestController@store');

Route::get('/volunteer','VolunteerController@index');
Route::post('/accept_request_donation','VolunteerController@acceptDonation');
Route::post('/accept_request_medication','VolunteerController@acceptRequest');
Route::post('/recive_request_donation','DonationController@recievedDonation');
Route::post('/recive_request_medicine','DonationController@recievedRequest');
Route::get('/requierdMedicine','DonationController@requierdMedicine');
Route::get('/newMedicine','DonationController@addNewMedicineform');
Route::post('/AddMedicine','DonationController@AddMedicine');
Route::get('/myDonation','DonationController@myDonationStatus');
Route::get('/myRequest','RequestController@myRequestStatus');
Route::get('/dataManagement','LoginController@edit');
Route::post('/update','LoginController@update');
Route::get('/about','LoginController@about');




// recive_request_donation