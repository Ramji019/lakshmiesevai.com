<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
    return view('welcome');
});


// Auth //

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('admin', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'register'])->name('register');
Route::post('saveregister', [CustomAuthController::class, 'saveregister'])->name('saveregister');
Route::post('savedistributorregister', [CustomAuthController::class, 'savedistributorregister'])->name('savedistributorregister');
Route::post('saveretailerregister', [CustomAuthController::class, 'saveretailerregister'])->name('saveretailerregister');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/home', [App\Http\Controllers\UserController::class, 'index']);

Route::get('addcustomer', [App\Http\Controllers\UserController::class, 'addcustomer']);

Route::get('customers', [App\Http\Controllers\UserController::class, 'customers']);

Route::get('/admins', [App\Http\Controllers\UserController::class, 'admins'])->name('admins');

Route::post('updatecustomer', [App\Http\Controllers\UserController::class, 'updatecustomer']);

Route::post('savecustomer', [App\Http\Controllers\UserController::class, 'savecustomer']);

Route::get('/editcustomer/{id}', [App\Http\Controllers\UserController::class, 'editcustomer'])->name('editcustomer');

Route::post('updatecustomer', [App\Http\Controllers\UserController::class, 'updatecustomer']);

Route::get('dropcustomer/{id}', [App\Http\Controllers\UserController::class, 'dropcustomer']);

Route::get('documents/{id}', [App\Http\Controllers\UserController::class, 'documents']);

Route::post('adddocument', [App\Http\Controllers\UserController::class, 'adddocument']);

Route::get('profile', [App\Http\Controllers\UserController::class, 'Profile']);

Route::post('updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile']);

Route::post('/checkemail', [App\Http\Controllers\UserController::class, 'checkemail']);

Route::post('/checkaadhar', [App\Http\Controllers\UserController::class, 'checkaadhar']);

Route::post('/checkphone', [App\Http\Controllers\UserController::class, 'checkphone']);

Route::post('/checkpan', [App\Http\Controllers\UserController::class, 'checkpan']);

Route::get('/gettaluk/{distid}', [App\Http\Controllers\UserController::class, 'gettaluk'])->name('gettaluk');

Route::get('/getpanchayath/{taluk_id}', [App\Http\Controllers\UserController::class, 'getpanchayath'])->name('getpanchayath');

Route::post('/checkemailregister', [App\Http\Controllers\UserController::class, 'checkemailregister']);

Route::post('/checkaadharregister', [App\Http\Controllers\UserController::class, 'checkaadharregister']);

Route::post('/checkphoneregister', [App\Http\Controllers\UserController::class, 'checkphoneregister']);

Route::post('/checkpanregister', [App\Http\Controllers\UserController::class, 'checkpanregister']);

Route::post('/checkemailregisterretailer', [App\Http\Controllers\UserController::class, 'checkemailregisterretailer']);

Route::post('/checkaadharregisterretailer', [App\Http\Controllers\UserController::class, 'checkaadharregisterretailer']);

Route::post('/checkphoneregisterretailer', [App\Http\Controllers\UserController::class, 'checkphoneregisterretailer']);

Route::post('/checkpanregisterretailer', [App\Http\Controllers\UserController::class, 'checkpanregisterretailer']);

Route::post('/checkemailregistercustomer', [App\Http\Controllers\UserController::class, 'checkemailregistercustomer']);

Route::post('/checkaadharregistercustomer', [App\Http\Controllers\UserController::class, 'checkaadharregistercustomer']);

Route::post('/checkphoneregistercustomer', [App\Http\Controllers\UserController::class, 'checkphoneregistercustomer']);

Route::post('/updatecustomererusertype', [App\Http\Controllers\UserController::class, 'updatecustomererusertype']);



Route::get('addretailer', [App\Http\Controllers\RetailerController::class, 'Addretailer']);
Route::get('testapi', [App\Http\Controllers\RetailerController::class, 'testapi']);

