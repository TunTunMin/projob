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

Route::get('/', 'HomeController@index');
Route::get('/searchjobs', 'HomeController@searchjobs');
Route::get('/jobdetails/{id}', 'HomeController@jobDetails');
Route::get('/first', function () {
    return view('auth.first_req');
});
//Second Request
Route::get('/second', function () {
    return view('auth.second_req');
});
//Third Request
Route::get('third', function () {
    return view('auth.third_req');
});
// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    // Register
    Route::match(['get', 'post'], '/firstpagesave', 'RegistrationUserDetailController@firstpagesave')->name('firstpagesave');
    Route::match(['get', 'post'], '/secondpagesave', 'RegistrationUserDetailController@secondpagesave')->name('secondpagesave');
    Route::match(['get', 'post'], '/thirdpagesave', 'RegistrationUserDetailController@thirdpagesave')->name('thirdpagesave');
    //
    Route::get('/changerole/{id}', 'RegistrationUserDetailController@changerole');
    // DashBoard
    Route::get('/dashboard', 'DashBoardController@index');
    //street
    Route::resource('/street', 'StreetController');
    //township
    Route::resource('/township', 'TownshipController');
    //address
    Route::resource('/address', 'AddressController');
    //type
    Route::resource('/type', 'TypeController');
    //job type
    Route::resource('/job_type', 'JobTypeController');
    //race
    Route::resource('/race', 'RaceController');
    //nationality
    Route::resource('/nationality', 'NationalityController');
    //job specification
    Route::resource('/job_specification', 'JobSpecificationController');
    //job
    Route::resource('/job', 'JobController');
    //save job
    Route::resource('/save_job', 'SaveJobController');
    //user detail info
    Route::resource('/user_detail_info', 'UserDetailInfoController');
    //company
    Route::resource('/company', 'CompanyController');
    //Field of Studies
    Route::resource('/fieldstudies', 'FieldStudyController');
    // Institude of Location
    Route::resource('institutes', 'InstitutesController');
    // Prefer Specializations
    Route::resource('prefer_specializations', 'Prefer_SpecializationsController');
    // Qualifications
    Route::resource('/qualifications', 'QualificationsController');
    //Roles
    Route::resource('/roles', 'RolesController');
});

Auth::routes();
