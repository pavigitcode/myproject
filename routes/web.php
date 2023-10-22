<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\screenSectionLinkController;
use App\Http\Controllers\userScreenController;
use App\Http\Controllers\userTypeController;
use App\Http\Controllers\userTypePermissionController;
use App\Http\Controllers\shiftController;
use App\Http\Controllers\offenceSectionController;
use App\Http\Controllers\hsnController;
use App\Http\Controllers\officerRegistrationController;
use App\Http\Controllers\designationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\rovingsquadController;
use App\Http\Controllers\consignorCreationController;
use App\Http\Controllers\permissionUiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\checkedVehicleController;
use App\Http\Controllers\checkedVehicleSearchController;
use App\Http\Controllers\offencebookingController;
use App\Http\Controllers\offenceconsignordetailController;
use App\Http\Controllers\offenceVehicleController;
use App\Http\Controllers\userPermissionController;
use App\Http\Controllers\officerdetailController;
use App\Http\Controllers\PenalityTaxController;
use App\Http\Controllers\checkedVehicleAddController;
use App\Http\Controllers\checkedVehicleSearchupdateController;
use App\Http\Controllers\commodityWiseReportController;
use App\Http\Controllers\commodityWiseReportFilterController;
use App\Http\Controllers\offenceWiseReportController;
use App\Http\Controllers\revenueWiseReportController;
use App\Http\Controllers\natureOfOffenseController;
use App\Http\Controllers\revenuewiseFilterController;

use App\Http\Controllers\mobileAuthController;
use App\Http\Controllers\rovingsquadlistController;
use App\Http\Controllers\mobileuserController;
use App\Http\Controllers\checkedVehicleDatastoreController;
use App\Http\Controllers\dashboardvehicledataContoller;
use App\Http\Controllers\dasboardviewController;
use App\Http\Controllers\dashboardRevenueController;
use App\Http\Controllers\offenceNameController;

use App\Http\Controllers\monthWiseConsolidatedReportController;
use App\Http\Controllers\offenceConsignorListController;
use App\Http\Controllers\offenceNamesGetController;
use App\Http\Controllers\offenceSubNamesGetController;
use App\Http\Controllers\officerDeleteController;
use App\Http\Controllers\officerListdetailController;
use App\Http\Controllers\PenalityTaxListController;

use App\Http\Controllers\userDataGetController;
use App\Http\Controllers\newPasswordGenerateController;
use App\Http\Controllers\updatelogincontroller;
use App\Http\Controllers\dashboardPasswordController;
use App\Http\Controllers\dashboardCheckedViewController;
use App\Http\Controllers\dashboardPassedViewController;
use App\Http\Controllers\dashboardOffenceViewController;
use App\Http\Controllers\divisiongetController;
use App\Http\Controllers\rovingSquadGetControler;
use App\Http\Controllers\officernamegetController;
use App\Http\Controllers\dealersDivisionWiseReportController;
use App\Http\Controllers\dealersPopUpDataController;
use App\Http\Controllers\repeatedOffenceWiseReportController;


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

Route::get('/', function () {

    return view('index');
});

Route::resource('login', AuthController::class);
Route::resource('updatelogin', updatelogincontroller::class);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('getUser', userDataGetController::class);
Route::resource('new_password_create', dashboardPasswordController::class);


// Route::controller(AuthOtpController::class)->group(function(){
//     Route::get('/otp/login', 'login')->name('otp.login');
//     Route::post('/otp/generate', 'generate')->name('otp.generate');
//     Route::get('/otp/verification/{user_id}', 'verification')->name('otp.verification');
//     Route::post('/otp/login', 'loginWithOtp')->name('otp.getlogin');
// });

Route::get('getuidata', [permissionUiController::class, 'index'])->name('getuidata');
Route::get('updategetuidata', [userPermissionController::class, 'index'])->name('updategetuidata');



// Route::get('storeuserpermission', [permissionUiController::class, 'show'])->name('storeuserpermission');

// Route::resource('dashboard', UserController::class);
// Route::resource('dashboard', dashboardController::class);
Route::resource('dashboard', dashboardController::class);
Route::resource('dashboarddivisiondata', dashboardvehicledataContoller::class);
Route::resource('dashboardview', dasboardviewController::class);
Route::resource('dashboardrevenuecollected', dashboardRevenueController::class);
Route::resource('checked_vehicle_data', dashboardCheckedViewController::class);
Route::resource('passed_vehicle_data', dashboardPassedViewController::class);
Route::resource('offence_vehicle_data', dashboardOffenceViewController::class);



Route::resource('screensectionadd', screenSectionLinkController::class);
Route::resource('userscreen', userScreenController::class);
Route::resource('usercreation', UserController::class);
Route::resource('usertype', userTypeController::class);
Route::delete('usertype/{id}', [userTypeController::class, 'destroy'])->name('usertype.destroy');

Route::resource('usertypepermission', userTypePermissionController::class);

// Route::get('usertypepermissiondestroy', 'userTypePermissionController@destroy');

