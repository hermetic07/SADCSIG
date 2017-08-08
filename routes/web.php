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
Route::get('/Request-sent','LastControl@viewSentReq');


Route::get('/', function () {
    return view('welcome');
});

//Admin portal
Route::get('/Dashboard','AdminController@dashboardIndex')->name('dashboard');

Route::get('/DeploymentStatus', function () {
    return view('AdminPortal/DeploymentStatus');
});
Route::get('/Notifications','AdminController@notifications');
Route::get('/ChangeGuards', function () {
    return view('AdminPortal/ChangeRejectedGuards');
});


Route::get('/Replace', function () {
    return view('AdminPortal/Replace');
});

Route::get('/UploadPics', function () {
    return view('AdminPortal/ClientPics');
});

Route::get('/Swap','GuardReplacementController@index');


Route::get('/SecurityGuards', function () {
    return view('AdminPortal/SecurityGuards');
});

Route::get('/GuardLicenses', function () {
    return view('AdminPortal/GuardLicenses');
});


Route::get('/GuardsDTR', function () {
    return view('AdminPortal/GuardsDTR');
});

Route::get('/Applicants', 'RegisterControl@hire');
Route::get('/SecurityGuards', 'RegisterControl@guards');

Route::get('/Ammunition', function () {
    return view('AdminPortal/Ammunition');
});

Route::get('/Pickups', function () {
    return view('AdminPortal/Pickups');
});

Route::get('/Reports', function () {
    return view('AdminPortal/Reports');
});

Route::get('/IncidentReports', function () {
    return view('AdminPortal/IncidentReports');
});

Route::get('/Messages', function () {
    return view('AdminPortal/Messages');
});

Route::get('/Announcements', function () {
    return view('AdminPortal/Announcements');
});



Route::get('/ClientsDetails', function () {
    return view('AdminPortal/ClientsDetails');
});

Route::get('/BillingPeriod', function () {
    return view('AdminPortal/BillingPeriod');
});

Route::get('/ClientPayment', function () {
    return view('AdminPortal/ClientPayment');
});

Route::get('/Quotation', function () {
    return view('AdminPortal/Quotation');
});

Route::get('/ServiceRequest','ServiceRequestController@index');

Route::get('/AddGuardRequests','AdditionalGuardRequesController@index');



Route::get('/ClientPortalEstablishments', function () {
    return view('ClientPortal/ClientPortalEstablishments');
});

Route::get('/ClientPortalMessages', function () {
    return view('ClientPortal/ClientPortalMessages');
});

Route::get('/ClientPortalGuardsDTR','ClientPortalHomeController@guardDtr');

Route::get('/ClientPortalSettings', function () {
    return view('ClientPortal/ClientPortalSettings');
});

Route::get('/ClientPortalDetails', function () {
    return view('ClientPortal/ClientPortalDetails');
});


Route::get('/SecurityGuardsPortalHome', function () {
    return view('SecurityGuardsPortal/SecurityGuardsPortalHome');
});
Route::get('/GuardPool', function () {
    return view('ClientPortal/Guardpool');
});







/// ---------  Admin Client Requests  --------------------////

Route::get('/ServiceRequest','ServiceRequestController@index');  // All services requested from clients
Route::get('/NewContract-{id}','ServiceRequestController@newContract');
Route::post('NewContract-Save','ServiceRequestController@saveContract');
Route::get('/GunRequest','GunRequestController@index');     //  All gun requests from clients
Route::get('/GunRequest-view','GunRequestController@viewGunRequest')->name('view.gunRequest');
Route::get('/GunRequest-status','GunRequestController@deliveryStats')->name('delivery.status');
Route::post('/GunDelivery/Save','GunDeliveryController@saveDelivery');  // Save Gun Delivery into Database
Route::get('GunDeliveries','GunDeliveryController@adminDeliveries');
Route::get('/AddGuardRequests','AdditionalGuardRequesController@index2');  //  All additional guards from clients
Route::get('/DeployGuards','DeploymentController@deploy')->name('deploy');
Route::post('/DeployGuards/Save','DeploymentController@saveDepl')->name('deployment.save');
Route::get('/ClientRegistration','ContractController@register');
Route::post('/ClientRegistration-Save','ContractController@save');
Route::get('ManualDeploy','AdminController@manualDeploy')->name('manual.deployment');
Route::get('select/Shifts','AdminController@selectShifts')->name('select.shifts');

Route::get('/PendingClientRequests','AdminController@pending_client_requests')->name('pending.client.requests');

Route::get('/DeploymentStatus+{contractID}','AdminController@deploymentStatus');
Route::get('/ChangeGuards','AdminController@changeRejectedGuards')->name('change.rejected');
Route::post('/ChangeGuards-save','AdminController@saveChangedGuards')->name('save.changes');

