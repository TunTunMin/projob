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
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Composer::call('composer dump-autoload');
    return "cache clear successfully";
});
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
    Route::resource('/specializations', 'SpecializationController');
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
    // Qualifications
    Route::resource('/qualifications', 'QualificationsController');
    //Roles
    Route::resource('/roles', 'RolesController');
    // Profile

    Route::get('/review-profile', 'ProfileController@index')->name('frontend.profile.index');
    Route::post('/profileSave', 'ProfileController@profileSave')->name('profileSave');
    Route::delete('/profileDelete', 'ProfileController@profileDelete')->name('profileDelete');
    Route::get('/experience', 'ProfileController@experience')->name('experience');
    Route::get('/editExperience/{id}', 'ProfileController@editExperience');
    Route::post('/experienceSave', 'ProfileController@experienceSave')->name('experienceSave');
    Route::post('/experience-update', 'ProfileController@experienceUpdate')->name('experience-update');
    Route::delete('experienceDelete/{id}', 'ProfileController@experienceDelete');

    // skills
    Route::get('/skill', 'ProfileController@skill');
    Route::get('/delete_skill/{id}', 'ProfileController@delete_skill');
    Route::post('/skills/save', 'ProfileController@skillSave')->name('skills.save');

    Route::get('/education', 'ProfileController@education');
    Route::post('/educationSave', 'ProfileController@educationSave');
    Route::get('editEducation/{id}', 'ProfileController@editEducation');
    Route::delete('educationDelete/{id}', 'ProfileController@educationDelete');
    // language
    Route::get('/language', 'ProfileController@language');
    Route::get('/delete_language/{id}', 'ProfileController@delete_language');
    Route::post('/languages/save', 'ProfileController@languageSave')->name('languages.save');

    Route::get('/info', 'ProfileController@info');
    Route::get('/editInfo/{id}', 'ProfileController@editInfo');
    Route::post('/infoUpdate', 'ProfileController@infoUpdate');
    Route::get('/about', 'ProfileController@about');
    // Resume
    Route::get('/resume', 'ProfileController@resume');
    Route::post('/uploadresume', 'ProfileController@uploadresume')->name('uploadresume');
    Route::delete('/resumeDelete', 'ProfileController@resumeDelete')->name('resumeDelete');
    Route::get('/setting', 'ProfileController@setting');
});


Auth::routes();
