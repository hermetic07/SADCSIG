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
Route::get('/Sent-requests-{clientID}','ClientPortalHomeController@sentRequest');
Route::get('/Sent-request-{clientID}-{transID}','ClientPortalHomeController@sentRequest2');
Route::get('/cancel-Request','ClientPortalHomeController@cancelRequest');
Route::post('/cancel-Request-save','ClientPortalHomeController@cancelRequestSave');
Route::get('/view-sentRequest','ClientPortalHomeController@viewSentRequest');
Route::post('/cancel-Request-admin','AdminController@cancelRequestSave');

Route::get('/', function () {
	return view('welcome');
});
Route::get('/home', function () {
	return view('welcome2');
});
//Admin portal
Route::get('/Dashboard','AdminController@dashboardIndex')->name('dashboard')->middleware('auth');

Route::get('/Notifications','AdminController@notifications')->middleware('auth');
Route::get('/ChangeGuards', function () {
	return view('AdminPortal/ChangeRejectedGuards');
});
Route::post('/Terminate','ContractController@terminate');
Route::post('/GetNatureValue','BillingControl@getNature');

Route::get('/Replace', function () {
	return view('AdminPortal/Replace');
});

Route::get('/UploadPics', function () {
	return view('AdminPortal/ClientPics');
});

Route::get('/Swap','GuardReplacementController@index');




Route::get('/GuardLicenses', 'RegisterControl@guardslicense');


Route::get('/GuardsDTR', function () {
	return view('AdminPortal/GuardsDTR');
});

Route::get('/Applicants', 'RegisterControl@hire');
Route::get('/SecurityGuards', 'RegisterControl@guards');

Route::get('/Ammunition', function () {
	return view('AdminPortal/Ammunition');
});


Route::get('/Reports','ReportsController@index');

Route::get('/DispositionReports-pdf','ReportsController@dispositionReportPdf');


Route::get('/IncidentReports', function () {
	return view('AdminPortal/IncidentReports');
});

Route::get('/Messages', function () {
	return view('AdminPortal/Messages');
});

Route::get('/Announcements', function () {
	return view('AdminPortal/Announcements');
});

Route::get('/SampleGunTagging', function () {
	return view('AdminPortal/SampleGunTagging');
});







Route::get('/BillingPeriod', "BillingControl@index");
Route::post('/GetBilling', "BillingControl@getRecord");
Route::get('/ClientPayment',"BillingControl@allSOA" );

Route::get('/Quotation', function () {
	return view('AdminPortal/Quotation');
});

Route::get('/ServiceRequest','ServiceRequestController@index');

Route::get('/AddGuardRequests','AdditionalGuardRequesController@index');





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




Route::get('/Penalty', function () {
	return view('Utilities/Penalty');
});



Route::get('/SOA/{con}/{col}/{cli}/{diff}/{date}/{date1}/{date2}/{day}/{night}', 'BillingControl@soa');
Route::get('/SOA2/{con}/{col}/{cli}/{diff}/{date}/{date1}/{date2}/{day}/{night}/{vat}/{ewt}/{ac}', 'BillingControl@soa2');
Route::post('/Submit-Billing', 'BillingControl@submitSOA');
Route::post('/GetPaymentInfo', 'BillingControl@paymentInfo');
Route::post('/PaymentPaid', 'BillingControl@paymentPaid');
Route::post('/Client-download-soa', 'BillingControl@getLinks');

Route::get('/Home', 'ClientPortalHomeController@homeview');



/// ---------  UTILITIES  --------------------////
Route::get('/Tax','UtilitiesControl@tax' );
Route::post('/Admin-update-tax', 'UtilitiesControl@vatupdate');
Route::post('/Admin-update-ewt', 'UtilitiesControl@ewtupdate');
Route::get('/AgencyFee', 'UtilitiesControl@agencyfee');
Route::post('/Admin-update-AgencyFee', 'UtilitiesControl@agencyfeeupdate');
Route::get('/BillingDays', 'UtilitiesControl@dates');
Route::post('/Admin-update-dayone', 'UtilitiesControl@dayoneupdate');
Route::post('/Admin-update-daytwo', 'UtilitiesControl@daytwoupdate');