Route::get('/ActiveClient', 'ContractController@allCLients');
Route::get('/ClientEstablishment-{contractID}','AdminController@activeClientDetails');

/** -----------------  CLIENTS --------------------- **/

// Check before deleting Route::get('/SendGun','LastControl@index3');

Route::post('/clientupload','ContractController@saveImage');

Route::get('/Request-{id}','ClientPortalHomeController@requests');
Route::post('/Request-Save/{id}','LastControl@saveReq');
Route::post('/GunRequest-Save/{id}','LastControl@saveGunReq');
Route::post('/AddGuardRequests-Save/{id}','LastControl@saveAddGuardReq');
Route::get('viewModal','AdditionalGuardRequesController@view')->name('addguardrequests.view');
Route::post('/GuardReplcRequest-Save/{id}','LastControl@saveGuardReplReqst');


Route::post('GunDelivery-remove', 'GunDeliveryController@remove');
Route::post('GunRequest-remove', 'GunRequestController@remove');
Route::post('ServiceRequest-remove', 'ServiceRequestController@remove');
Route::post('AddGuardRequest-remove', 'AdditionalGuardRequesController@remove');

Route::get('/ClientPortalHome-GunDelivery-{id}','ClientPortalHomeController@gunDeliveries');
Route::get('/ClaimDeliveryModdal','ClientPortalHomeController@claimDeliveryModal')->name('claim.delivery.modal');
Route::post('/ClaimDelivery','ClientPortalHomeController@claimDelivery')->name('claim.delivery');
Route::post('GunDelivery-claim', 'GunDeliveryController@claim');

Route::get('/ClientPortalGuardsDTR-{id}','ClientPortalHomeController@guardDtr');
Route::get('/ClientPortalEstablishments-shifts+{id}','ClientPortalHomeController@shifts');
Route::get('/ClientPortalEstablishments-{id}','ClientPortalHomeController@clientEstablishments');

Route::get('/ClientPortalEstablishmentsDetails-{id}+{estabID}','ClientPortalHomeController@clientEstablishmentsdetails');

Route::get('/ClientPortalContracts-{id}+{estabID}','ClientPortalHomeController@clientContracts');

Route::get('/ClientPortalMessages-{id}','ClientPortalHomeController@messages');
Route::get('/ClientPortalMessages/modal/{messageID}','ClientPortalHomeController@messagesModal');
Route::get('/GuardPool+{tempDeploymentID}+{clientID}+{client_notif_id}','ClientPortalHomeController@guardPool');
Route::get('/GuardPool-save','ClientPortalHomeController@saveGuards')->name('saveguards');

Route::get('/ClientPortalSettings', function () {
    return view('ClientPortal/ClientPortalSettings');
});

Route::get('/ClientPortalHome-{id}','ClientPortalHomeController@index');
Route::get('/ClientLogin','LastControl@clientAuth');
Route::post('/Client-auth','LastControl@authenticate');


//Route::get('/Request','LastControl@login');
//Route::get('/Request-view','ServiceRequestController@view');





//Route::get('/ClientsReg','LastControl@index2');
//Route::post('ClientRegs/Save','LastControl@save');
//Route::get('/SendGun','LastControl@index3');
Route::get('/Deploy','LastControl@index4');
Route::get('/Secus','LastControl@index6');

Route::get('/Service','ServiceControl@index');
Route::post('/Service-Add','ServiceControl@add');
Route::get('/Service-view', 'ServiceControl@view');
Route::post('/Service-Update','ServiceControl@update');
Route::post('/Service-status', 'ServiceControl@status');
Route::post('Service-delete', 'ServiceControl@delete');

Route::get('/Nature','NatureControl@index');
Route::post('/Nature-Add','NatureControl@add');
Route::get('/Nature-view', 'NatureControl@view');
Route::post('/Nature-Update','NatureControl@update');
Route::post('/Nature-status', 'NatureControl@status');
Route::post('Nature-delete', 'NatureControl@delete');

Route::get('/Requirement','RequirementControl@index');
Route::post('/Requirement-Add','RequirementControl@add');
Route::get('/Requirement-view', 'RequirementControl@view');
Route::post('/Requirement-Update','RequirementControl@update');
Route::post('/Requirement-status', 'RequirementControl@status');
Route::post('Requirement-delete', 'RequirementControl@delete');

Route::get('/License','LicenseControl@index');
Route::post('/License-Add','LicenseControl@add');
Route::get('/License-view', 'LicenseControl@view');
Route::post('/License-Update','LicenseControl@update');
Route::post('/License-status', 'LicenseControl@status');
Route::post('License-delete', 'LicenseControl@delete');