Route::post('saveretailer', [App\Http\Controllers\RetailerController::class, 'saveretailer']);

Route::get('retailers', [App\Http\Controllers\RetailerController::class, 'Retailer']);

Route::get('addretailer', [App\Http\Controllers\RetailerController::class, 'Addretailer']);

Route::get('retailer', [App\Http\Controllers\RetailerController::class, 'Retailer']);

Route::get('dropretailer/{id}', [App\Http\Controllers\RetailerController::class, 'dropretailer']);

Route::post('updateretailer', [App\Http\Controllers\RetailerController::class, 'updateretailer']);

Route::post('updatestatus', [App\Http\Controllers\RetailerController::class, 'updatestatus']);

Route::post('adminstatusupdate', [App\Http\Controllers\RetailerController::class, 'adminstatusupdate']);

Route::post('retailerstatusupdate', [App\Http\Controllers\RetailerController::class, 'retailerstatusupdate']);

Route::post('updateretailerusertype', [App\Http\Controllers\RetailerController::class, 'updateretailerusertype']);


Route::get('adddistributor', [App\Http\Controllers\DistributorController::class, 'adddistributor']);

Route::get('distributors', [App\Http\Controllers\DistributorController::class, 'distributors']);

Route::post('savedistributor', [App\Http\Controllers\DistributorController::class, 'savedistributor']);

Route::post('updatedistributor', [App\Http\Controllers\DistributorController::class, 'updatedistributor']);

Route::get('dropdistributor/{id}', [App\Http\Controllers\DistributorController::class, 'dropdistributor']);

Route::post('statusupdate', [App\Http\Controllers\DistributorController::class, 'statusupdate']);
Route::post('updateusertype', [App\Http\Controllers\DistributorController::class, 'updateusertype']);


Route::get('retailer', [App\Http\Controllers\walletController::class, 'Retailer']);

Route::get('wallet', [App\Http\Controllers\WalletController::class, 'index']);

Route::get('paymentrequest', [App\Http\Controllers\WalletController::class, 'paymentrequest']);

Route::get('rawallet', [App\Http\Controllers\WalletController::class, 'rawallet']);

Route::get('rapaymentrequest', [App\Http\Controllers\WalletController::class, 'rapaymentrequest']);

Route::get('requestpayment', [App\Http\Controllers\WalletController::class, 'requestpayment']);

Route::post('saverequest', [App\Http\Controllers\WalletController::class, 'saverequest']);

Route::post('ramjisaverequest', [App\Http\Controllers\WalletController::class, 'ramjisaverequest']);

Route::post('/adminaddwallet', [App\Http\Controllers\WalletController::class, 'adminaddwallet'])->name('adminaddwallet');

Route::post('/superadminaddwallet', [App\Http\Controllers\WalletController::class, 'superadminaddwallet'])->name('superadminaddwallet');


Route::get('/declinerequest_payment/{id}', [App\Http\Controllers\PaymentsController::class, 'declinerequest_payment'])->name('declinerequest_payment');
Route::post('/approvepayment', [App\Http\Controllers\PaymentsController::class, 'approvepayment'])->name('approvepayment');
Route::post('/approveramjipayment', [App\Http\Controllers\PaymentsController::class, 'approveramjipayment'])->name('approveramjipayment');


Route::get('service', [App\Http\Controllers\ServiceController::class, 'service']);

Route::get('ourservice', [App\Http\Controllers\ServiceController::class, 'ourservice']);

Route::get('viewcanservice', [App\Http\Controllers\ServiceController::class, 'viewcanservice']);

Route::get('viewpattaservice', [App\Http\Controllers\ServiceController::class, 'viewpattaservice']);

Route::get('viewcourseservice', [App\Http\Controllers\ServiceController::class, 'viewcourseservice']);

Route::get('viewvoter', [App\Http\Controllers\ServiceController::class, 'viewvoter']);

Route::get('/utislpanservices', [App\Http\Controllers\ServiceController::class, 'utislpanservices'])->name('utislpanservices');