/// ---------  Admin Client Requests  --------------------////
Route::group(['prefix'=>''], function(){
	Route::get('ServiceRequest','ServiceRequestController@index')->name('serviceRequest.index');
	Route::get('ServiceRequest/viewModal','ServiceRequestController@viewModal')->name('serviceRequest.viewModal');
	Route::post('/accept-servicerequest','AdminController@accept_serv_req');
	Route::post('/delete-servicerequest','ServiceRequestController@remove');
	Route::get('/open-servicerequest','ClientPortalHomeController@openServReqNotif');
});

//Route::get('/ServiceRequest','ServiceRequestController@index')->name('serviceRequest.index');  // All services requested from clients

/**-------------------------     Contracts    ---------------------*/
Route::get('/NewContract-ExistingEstablishment-{id}-{estabID}','ServiceRequestController@newContractExistingEstab')
							->name('newcontract.existing')
							->middleware('auth');
Route::post('/NewContract-ExistingEstablishment-save}','ServiceRequestController@saveExistingEstabContract')
							->name('newcontract.existing.save');

Route::get('/NewContract-{id}','ServiceRequestController@newContract')
							->name('newcontract')
							->middleware('auth');
Route::post('NewContract-Save','ServiceRequestController@saveContract')->name('save.newcontract');
Route::get('/NewContract+UploadPics-{id}','ServiceRequestController@uploadPic')
							->name('newcontract.uploadpic')
							->middleware('auth');
Route::get('/ClientContracts-{id}+{estabID}','AdminController@contracts')
							->name('admin.clientContracts')
							->middleware('auth');
Route::get('/Contract-View','AdminController@viewContract')->name('contract.view');

Route::get('/getContractPDF-{contractID}','ContractController@getContractPDF');

Route::get('/ContractGuns-{contractID}','InitialDeliveryController@initialGunDelv');

Route::get('/initialGunDelv','InitialDeliveryController@initialDelivery');
Route::get('/initialGunDelv-view','InitialDeliveryController@viewInitDelivery');
Route::get('/initialGunDelv-deliveryModal','InitialDeliveryController@deliverModal');
Route::get('/updateContractStats','InitialDeliveryController@updateContractStats');
/**-------------------------     Contracts-End    ---------------------*/
/**-------------------------     Contracts-End    ---------------------*/



/**-------------------------     Gun Request(old)    ---------------------*/
Route::get('/GunRequest','GunRequestController@index');
Route::get('/GetGunsTable','GunRequestController@getGuns')
							->name('getGuns')
							->middleware('auth:client');
Route::get('/GunRequest-view','GunRequestController@viewGunRequest')
							->name('view.gunRequest')
							->middleware('auth');
Route::get('/GunRequest-status','GunRequestController@deliveryStats')
							->name('delivery.status')
							->middleware('auth');
/**-------------------------     Gun Request(old)-End    ---------------------*/


/**-------------------------     Gun Request(new)    ---------------------*/
Route::get('/DeliverGuns-index','GunDeliveryController@index2');

Route::get('/DeliverGuns-table','GunDeliveryController@table')
							->name('gun.delivery.table')
							->middleware('auth');
Route::get('/DeliverGuns-view','GunDeliveryController@view')
							->name('gun.delivery.view')
							->middleware('auth');
Route::get('/DeliverGuns-deliver','GunDeliveryController@deliver')
							->name('gun.delivery.deliver')
							->middleware('auth');
Route::get('/DeliverGuns-deliverModal','GunDeliveryController@deliverModal')
							->name('gun.delivery.deliverModal')
							->middleware('auth');
Route::get('/DeliverGuns-{gunRequestID}','GunDeliveryController@index');
Route::post('/GunDelivery/Save','GunDeliveryController@saveDelivery')
							->name('gun.delivery.save');
Route::get('/Pickups','PickupsController@index2')
							->name('pickups.index2')
					        ->middleware('auth');
Route::get('/Pickups-show','PickupsController@show')
					        ->name('pickups.show')
							->middleware('auth');
Route::get('/Pickups-delReplc','PickupsController@deliverReplacement')
							->name('pickups.delRepl')
							->middleware('auth');
Route::get('/Pickups-{gunDeliveryId}','PickupsController@index')
							->name('pickups.index')
							->middleware('auth');
Route::get('/Pickups-redelivery','PickupsController@redelivery')

							->middleware('auth');