Route::get('/Measurement','MeasurementControl@index');
Route::post('/measurement-Add','MeasurementControl@add');
Route::get('/measurement-view', 'MeasurementControl@view');
Route::post('/measurement-Update','MeasurementControl@update');
Route::post('/measurement-status', 'MeasurementControl@status');
Route::post('measurement-delete', 'MeasurementControl@delete');

Route::get('/Attribute','AttributeControl@index');
Route::post('/Attribute-Add','AttributeControl@add');
Route::get('/Attribute-view', 'AttributeControl@view');
Route::post('/Attribute-Update','AttributeControl@update');
Route::post('/Attribute-status', 'AttributeControl@status');
Route::post('Attribute-delete', 'AttributeControl@delete');

Route::get('/Military','MilitaryControl@index');
Route::post('/Military-Add','MilitaryControl@add');
Route::get('/Military-view', 'MilitaryControl@view');
Route::post('/Military-Update','MilitaryControl@update');
Route::post('/Military-status', 'MilitaryControl@status');
Route::post('Military-delete', 'MilitaryControl@delete');

Route::get('/Rank','RankControl@index');
Route::post('/Rank-Add','RankControl@add');
Route::get('/Rank-view', 'RankControl@view');
Route::post('/Rank-Update','RankControl@update');
Route::post('/Rank-status', 'RankControl@status');
Route::post('Rank-delete', 'RankControl@delete');

Route::get('/Role','RoleControl@index');
Route::post('/Role-Add','RoleControl@add');
Route::get('/Role-view', 'RoleControl@view');
Route::post('/Role-Update','RoleControl@update');
Route::post('/Role-status', 'RoleControl@status');
Route::post('Role-delete', 'RoleControl@delete');

Route::get('/Leave','LeaveControl@index');
Route::post('/Leave-Add','LeaveControl@add');
Route::get('/Leave-view', 'LeaveControl@view');
Route::post('/Leave-Update','LeaveControl@update');
Route::post('/Leave-status', 'LeaveControl@status');
Route::post('Leave-delete', 'LeaveControl@delete');

Route::get('/Province','ProvinceControl@index');
Route::post('/Province-Add','ProvinceControl@add');
Route::get('/Province-view', 'ProvinceControl@view');
Route::post('/Province-Update','ProvinceControl@update');
Route::post('/Province-status', 'ProvinceControl@status');
Route::post('Province-delete', 'ProvinceControl@delete');

Route::get('/Area','AreaControl@index');
Route::post('/Area-Add','AreaControl@add');
Route::get('/Area-view', 'AreaControl@view');
Route::post('/Area-Update','AreaControl@update');
Route::post('/Area-status', 'AreaControl@status');
Route::post('Area-delete', 'AreaControl@delete');

Route::get('/GunType','GunTypeControl@index');
Route::post('/GunType-Add','GunTypeControl@add');
Route::get('/GunType-view', 'GunTypeControl@view');
Route::post('/GunType-Update','GunTypeControl@update');
Route::post('/GunType-status', 'GunTypeControl@status');
Route::post('GunType-delete', 'GunTypeControl@delete');

Route::get('/Gun','GunControl@index');
Route::post('/Gun-Add','GunControl@add');
Route::get('/Gun-view', 'GunControl@view');
Route::post('/Gun-Update','GunControl@update');
Route::post('/Gun-status', 'GunControl@status');
Route::post('Gun-delete', 'GunControl@delete');



Route::get ( '/Serv', 'ServiceController@readItems' );
Route::post ( '/addService', 'ServiceController@addItem' );
Route::post ( '/editService', 'ServiceController@editItem' );
Route::post ( '/deleteService', 'ServiceController@deleteItem' );

Route::get ( '/Nat', 'NatureController@readItems' );
Route::post ( '/addNature', 'NatureController@addItem' );
Route::post ( '/editNature', 'NatureController@editItem' );
Route::post ( '/deleteNature', 'NatureController@deleteItem' );

Route::get ( '/Lic', 'LicenseController@readItems' );
Route::post ( '/addLicense', 'LicenseController@addItem' );
Route::post ( '/editLicense', 'LicenseController@editItem' );
Route::post ( '/deleteLicense', 'LicenseController@deleteItem' );

Route::get ( '/Req', 'RequirementController@readItems' );
Route::post ( '/addRequirement', 'RequirementController@addItem' );
Route::post ( '/editRequirement', 'RequirementController@editItem' );
Route::post ( '/deleteRequirement', 'RequirementController@deleteItem' );

Route::get ( '/mes', 'MeasurementController@readItems' );
Route::post ( '/addMeasurement', 'MeasurementController@addItem' );
Route::post ( '/editMeasurement', 'MeasurementController@editItem' );
Route::post ( '/deleteMeasurement', 'MeasurementController@deleteItem' );