// Route::get('usertypepermission/delete/{id}', 'userTypePermissionController@destroy');
// Route::get('/document/details/viewing/{id}', 'ViewDetails')->name('details.tenant');

Route::resource('designation_creation', designationController::class);
// Route::resource('/prnpriview', 'designationController@prnpriview');
Route::resource('division_creation', DivisionController::class);
Route::resource('rovingsquad_creation', rovingsquadController::class);
Route::resource('shift', shiftController::class);
Route::resource('offence_section', offenceSectionController::class);
Route::resource('hsn', hsnController::class);
Route::resource('consignorcreation', consignorCreationController::class);
Route::resource('officeregistration', officerRegistrationController::class);

Route::resource('offence_vehicle', offenceVehicleController::class);
// Route::resource('offence_vehicle', offencebookingController::class);



Route::resource('checked_vehicle', checkedVehicleController::class);
Route::resource('checked_vehicle_add', checkedVehicleDatastoreController::class);
// Route::get('checked_vehicle_add', 'checkedVehicleDatastoreController@show');

Route::resource('vehicleSearch', checkedVehicleSearchController::class);

Route::resource('offence_name_get', offenceNamesGetController::class);
Route::resource('offence_sub_get', offenceSubNamesGetController::class);



Route::resource('intelligence_division_get_roving', rovingsquadlistController::class);


Route::resource('roving_squad_list', rovingSquadGetControler::class);
Route::resource('officer_name_get', divisiongetController::class);
Route::resource('new_password', newPasswordGenerateController::class);

Route::resource('roving_name_get', officernamegetController::class);


Route::resource('officer', officerdetailController::class);
Route::resource('officer_list', officerListdetailController::class);
Route::get('/chennai_admin/officer_list/{id}',[officerListdetailController::class,'show']);

// Route::resource('officer_list_delete', officerListdetailController::class);

// Route::get('officerdata', [officerdetailController::class, 'show'])->name('officerdata');
// // Route::get('getuidata', [permissionUiController::class, 'index'])->name('getuidata');



Route::resource('penality', PenalityTaxController::class);
Route::resource('penality_list', PenalityTaxListController::class);
Route::get('/chennai_admin/penality_list/{id}',[PenalityTaxListController::class,'show']);


Route::resource('offence_consignor', offenceconsignordetailController::class);
Route::resource('offence_consignor_list', offenceConsignorListController::class);
Route::get('/chennai_admin/offence_consignor_list/{id}',[offenceConsignorListController::class,'show']);


Route::resource('offence_booking', offencebookingController::class);

Route::resource('offence_section_name', offenceNameController::class);
Route::resource('vehicleupdateSearch', checkedVehicleSearchupdateController::class);
Route::resource('filter_data', checkedVehicleAddController::class);


// report api
// Route::resource('popupdata', dealersPopUpDataController::class);
// Route::get('/getEmployeeDetails/{empid}', [dealersPopUpDataController::class, 'getEmployeeDetails'])->name('getEmployeeDetails');
Route::get('/chennai_admin/getEmployeeDetails/{empid}',[dealersPopUpDataController::class,'getEmployeeDetails']);
Route::resource('dealers_division_wise_report', dealersDivisionWiseReportController::class);
Route::resource('repeated_offence_wise_report', repeatedOffenceWiseReportController::class);
Route::resource('offence_wise_report', offenceWiseReportController::class);
Route::resource('revenue_wise_report', revenueWiseReportController::class);
Route::resource('commodity_wise_report', commodityWiseReportController::class);
Route::resource('month_wise_consolidated_report', monthWiseConsolidatedReportController::class);


Route::resource('commodity_filter', commodityWiseReportFilterController::class);
Route::resource('nature_of_offence_datafiltering', natureOfOffenseController::class);
Route::resource('revenuefilter', revenuewiseFilterController::class);

// Route::get('/revenue_wise_report','revenueWiseReportController@index');
// Route::post('/revenue_wise_report/fetch_data', 'revenueWiseReportController@fetch_date')->name('revenue_wise_report.fetch_data');
// Route::get('/offence_wise_report','offenceWiseReportController@index');
// Route::post('/offence_wise_report/fetch_data', 'offenceWiseReportController@fetch_date')->name('offence_wise_report.fetch_data');


// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
// Mobile App Api
Route::middleware(['cors'])->prefix('api')->group(function () {

    Route::post('{key}/mobile_login', 'mobileAuthController@create');

    // Route::post('{key}/mobile_login', 'mobileAuthController@index');
    // Route::post('mobile_login', [mobileAuthController::class, 'index']);
    // Route::post('{key}/mobile_login', mobileAuthController::class);
    // Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::resource('{key}/roving_squad', rovingsquadlistController::class);
    Route::resource('{key}/searchvehicle', checkedVehicleSearchController::class);
    Route::resource('{key}/profilefetchdata', mobileuserController::class);
    Route::resource('{key}/datewisevehicle', mobileuserController::class);


    // Route::resource('{key}/roving_squad', 'rovingsquadController@show');
    // Route::post('{key}/vehiclecat', 'vehicleSubCategoryController@index');

});



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