Route::post('/delete-gunrequests','GunRequestController@remove');
Route::post('/delete-gundelivery','GunDeliveryController@remove');
Route::post('/cdelete-gundelivery','GunDeliveryController@client_delete');

Route::get('/AddGuardRequests','AdditionalGuardRequesController@index2')
							->middleware('auth');

/**-------------------------     Gun Request(new)    ---------------------*/


/**-------------------------     Add Guard Requests    ---------------------*/

Route::get('/AddGuardRequests-view','AdditionalGuardRequesController@view')
							->name('addGuard.view')
							->middleware('auth');
Route::get('/Deploy-AddGuards-{addGuardReqID}','AdditionalGuardRequesController@deployAddGuards');
Route::get('/AddGuards-DeployStatus-{addGuardReqID}','AdditionalGuardRequesController@deploymentStatus');
Route::get('/AddGuard-deploy','AdditionalGuardRequesController@deploy');

Route::get('/AddGuard-ChangeGuards','AdditionalGuardRequesController@changeRejectedGuards')

							->middleware('auth');

Route::post('/delete-addguardrequests','AdditionalGuardRequesController@remove');


/**-------------------------     Add Guard Requests-end    ---------------------*/

/**-------------------------     Guard-Replacement Start    ---------------------*/
	Route::get('guard-ReplacementRequest-view','GuardReplacementController@view');
	Route::get('/Deploy-GuardReplacement-{guardReplacementID}','GuardReplacementController@deployReplacement');
	Route::get('/GuardRepl-DeployStatus-{guardReplacementID}','GuardReplacementController@deploymentStatus');
	Route::get('/GuardReplacement-deploy','GuardReplacementController@deploy');
	Route::get('/Replace-ChangeGuards','GuardReplacementController@changeRejectedGuards');

	Route::post('/delete-guardrep','GuardReplacementController@remove');

/**-------------------------     Guard-Replacement Start    ---------------------*/


Route::get('/DeployGuards','DeploymentController@deploy')
							->name('deploy')
							->middleware('auth');
Route::post('/DeployGuards/Save','DeploymentController@saveDepl')->name('deployment.save');

Route::get('/ClientRegistration','ContractController@register')
							->name('client.reg')
							->middleware('auth');
Route::post('/ClientRegistration-Save','ContractController@save');
Route::get('/ClientRegistration-getServiceRate','ContractController@getServiceRate')
							->name('getservrate')
							->middleware('auth');

Route::get('ManualDeploy','AdminController@manualDeploy')
							->name('manual.deployment')
							->middleware('auth');
Route::get('ManualDeploy-view','AdminController@view')
						    ->name('manual.view')
							->middleware('auth');
Route::get('select/Shifts','AdminController@selectShifts')
							->name('select.shifts')
							->middleware('auth');

Route::get('/PendingDeployment','AdminController@pending_deployments')
							->name('pending.deployments')
							->middleware('auth');
Route::get('/PendingClientRequests','AdminController@pending_client_requests')
							->name('pending.client.requests')
							->middleware('auth');

Route::get('/DeploymentStatus+{contractID}','AdminController@deploymentStatus')
							->middleware('auth');
Route::get('/ChangeGuards','AdminController@changeRejectedGuards')
							->name('change.rejected')
							->middleware('auth');
Route::post('/ChangeGuards-save','AdminController@saveChangedGuards')
							->name('save.changes');

Route::get('/ActiveClient', 'ContractController@allCLients')
							->middleware('auth');
Route::get('/ClientEstablishment-{contractID}','AdminController@activeClientDetails')
							->name('admin.client.estab');
Route::get('/ClientsDetails-{id}+{estabID}','AdminController@estabDetails')
							->name('admin.estab.details');

Route::get('/DeploymentHistory','DeploymentController@history');
Route::get('/DeploymentHistory-view','DeploymentController@historyView');

Route::post('GunDelivery-remove', 'GunDeliveryController@remove');
Route::post('GunRequest-remove', 'GunRequestController@remove');
Route::post('ServiceRequest-remove', 'ServiceRequestController@remove');
Route::post('AddGuardRequest-remove', 'AdditionalGuardRequesController@remove');

/** -----------------  CLIENTS --------------------- **/

// Check before deleting Route::get('/SendGun','LastControl@index3');

Route::post('/clientupload','ContractController@saveImage');