Route::get ( '/Att', 'AttributeController@readItems' );
Route::post ( '/addAttribute', 'AttributeController@addItem' );
Route::post ( '/editAttribute', 'AttributeController@editItem' );
Route::post ( '/deleteAttribute', 'AttributeController@deleteItem' );

Route::get ( '/Mil', 'MilitaryController@readItems' );
Route::post ( '/addMilitary', 'MilitaryController@addItem' );
Route::post ( '/editMilitary', 'MilitaryController@editItem' );
Route::post ( '/deleteMilitary', 'MilitaryController@deleteItem' );

Route::get ( '/Ran', 'RankController@readItems' );
Route::post ( '/addRank', 'RankController@addItem' );
Route::post ( '/editRank', 'RankController@editItem' );
Route::post ( '/deleteRank', 'RankController@deleteItem' );

Route::get ( '/Rol', 'RoleController@readItems' );
Route::post ( '/addRole', 'RoleController@addItem' );
Route::post ( '/editRole', 'RoleController@editItem' );
Route::post ( '/deleteRole', 'RoleController@deleteItem' );

Route::get ( '/Lea', 'LeaveController@readItems' );
Route::post ( '/addLeave', 'LeaveController@addItem' );
Route::post ( '/editLeave', 'LeaveController@editItem' );
Route::post ( '/deleteLeave', 'LeaveController@deleteItem' );

Route::get ( '/Prov', 'ProvinceController@readItems' );
Route::post ( '/addProvince', 'ProvinceController@addItem' );
Route::post ( '/editProvince', 'ProvinceController@editItem' );
Route::post ( '/deleteProvince', 'ProvinceController@deleteItem' );

Route::get ( '/Are', 'AreaController@readItems' );
Route::post ( '/addArea', 'AreaController@addItem' );
Route::post ( '/editArea', 'AreaController@editItem' );
Route::post ( '/deleteArea', 'AreaController@deleteItem' );

Route::get ( '/Gut', 'GuntypeController@readItems' );  ///  GuntypeController doesn't exists??
Route::post ( '/addGuntype', 'GuntypeController@addItem' );
Route::post ( '/editGuntype', 'GuntypeController@editItem' );
Route::post ( '/deleteGuntype', 'GuntypeController@deleteItem' );

Route::get ( '/Gu', 'GunController@readItems' );
Route::post ( '/addGun', 'GunController@addItem' );
Route::post ( '/editGun', 'GunController@editItem' );
Route::post ( '/deleteGun', 'GunController@deleteItem' );

Route::get('Attribute2','Attribute2Controller@index');

//Guard side (evander)
Route::get ( '/test', 'RegisterControl@test' );
Route::post ( '/SecurityGuardsLogin', 'EmployeeControl@SLogin' );
Route::get ( '/SecurityGuardsLogOut', 'EmployeeControl@SLogout' );
Route::get ( '/SecurityGuardsPortalHome', 'EmployeeControl@home' );
Route::get('/SecurityGuardsPortalProfile', 'EmployeeControl@profile');
Route::get('/SecurityGuardsPortalMessages', 'EmployeeControl@messages');
// Earl :D ---------------------------------------------------------------------
Route::get('/SecurityGuardsPortalMessages/modal','EmployeeControl@showModal')->name('SGMessage.modal');
Route::post('/saveGuardResponse','EmployeeControl@saveResponse')->name('save.guard.response');
Route::post('/saveGuardReject','EmployeeControl@guardReject')->name('guard.reject');
Route::get('/getReason','EmployeeControl@getReason')->name('getreason');
// -- end Earl :D ----------------------------------------------------------------
Route::get('/SecurityGuardsPortalSettings', 'EmployeeControl@settings');
Route::post ( '/EmployeeUpdateProfile', 'EmployeeControl@UpdateProfile' );
Route::post ( '/EmployeeUpdatePassword', 'EmployeeControl@UpdatePassword' );
Route::get('/SecurityGuardsPortalAttendance', 'EmployeeControl@attendance');
Route::get('Guard-Registration','LastControl@index6');
Route::post ( '/GetProvinceAreas', 'AreaControl@getArea' );
Route::post('/RegisterEmployee','RegisterControl@employeeReg');
Route::post('/Applicants','RegisterControl@saveImage');
//admin guard (evander)
Route::post('/HireEmployee','RegisterControl@approve');
Route::post('/HireEmployee2','RegisterControl@approve2');
Route::post('/RemoveApplicant','RegisterControl@remove');
Route::get('/SecuProfile/{id}', 'RegisterControl@secuProfile');

//
Route::get('send','sendEmail@send');
//log In
Route::get('/login','ContractController@signin');
Route::post('/CLogin','ContractController@login');
Route::get('/ClientHome','ContractController@home');
Route::get('/ClientOut','ContractController@logout');

Route::get('/AdminLogIn', function () {
    return view('AdminLogIn');
});