Route::get('/viewsoftware', [App\Http\Controllers\ServiceController::class, 'viewsoftware'])->name('viewsoftware');

Route::post('/submitutislnew', [App\Http\Controllers\ServiceController::class, 'submitutislnew'])->name('submitutislnew');

Route::get('allservice/{customerid}', [App\Http\Controllers\ServiceController::class, 'allservice']);

Route::get('allservices', [App\Http\Controllers\ServiceController::class, 'allservices']);

Route::get('subservice/{id}', [App\Http\Controllers\ServiceController::class, 'subservice']);

Route::post('addsubservice', [App\Http\Controllers\ServiceController::class, 'addsubservice']);

Route::post('updatesubservice', [App\Http\Controllers\ServiceController::class, 'updatesubservice']);

Route::get('viewservice', [App\Http\Controllers\ServiceController::class, 'viewservice']);

Route::post('addservice', [App\Http\Controllers\ServiceController::class, 'addservice']);

Route::post('updateservice', [App\Http\Controllers\ServiceController::class, 'updateservice']);

Route::get('dropservice/{id}', [App\Http\Controllers\ServiceController::class, 'dropservice']);

Route::get('dropsubservice/{id}', [App\Http\Controllers\ServiceController::class, 'dropsubservice']);

Route::get('services/{serviceid}/{customerid}', [App\Http\Controllers\ServiceController::class, 'services']);

Route::get('servicesone/{serviceid}', [App\Http\Controllers\ServiceController::class, 'servicesone']);

Route::post('submit_applyservice', [App\Http\Controllers\ServiceController::class, 'submit_applyservice']);

Route::get('get_subservice/{parentid}', [App\Http\Controllers\ServiceController::class, 'get_subservice']);

Route::get('application', [App\Http\Controllers\ServiceController::class, 'application']);

Route::get('viewapplication/{serviceid}', [App\Http\Controllers\ServiceController::class, 'viewapplication']);


Route::get('/appliedservice/{status}', [App\Http\Controllers\ServicestatusController::class, 'appliedservice'])->name('appliedservice');
Route::get('/servicestatus/{status}/{id}/{serviceid}', [App\Http\Controllers\ServicestatusController::class, 'servicestatus'])->name('servicestatus');

Route::get('applyservice/{serviceid}/{customerid}', [App\Http\Controllers\ServiceController::class, 'applyservice']);

Route::get('applyservices/{serviceid}', [App\Http\Controllers\ServiceController::class, 'applyservices']);

Route::get('service/get_taluk/{distid}', [App\Http\Controllers\ServiceController::class, 'get_taluk'])->name('gettaluk');
Route::get('service/get_panchayath/{taluk_id}', [App\Http\Controllers\ServiceController::class, 'get_panchayath'])->name('getpanchayath');