Route::get('/Request-{id}','ClientPortalHomeController@requests');
Route::post('/Request-Save/{id}','LastControl@saveReq');
Route::post('/GunRequest-Save/{id}','LastControl@saveGunReq');
Route::post('/AddGuardRequests-Save/{id}','LastControl@saveAddGuardReq');
Route::get('viewModal','AdditionalGuardRequesController@view')->name('addguardrequests.view');
Route::post('/GuardReplcRequest-Save/{id}','LastControl@saveGuardReplReqst');


Route::get('/ClientPortal-GunDelivery-view','ClientPortalHomeController@viewGunDel')->name('client.view.gunDel');
Route::get('/ClientPortal-GunDelivery-claim','ClientPortalHomeController@claimDeliveryModal')->name('client.claim.modal');
Route::post('/ClientPortal-GunDelivery-save','ClientPortalHomeController@saveClaim')->name('client.save.claim');
Route::get('/ClientPortal-GunDelivery-{id}','ClientPortalHomeController@gunDeliveries');
Route::get('/ClaimDeliveryModdal','ClientPortalHomeController@claimDeliveryModal')->name('claim.delivery.modal');
Route::post('/ClaimDelivery','ClientPortalHomeController@claimDelivery')->name('claim.delivery');
Route::post('GunDelivery-claim', 'GunDeliveryController@claim');

Route::get('/ClientPortalGuardsDTR-{id}','ClientPortalHomeController@guardDtr')->middleware('auth:client');
Route::get('/ClientPortalEstablishments-shifts+{id}','ClientPortalHomeController@shifts');
Route::get('/ClientPortalEstablishments-{id}','ClientPortalHomeController@clientEstablishments')->middleware('auth:client');

Route::get('/ClientPortalEstablishmentsDetails-{id}+{estabID}','ClientPortalHomeController@clientEstablishmentsdetails');

Route::get('/ClientPortalContracts-{id}+{estabID}','ClientPortalHomeController@clientContracts');

Route::get('/ClientPortalMessages-{id}','ClientPortalHomeController@messages')->middleware('auth:client');
Route::get('/ClientPortalMessages/modal/{messageID}','ClientPortalHomeController@messagesModal');
Route::get('/GuardPool+{tempDeploymentID}+{clientID}+{client_notif_id}','ClientPortalHomeController@guardPool');
Route::get('/GuardPool-save','ClientPortalHomeController@saveGuards')->name('saveguards');

Route::get('/ClientPortalSettings', function () {
	return view('ClientPortal/ClientPortalSettings');
});

Route::get('guardReplacementModal','ClientPortalHomeController@guardReplaceModal');
Route::get('/guardReplacement-getGuards','ClientPortalHomeController@getGuards');
Route::get('/guardReplacement-submit','ClientPortalHomeController@guardReplacementSubmit');

Route::get('/ClientPortalHome-{id}','ClientPortalHomeController@index')->middleware('auth:client');
Route::get('/ClientLogin','LastControl@clientAuth');
Route::post('/Client-auth','LastControl@authenticate');
Route::post('/Client-Qoute','ClientPortalHomeController@qout');

//Route::get('/Request','LastControl@login');
//Route::get('/Request-view','ServiceRequestController@view');

Auth::routes();


//Route::get('/ClientsReg','LastControl@index2');
//Route::post('ClientRegs/Save','LastControl@save');
//Route::get('/SendGun','LastControl@index3');
Route::post('/Billing-Start','BillingControl@BillingPeriod');
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



// Route::get ( '/Serv', 'ServiceController@readItems' );
// Route::post ( '/addService', 'ServiceController@addItem' );
// Route::post ( '/editService', 'ServiceController@editItem' );
// Route::post ( '/deleteService', 'ServiceController@deleteItem' );

// Route::get ( '/Nat', 'NatureController@readItems' );
// Route::post ( '/addNature', 'NatureController@addItem' );
// Route::post ( '/editNature', 'NatureController@editItem' );
// Route::post ( '/deleteNature', 'NatureController@deleteItem' );

// Route::get ( '/Lic', 'LicenseController@readItems' );
// Route::post ( '/addLicense', 'LicenseController@addItem' );
// Route::post ( '/editLicense', 'LicenseController@editItem' );
// Route::post ( '/deleteLicense', 'LicenseController@deleteItem' );

