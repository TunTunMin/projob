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
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => ['auth']], function () {
  // DashBoard 
Route::get('/dashboard','DashBoardController@index');
  //street 
Route::resource('/street','StreetController');
//township
Route::resource('/township','TownshipController');
//address
Route::resource('/address','AddressController');
//type
Route::resource('/type','TypeController');
//job type
Route::resource('/job_type','JobTypeController');
//race
Route::resource('/race','RaceController');
//nationality
Route::resource('/nationality','NationalityController');
//job specification
Route::resource('/job_specification','JobSpecificationController');
//job
Route::resource('/job','JobController');
//save job
Route::resource('/save_job','SaveJobController');
//user detail info
Route::resource('/user_detail_info','UserDetailInfoController');
//company
Route::resource('/company','CompanyController');

Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
?>