// ApplyService
Route::post('/submitapply_tnegaservices1', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices1'])->name('submitapply_tnegaservices1');
Route::post('/submitapply_tnegaservices2', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices2'])->name('submitapply_tnegaservices2');
Route::post('/submitapply_tnegaservices3', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices3'])->name('submitapply_tnegaservices3');
Route::post('/submitapply_tnegaservices4', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices4'])->name('submitapply_tnegaservices4');
Route::post('/submitapply_tnegaservices5', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices5'])->name('submitapply_tnegaservices5');
Route::post('/submitapply_tnegaservices6', [App\Http\Controllers\ServiceController::class, 'submitapply_tnegaservices6'])->name('submitapply_tnegaservices6');
Route::post('/submitapply_msme', [App\Http\Controllers\ServiceController::class, 'submitapply_msme'])->name('submitapply_msme');
Route::post('/submitapply_itr', [App\Http\Controllers\ServiceController::class, 'submitapply_itr'])->name('submitapply_itr');
Route::post('/submitapply_gst', [App\Http\Controllers\ServiceController::class, 'submitapply_gst'])->name('submitapply_gst');
Route::post('/submitapply_tecexam', [App\Http\Controllers\ServiceController::class, 'submitapply_tecexam'])->name('submitapply_tecexam');
Route::post('/submitapply_teccorrection', [App\Http\Controllers\ServiceController::class, 'submitapply_teccorrection'])->name('submitapply_teccorrection');
Route::post('/submittecexam_register', [App\Http\Controllers\ServiceController::class, 'submittecexam_register'])->name('submittecexam_register');
Route::post('/submitsmartcard_register', [App\Http\Controllers\ServiceController::class, 'submitsmartcard_register'])->name('submitsmartcard_register');
Route::post('/submitaadhaar', [App\Http\Controllers\ServiceController::class, 'submitaadhaar'])->name('submitaadhaar');
Route::post('/submitfindaadhaar_number', [App\Http\Controllers\ServiceController::class, 'submitfindaadhaar_number'])->name('submitfindaadhaar_number');
Route::post('/submitapply_canedit', [App\Http\Controllers\ServiceController::class, 'submitapply_canedit'])->name('submitapply_canedit');
Route::post('/submitsmartcardapply1', [App\Http\Controllers\ServiceController::class, 'submitsmartcardapply1'])->name('submitsmartcardapply1');
Route::post('/bondsubmit', [App\Http\Controllers\ServiceController::class, 'bondsubmit'])->name('bondsubmit');
Route::post('/submitvoterid', [App\Http\Controllers\ServiceController::class, 'submitvoterid'])->name('submitvoterid');
Route::post('/submit_fssaiservice', [App\Http\Controllers\ServiceController::class, 'submit_fssaiservice'])->name('submit_fssaiservice');
Route::post('/submitapply_covid', [App\Http\Controllers\ServiceController::class, 'submitapply_covid'])->name('submitapply_covid');
Route::post('/submitapply_nalavariyam', [App\Http\Controllers\ServiceController::class, 'submitapply_nalavariyam'])->name('submitapply_nalavariyam');
Route::post('/submitapply_driving_license', [App\Http\Controllers\ServiceController::class, 'submitapply_driving_license'])->name('submitapply_driving_license');
Route::post('/submitapply_pancard', [App\Http\Controllers\ServiceController::class, 'submitapply_pancard'])->name('submitapply_pancard');
Route::post('/submitapply_tailorshop', [App\Http\Controllers\ServiceController::class, 'submitapply_tailorshop'])->name('submitapply_tailorshop');
Route::post('/submitapply_birthcertificate', [App\Http\Controllers\ServiceController::class, 'submitapply_birthcertificate'])->name('submitapply_birthcertificate');
Route::post('/savepmkissan', [App\Http\Controllers\ServiceController::class, 'savepmkissan'])->name('savepmkissan');
Route::post('/submitapply_csc_tec', [App\Http\Controllers\ServiceController::class, 'submitapply_csc_tec'])->name('submitapply_csc_tec');
Route::post('/submitapply_insexam', [App\Http\Controllers\ServiceController::class, 'submitapply_insexam'])->name('submitapply_insexam');
Route::post('/submitapply_iibf_exam_register', [App\Http\Controllers\ServiceController::class, 'submitapply_iibf_exam_register'])->name('submitapply_iibf_exam_register');
Route::post('/submitapply_rapexam', [App\Http\Controllers\ServiceController::class, 'submitapply_rapexam'])->name('submitapply_rapexam');
Route::post('/submitapply_vle_insurance', [App\Http\Controllers\ServiceController::class, 'submitapply_vle_insurance'])->name('submitapply_vle_insurance');
Route::post('/submitapply_medicalscheme', [App\Http\Controllers\ServiceController::class, 'submitapply_medicalscheme'])->name('submitapply_medicalscheme');
Route::post('/submitapply_dharsan', [App\Http\Controllers\ServiceController::class, 'submitapply_dharsan'])->name('submitapply_dharsan');
Route::post('/submitapply_patta', [App\Http\Controllers\ServiceController::class, 'submitapply_patta'])->name('submitapply_patta');
Route::post('/submitutisl_corection', [App\Http\Controllers\ServiceController::class, 'submitutisl_corection'])->name('submitutisl_corection');
Route::get('pancard_reapply/{txid}', [App\Http\Controllers\ServiceController::class, 'pancard_reapply']);


// Update Status
Route::post('/submit_statusupdate_smallagriservice', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_smallagriservice'])->name('submit_statusupdate_smallagriservice');
Route::post('/submit_statusupdate_incomecertificate', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_incomecertificate'])->name('submit_statusupdate_incomecertificate');
Route::post('/submit_statusupdate_tnegaservices1', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices1'])->name('submit_statusupdate_tnegaservices1');
Route::post('/submit_statusupdate_tnegaservices2', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices2'])->name('submit_statusupdate_tnegaservices2');
Route::post('/submit_statusupdate_tnegaservices3', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices3'])->name('submit_statusupdate_tnegaservices3');
Route::post('/submit_statusupdate_tnegaservices4', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices4'])->name('submit_statusupdate_tnegaservices4');
Route::post('/submit_statusupdate_tnegaservices5', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices5'])->name('submit_statusupdate_tnegaservices5');
Route::post('/submit_statusupdate_tnegaservices6', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tnegaservices6'])->name('submit_statusupdate_tnegaservices6');
Route::post('/submit_statusupdate_msme', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_msme'])->name('submit_statusupdate_msme');
Route::post('/submit_statusupdate_itr', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_itr'])->name('submit_statusupdate_itr');
Route::post('/submit_statusupdate_gst', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_gst'])->name('submit_statusupdate_gst');
Route::post('/submit_statusupdate_tecexam', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tecexam'])->name('submit_statusupdate_tecexam');
Route::post('/submit_statusupdate_teccorrection', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_teccorrection'])->name('submit_statusupdate_teccorrection');
Route::post('/submit_statusupdate_tecexamregister', [App\Http\Controllers\ServicestatusController::class, 'submit_statusupdate_tecexamregister'])->name('submit_statusupdate_tecexamregister');
Route::post('/submitsmartcard_register_update', [App\Http\Controllers\ServicestatusController::class, 'submitsmartcard_register_update'])->name('submitsmartcard_register_update');
Route::post('/aadhaarcardupdate', [App\Http\Controllers\ServicestatusController::class, 'aadhaarcardupdate'])->name('aadhaarcardupdate');
Route::post('/findaadhaar_numberupdate', [App\Http\Controllers\ServicestatusController::class, 'findaadhaar_numberupdate'])->name('findaadhaar_numberupdate');
Route::post('/caneditupdate', [App\Http\Controllers\ServicestatusController::class, 'caneditupdate'])->name('caneditupdate');
Route::post('/smartcard_update1', [App\Http\Controllers\ServicestatusController::class, 'smartcard_update1'])->name('smartcard_update1');
Route::post('/bond_update', [App\Http\Controllers\ServicestatusController::class, 'bond_update'])->name('bond_update');
Route::post('/voterid_update', [App\Http\Controllers\ServicestatusController::class, 'voterid_update'])->name('voterid_update');
Route::post('/fssaiservice_update', [App\Http\Controllers\ServicestatusController::class, 'fssaiservice_update'])->name('fssaiservice_update');
Route::post('/covid_update', [App\Http\Controllers\ServicestatusController::class, 'covid_update'])->name('covid_update');
Route::post('/nalavariyam_update', [App\Http\Controllers\ServicestatusController::class, 'nalavariyam_update'])->name('nalavariyam_update');
Route::post('/driving_license_update', [App\Http\Controllers\ServicestatusController::class, 'driving_license_update'])->name('driving_license_update');
Route::post('/pancard_update', [App\Http\Controllers\ServicestatusController::class, 'pancard_update'])->name('pancard_update');
Route::post('/tailorshop_update', [App\Http\Controllers\ServicestatusController::class, 'tailorshop_update'])->name('tailorshop_update');
Route::post('/update_pmkissan', [App\Http\Controllers\ServicestatusController::class, 'update_pmkissan'])->name('update_pmkissan');
Route::post('/birthcertificate_update', [App\Http\Controllers\ServicestatusController::class, 'birthcertificate_update'])->name('birthcertificate_update');
Route::post('/tec_csc_update', [App\Http\Controllers\ServicestatusController::class, 'tec_csc_update'])->name('tec_csc_update');
Route::post('/insexam_update', [App\Http\Controllers\ServicestatusController::class, 'insexam_update'])->name('insexam_update');
Route::post('/iibfexam_update', [App\Http\Controllers\ServicestatusController::class, 'iibfexam_update'])->name('iibfexam_update');
Route::post('/rapexam_update', [App\Http\Controllers\ServicestatusController::class, 'rapexam_update'])->name('rapexam_update');
Route::post('/vleinsurance_update', [App\Http\Controllers\ServicestatusController::class, 'vleinsurance_update'])->name('vleinsurance_update');
Route::post('/medicalscheme_update', [App\Http\Controllers\ServicestatusController::class, 'medicalscheme_update'])->name('medicalscheme_update');
Route::post('/dharsan_update', [App\Http\Controllers\ServicestatusController::class, 'dharsan_update'])->name('dharsan_update');
Route::post('/patta_update', [App\Http\Controllers\ServicestatusController::class, 'patta_update'])->name('patta_update');
Route::post('/utislupdate', [App\Http\Controllers\ServicestatusController::class, 'utislupdate'])->name('utislupdate');
Route::post('/utislcorection_update', [App\Http\Controllers\ServicestatusController::class, 'utislcorection_update'])->name('utislcorection_update');


// Service Payment

Route::get('/servicepayment/{serviceid}', [App\Http\Controllers\ServicePaymentController::class, 'servicepayment'])->name('servicepayment');

Route::post('/addservice_payment', [App\Http\Controllers\ServicePaymentController::class, 'addservice_payment'])->name('addservice_payment');

Route::get('/smartcardpayment/{serviceid}', [App\Http\Controllers\ServicePaymentController::class, 'smartcardpayment'])->name('smartcardpayment');

Route::get('/get_smartcard_payment/{talukid}/{serviceid}', [App\Http\Controllers\ServicePaymentController::class, 'get_smartcard_payment'])->name('get_smartcard_payment');

Route::post('/savesmart_payment', [App\Http\Controllers\ServicePaymentController::class, 'savesmart_payment'])->name('savesmart_payment');

Route::get('/findpayment', [App\Http\Controllers\ServicePaymentController::class, 'findpayment'])->name('findpayment');

Route::post('addfind_payment', [App\Http\Controllers\ServicePaymentController::class, 'addfind_payment'])->name('addfind_payment');

Route::get('/rechargepayment/{serviceid}', [App\Http\Controllers\ServicePaymentController::class, 'rechargepayment'])->name('rechargepayment');

Route::post('addrecharge_payment', [App\Http\Controllers\ServicePaymentController::class, 'addrecharge_payment'])->name('addrecharge_payment');

Route::get('/panservicepayment', [App\Http\Controllers\ServicePaymentController::class, 'panservicepayment'])->name('panservicepayment');

Route::post('addpan_payment', [App\Http\Controllers\ServicePaymentController::class, 'addpan_payment'])->name('addpan_payment');

Route::get('/coursepayment', [App\Http\Controllers\ServicePaymentController::class, 'coursepayment'])->name('coursepayment');

Route::post('addcourse_payment', [App\Http\Controllers\ServicePaymentController::class, 'addcourse_payment'])->name('addcourse_payment');


// Recharge Controller

Route::post('proceedrecharge', [App\Http\Controllers\RechargeController::class, 'proceedrecharge']);
Route::get('rechargehook', [App\Http\Controllers\RechargeController::class, 'rechargehook']);

Route::get('/utility', [App\Http\Controllers\RechargeController::class, 'utility'])->name('utility');
Route::get('/utilityservice/{serviceid}', [App\Http\Controllers\RechargeController::class, 'utilityservice'])->name('utilityservice');
Route::post('proceedrecharge', [App\Http\Controllers\RechargeController::class, 'proceedrecharge']);
Route::get('rechargehook', [App\Http\Controllers\RechargeController::class, 'rechargehook']);
Route::get('panstatus', [App\Http\Controllers\ServiceController::class, 'panstatus']);
Route::get('pancard_reapply/{txid}', [App\Http\Controllers\ServiceController::class, 'pancard_reapply']);

// PDF Controller
Route::get('/getcaptcha', [App\Http\Controllers\PDFServiceController::class, 'getcaptcha'])->name('getcaptcha');
Route::post('/submitaadhaar_verify', [App\Http\Controllers\PDFServiceController::class, 'submitaadhaar_verify'])->name('submitaadhaar_verify');

Route::get('/applypdfservice/{serviceid}', [App\Http\Controllers\PDFServiceController::class, 'applypdfservice'])->name('applypdfservice');
Route::get('/addfindservice', [App\Http\Controllers\PDFServiceController::class, 'addfindservice'])->name('addfindservice');
Route::post('/savefind', [App\Http\Controllers\PDFServiceController::class, 'savefind'])->name('savefind');
Route::post('/updatefind', [App\Http\Controllers\PDFServiceController::class, 'updatefind'])->name('updatefind');
Route::get('/viewfind', [App\Http\Controllers\PDFServiceController::class, 'viewfind'])->name('viewfind');

Route::post('/updatestatus', [App\Http\Controllers\PDFServiceController::class, 'updatestatus'])->name('updatestatus');

Route::get('/pdfservices', [App\Http\Controllers\PDFServiceController::class, 'pdfservices'])->name('pdfservices');

Route::post('/submitpanfind', [App\Http\Controllers\PDFServiceController::class, 'submitpanfind'])->name('submitpanfind');
Route::post('/submitdlfind', [App\Http\Controllers\PDFServiceController::class, 'submitdlfind'])->name('submitdlfind');
Route::post('/submitrcfind', [App\Http\Controllers\PDFServiceController::class, 'submitrcfind'])->name('submitrcfind');
Route::post('/submitrationfind', [App\Http\Controllers\PDFServiceController::class, 'submitrationfind'])->name('submitrationfind');
Route::post('/submitpanadvance', [App\Http\Controllers\PDFServiceController::class, 'submitpanadvance'])->name('submitpanadvance');

Route::post('/submitvoterfind', [App\Http\Controllers\PDFServiceController::class, 'submitvoterfind'])->name('submitvoterfind');

Route::post('/savevoter', [App\Http\Controllers\PDFServiceController::class, 'savevoter'])->name('savevoter');

Route::get('/getepic/{epic_no}', [App\Http\Controllers\PDFServiceController::class, 'getepic'])->name('getepic');

Route::get('/getotp/{otp}', [App\Http\Controllers\PDFServiceController::class, 'getotp'])->name('getotp');

Route::get('/getpdfotp/{epic_no}', [App\Http\Controllers\PDFServiceController::class, 'getpdfotp'])->name('getpdfotp');

Route::post('/submitvoterpdf', [App\Http\Controllers\PDFServiceController::class, 'submitvoterpdf'])->name('submitvoterpdf');

//PermissionController

Route::get('/userpermission/{userid}', [App\Http\Controllers\PermissionController::class, 'userpermission'])->name('userpermission');
Route::post('/savepermission', [App\Http\Controllers\PermissionController::class, 'savepermission'])->name('savepermission');


Route::get('/utility', [App\Http\Controllers\RechargeController::class, 'utility'])->name('utility');
Route::get('/utilityservice/{serviceid}', [App\Http\Controllers\RechargeController::class, 'utilityservice'])->name('utilityservice');
Route::post('proceedrecharge', [App\Http\Controllers\RechargeController::class, 'proceedrecharge']);
Route::get('rechargehook', [App\Http\Controllers\RechargeController::class, 'rechargehook']);
Route::get('panstatus', [App\Http\Controllers\ServiceController::class, 'panstatus']);
Route::get('pancard_reapply/{txid}', [App\Http\Controllers\ServiceController::class, 'pancard_reapply']);

//UtilityController

Route::get('/addutilityservice', [App\Http\Controllers\UtilityController::class, 'addutilityservice'])->name('addutilityservice');
Route::post('/saveutility', [App\Http\Controllers\UtilityController::class, 'saveutility'])->name('saveutility');
Route::post('/updateutility', [App\Http\Controllers\UtilityController::class, 'updateutility'])->name('updateutility');
Route::get('/viewutility', [App\Http\Controllers\UtilityController::class, 'viewutility'])->name('viewutility');

Route::post('/updatestatusuti', [App\Http\Controllers\UtilityController::class, 'updatestatusuti'])->name('updatestatusuti');

//OperatorController

Route::get('/operator/{id}', [App\Http\Controllers\OperatorController::class, 'operator'])->name('operator');
Route::get('/viewoperators', [App\Http\Controllers\OperatorController::class, 'viewoperators'])->name('viewoperators');
Route::post('/addoperator', [App\Http\Controllers\OperatorController::class, 'addoperator'])->name('addoperator');
Route::post('/updateoperator', [App\Http\Controllers\OperatorController::class, 'updateoperator'])->name('updateoperator');
Route::get('/deleteoperator/{id}', [App\Http\Controllers\OperatorController::class, 'deleteoperator'])->name('deleteoperator');

//PanController

Route::get('/addpan', [App\Http\Controllers\PanController::class, 'addpan'])->name('addpan');

Route::get('/viewpan', [App\Http\Controllers\PanController::class, 'viewpan'])->name('viewpan');

Route::post('/savepan', [App\Http\Controllers\PanController::class, 'savepan'])->name('savepan');

Route::post('/updatepan', [App\Http\Controllers\PanController::class, 'updatepan'])->name('updatepan');

Route::get('/panservices', [App\Http\Controllers\PanController::class, 'panservices'])->name('panservices');

Route::get('/applypanservice/{serviceid}', [App\Http\Controllers\PanController::class, 'applypanservice'])->name('applypanservice');

Route::post('/submitnewpancard', [App\Http\Controllers\PanController::class, 'submitnewpancard'])->name('submitnewpancard');
Route::post('/submitpancorrection', [App\Http\Controllers\PanController::class, 'submitpancorrection'])->name('submitpancorrection');
Route::get('pancard_reapply/{txid}/{serviceid}', [App\Http\Controllers\PanController::class, 'pancard_reapply']);

//CourseController

Route::get('/addcourse', [App\Http\Controllers\CourseController::class, 'addcourse'])->name('addcourse');

Route::get('/viewcourse', [App\Http\Controllers\CourseController::class, 'viewcourse'])->name('viewcourse');

Route::post('/savecourse', [App\Http\Controllers\CourseController::class, 'savecourse'])->name('savecourse');

Route::post('/updatecourse', [App\Http\Controllers\CourseController::class, 'updatecourse'])->name('updatecourse');

Route::get('/courses', [App\Http\Controllers\CourseController::class, 'courses'])->name('courses');

Route::get('/applycourseservice/{serviceid}', [App\Http\Controllers\CourseController::class, 'applycourseservice'])->name('applycourseservice');

// Software

Route::get('softwareservices/{serviceid}', [App\Http\Controllers\RechargeController::class, 'softwareservices']);
Route::post('/submitapply_software', [App\Http\Controllers\RechargeController::class, 'submitapply_software'])->name('submitapply_software');
Route::post('/software_update', [App\Http\Controllers\ServicestatusController::class, 'software_update'])->name('software_update');