// Route::get ( '/Req', 'RequirementController@readItems' );
// Route::post ( '/addRequirement', 'RequirementController@addItem' );
// Route::post ( '/editRequirement', 'RequirementController@editItem' );
// Route::post ( '/deleteRequirement', 'RequirementController@deleteItem' );

// Route::get ( '/mes', 'MeasurementController@readItems' );
// Route::post ( '/addMeasurement', 'MeasurementController@addItem' );
// Route::post ( '/editMeasurement', 'MeasurementController@editItem' );
// Route::post ( '/deleteMeasurement', 'MeasurementController@deleteItem' );

// Route::get ( '/Att', 'AttributeController@readItems' );
// Route::post ( '/addAttribute', 'AttributeController@addItem' );
// Route::post ( '/editAttribute', 'AttributeController@editItem' );
// Route::post ( '/deleteAttribute', 'AttributeController@deleteItem' );

// Route::get ( '/Mil', 'MilitaryController@readItems' );
// Route::post ( '/addMilitary', 'MilitaryController@addItem' );
// Route::post ( '/editMilitary', 'MilitaryController@editItem' );
// Route::post ( '/deleteMilitary', 'MilitaryController@deleteItem' );

// Route::get ( '/Ran', 'RankController@readItems' );
// Route::post ( '/addRank', 'RankController@addItem' );
// Route::post ( '/editRank', 'RankController@editItem' );
// Route::post ( '/deleteRank', 'RankController@deleteItem' );

// Route::get ( '/Rol', 'RoleController@readItems' );
// Route::post ( '/addRole', 'RoleController@addItem' );
// Route::post ( '/editRole', 'RoleController@editItem' );
// Route::post ( '/deleteRole', 'RoleController@deleteItem' );

// Route::get ( '/Lea', 'LeaveController@readItems' );
// Route::post ( '/addLeave', 'LeaveController@addItem' );
// Route::post ( '/editLeave', 'LeaveController@editItem' );
// Route::post ( '/deleteLeave', 'LeaveController@deleteItem' );

// Route::get ( '/Prov', 'ProvinceController@readItems' );
// Route::post ( '/addProvince', 'ProvinceController@addItem' );
// Route::post ( '/editProvince', 'ProvinceController@editItem' );
// Route::post ( '/deleteProvince', 'ProvinceController@deleteItem' );

// Route::get ( '/Are', 'AreaController@readItems' );
// Route::post ( '/addArea', 'AreaController@addItem' );
// Route::post ( '/editArea', 'AreaController@editItem' );
// Route::post ( '/deleteArea', 'AreaController@deleteItem' );

// Route::get ( '/Gut', 'GuntypeController@readItems' );  ///  GuntypeController doesn't exists??
// Route::post ( '/addGuntype', 'GuntypeController@addItem' );
// Route::post ( '/editGuntype', 'GuntypeController@editItem' );
// Route::post ( '/deleteGuntype', 'GuntypeController@deleteItem' );

// Route::get ( '/Gu', 'GunController@readItems' );
// Route::post ( '/addGun', 'GunController@addItem' );
// Route::post ( '/editGun', 'GunController@editItem' );
// Route::post ( '/deleteGun', 'GunController@deleteItem' );

Route::get('Attribute2','Attribute2Controller@index');

//Guard side (evander)
Route::get ( '/test', 'RegisterControl@test' );
Route::post ( '/SecurityGuardsLogin', 'EmployeeAuthControl@login' );
Route::get ( '/SecurityGuardsLogOut', 'EmployeeAuthControl@logout' );
Route::get ( '/SecurityGuardsPortalHome', 'EmployeeControl@home' )->name('/SecurityGuardsPortalHome')->middleware('auth:employee');
Route::get('/SecurityGuardsPortalProfile', 'EmployeeControl@profile')->middleware('auth:employee');
Route::get('/SecurityGuardsPortalNotifications', 'EmployeeControl@notifications')->middleware('auth:employee');
Route::get('/SecurityGuardsPortalMessages', 'EmployeeControl@messages')->middleware('auth:employee');
Route::get('/SecurityGuardsPortalRequest', 'EmployeeControl@requests')->middleware('auth:employee');
Route::post('/GetLeaveInfo', 'EmployeeControl@leaveInfo');
Route::get ( '/SwapRequest', 'SwapControl@index' )->middleware('auth:employee');
Route::get ( '/SwapRequestStepTwo/{id}', 'SwapControl@two' )->middleware('auth:employee');
Route::post ( '/RequestSwap', 'SwapControl@three' )->middleware('auth:employee');
Route::post('/SaveLeaveRequest', 'EmployeeControl@saveLeave');
Route::get('/Admin-Guard-Leave', 'EmployeeControl@allLeave');
Route::post('/Guard-Leave-View', 'EmployeeControl@viewLeave2');
Route::post('/Admin-Leave-Accept', 'EmployeeControl@acceptLeave');
Route::post('/Guard-Leave-Accept', 'EmployeeControl@acceptLeave2');
Route::post('/Admin-Leave-Reject', 'EmployeeControl@rejectLeave');//dont put an auth here, both guard and admin use this link
Route::post('/Admin-Leave-End', 'EmployeeControl@endLeave');
Route::get('/View-Leave-Request', 'EmployeeControl@viewLeave');

// Earl :D ---------------------------------------------------------------------
Route::get('/SecurityGuardsPortalMessages/modal','EmployeeControl@showModal')->name('SGMessage.modal');
Route::post('/saveGuardResponse','EmployeeControl@saveResponse')->name('save.guard.response');
Route::post('/saveGuardReject','EmployeeControl@guardReject')->name('guard.reject');
Route::get('/getReason','EmployeeControl@getReason')->name('getreason');
Route::get('/openInbox','EmployeeControl@openInbox');

Route::get('/openInbox-rplc','EmployeeControl@openInboxReplace');
Route::post('/deleteMessage','EmployeeControl@deleteMessage');
// -- end Earl :D ----------------------------------------------------------------
Route::get('/SecurityGuardsPortalSettings', 'EmployeeControl@settings')->middleware('auth:employee');
Route::post ( '/EmployeeUpdateProfile', 'EmployeeControl@UpdateProfile' );
Route::post ( '/EmployeeUpdatePassword', 'EmployeeControl@UpdatePassword' );
Route::get('/SecurityGuardsPortalAttendance', 'EmployeeControl@attendance')->middleware('auth:employee');
Route::get('Guard-Registration','LastControl@index6');
Route::post ( '/GetProvinceAreas', 'AreaControl@getArea' );
Route::post('/RegisterEmployee','RegisterControl@employeeReg');
Route::post('/Applicant','RegisterControl@saveImage');
//admin guard (evander)
Route::post('/HireEmployee','RegisterControl@approve');
Route::post('/SendInterview','RegisterControl@interview');
Route::post('/HireEmployee2','RegisterControl@approve2');
Route::post('/HireOnlineEmployee','OnlineRegisterControl@approve');
Route::post('/RemoveApplicant','RegisterControl@remove');
Route::get('/SecuProfile/{id}', 'RegisterControl@secuProfile');
Route::post('/SaveIncidentReport','EmployeeControl@incident');
//
Route::get('send','sendEmail@send');
//log In
Route::get('/Login','ContractController@signin');
Route::post('/CLogin','ClientAuthControl@login');
Route::get('/ClientHome','ClientPortalHomeController@index')->name('/ClientHome')->middleware('auth:client');
Route::get('/ClientOut','ClientAuthControl@logout');

Route::get('/AdminLogIn', function () {
	return view('AdminLogIn');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/Client-Accept-Swap','SwapControl@clientaccept');
Route::post('/Guard-Accept-Swap','SwapControl@guardaccept');
Route::post('/Client-Reject-Swap','SwapControl@clientreject');
Route::post('/Guard-Reject-Swap','SwapControl@guardreject');
Route::post('/Send-License-Warning','RenewLicenseControl@sendWarning');
Route::post('/Update-License-Info','RenewLicenseControl@update');

Route::get('/Admin-Queries',"EmployeeQuery@index");
Route::post('/Admin-Queries-Employee',"EmployeeQuery@get");

//Public routes, no auths needed
Route::get('/OnlineRegistration', 'OnlineRegisterControl@index6');
Route::get ( '/OnlineRegisterImage', 'OnlineRegisterControl@test' );
Route::post('/OnlineApplicant','OnlineRegisterControl@saveImage');
Route::post('/OnlineApplicantRegister','OnlineRegisterControl@employeeReg');
