<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoutePermissionController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\MerchandiserController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\RwandaController;
use App\Http\Controllers\Api\OrganController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\SistercompanyController;
use App\Http\Controllers\Api\BrandAmbassadorController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProductcategoryController;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\VariantController;
use App\Http\Controllers\Api\SkuController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\TmobjectiveController;
use App\Http\Controllers\Api\TmproductController;
use App\Http\Controllers\Api\TmchannelController;
use App\Http\Controllers\Api\TmcompetitorController;
use App\Http\Controllers\Api\TmcompetitorofferingController;
use App\Http\Controllers\Api\TmtargetaudienceController;
use App\Http\Controllers\Api\TmpositioningController;
use App\Http\Controllers\Api\TmmessageController;
use App\Http\Controllers\Api\TmpriceController;
use App\Http\Controllers\Api\TmstrategyController;
use App\Http\Controllers\Api\TmpartnershipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login']);
    Route::post('signup',[AuthController::class,'signup']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('me',[AuthController::class,'me']);
    // Route::get('userdetails',[AuthController::class,'userdetails']);
   

});

//Roles resource route
Route::resource('/roles', RoleController::class);

//Check route permission controller
Route::get('/confirmation/{userName}',[RoutePermissionController::class,'checkpermission']);


//Permission routes
Route::post('/create-permission/{id}',[PermissionController::class,'createpermission']);
Route::get('/view-users/{id}',[PermissionController::class,'viewusers']);
Route::get('/viewpermission',[PermissionController::class,'viewpermission']);
Route::get('/edit-permission/{id}',[PermissionController::class,'showpermission']);
Route::put('/update-permission/{id}',[PermissionController::class,'updatepermission']);
Route::delete('/deletepermission/{id}',[PermissionController::class,'destroypermission']);

Route::resource('/currency', CurrencyController::class);
Route::resource('/country', CountryController::class);
Route::resource('/levels', LevelController::class);

Route::resource('/merchandiser', MerchandiserController::class);



//Geography route
Route::get('/rwandaprovinces',[RwandaController::class,'provincedetails']);
Route::get('/viewdistricts/{id}',[RwandaController::class,'viewdistricts']);
Route::get('/viewsectors/{id}',[RwandaController::class,'viewsectors']);
Route::get('/viewcells/{id}',[RwandaController::class,'viewcells']);
Route::get('/viewstreets/{id}',[RwandaController::class,'viewstreets']);

//Company routes
Route::post('/create-company',[CompanyController::class,'createcompany']);
Route::get('/viewcompany/{id}',[CompanyController::class,'viewcompany']);
Route::delete('/deletecompany/{id}',[CompanyController::class,'destroycompany']);
Route::get('/edit-company/{id}',[CompanyController::class,'showcompany']);
Route::put('/update-company/{id}',[CompanyController::class,'updatecompany']);


//Business organs routes
Route::post('/create-organ',[OrganController::class,'createorgan']);
Route::get('/vieworgans/{id}',[OrganController::class,'vieworgans']);
Route::delete('/deleteorgan/{id}',[OrganController::class,'destroyorgan']);
Route::get('/edit-organ/{id}',[OrganController::class,'showorgan']);
Route::put('/update-organ/{id}',[OrganController::class,'updateorgan']);

Route::post('/assign-organ',[OrganController::class,'assignorgan']);
Route::get('/vieworgandetails/{id}',[OrganController::class,'vieworgandetails']);
Route::delete('/deleteorganassignment/{id}',[OrganController::class,'destroyorganassignment']);


//Business leads routes
Route::post('/create-lead',[LeadController::class,'createlead']);
Route::get('/viewleads/{id}',[LeadController::class,'viewleads']);
Route::get('/edit-lead/{id}',[LeadController::class,'showlead']);
Route::put('/update-lead/{id}',[LeadController::class,'updatelead']);
Route::delete('/deletelead/{id}',[LeadController::class,'destroylead']);

//Customer routes
Route::post('/create-customer',[CustomerController::class,'createcustomer']);
Route::get('/viewcustomers/{id}',[CustomerController::class,'viewcustomers']);
Route::get('/edit-customer/{id}',[CustomerController::class,'showcustomer']);
Route::put('/update-customer/{id}',[CustomerController::class,'updatecustomer']);
Route::delete('/deletecustomer/{id}',[CustomerController::class,'destroycustomer']);

//Vendor routes
Route::post('/create-vendor',[VendorController::class,'createvendor']);
Route::get('/viewvendors/{id}',[VendorController::class,'viewvendors']);
Route::get('/edit-vendor/{id}',[VendorController::class,'showvendor']);
Route::put('/update-vendor/{id}',[VendorController::class,'updatevendor']);
Route::delete('/deletevendor/{id}',[VendorController::class,'destroyvendor']);

//Sister company routes
Route::post('/create-sister',[SistercompanyController::class,'createsister']);
Route::get('/viewsisters/{id}',[SistercompanyController::class,'viewsisters']);
Route::get('/edit-sister/{id}',[SistercompanyController::class,'showsister']);
Route::put('/update-sister/{id}',[SistercompanyController::class,'updatesister']);
Route::delete('/deletesister/{id}',[SistercompanyController::class,'destroysister']);

//Brand ambassador routes
Route::post('/create-ambassador',[BrandAmbassadorController::class,'createambassador']);
Route::get('/viewambassadors/{id}',[BrandAmbassadorController::class,'viewambassadors']);
Route::get('/edit-ambassador/{id}',[BrandAmbassadorController::class,'showambassador']);
Route::put('/update-ambassador/{id}',[BrandAmbassadorController::class,'updateambassador']);
Route::delete('/deleteambassador/{id}',[BrandAmbassadorController::class,'destroyambassador']);

//Employee routes
Route::post('/create-employee',[EmployeeController::class,'createemployee']);
Route::get('/viewemployees/{id}',[EmployeeController::class,'viewemployees']);
Route::get('/edit-employee/{id}',[EmployeeController::class,'showemployee']);
Route::put('/update-employee/{id}',[EmployeeController::class,'updateemployee']);
Route::delete('/deleteemployee/{id}',[EmployeeController::class,'destroyemployee']);


//Project routes
Route::post('/create-project',[ProjectController::class,'createproject']);
Route::get('/viewprojects/{id}',[ProjectController::class,'viewprojects']);
Route::get('/edit-project/{id}',[ProjectController::class,'showproject']);
Route::put('/update-project/{id}',[ProjectController::class,'updateproject']);
Route::delete('/deleteproject/{id}',[ProjectController::class,'destroyproject']);


//Product category routes
Route::post('/create-category',[ProductcategoryController::class,'createcategory']);
Route::get('/viewcategories/{id}',[ProductcategoryController::class,'viewcategories']);
Route::get('/edit-category/{id}',[ProductcategoryController::class,'showcategory']);
Route::put('/update-category/{id}',[ProductcategoryController::class,'updatecategory']);
Route::delete('/deletecategory/{id}',[ProductcategoryController::class,'destroycategory']);

//Product subcategory routes
Route::post('/create-subcategory',[SubcategoryController::class,'createsubcategory']);
Route::get('/viewsubcategories/{id}',[SubcategoryController::class,'viewsubcategories']);
Route::get('/edit-subcategory/{id}',[SubcategoryController::class,'showsubcategory']);
Route::put('/update-subcategory/{id}',[SubcategoryController::class,'updatesubcategory']);
Route::delete('/deletesubcategory/{id}',[SubcategoryController::class,'destroysubcategory']);


//Product brand routes
Route::post('/create-brand',[BrandController::class,'createbrand']);
Route::get('/viewbrands/{id}',[BrandController::class,'viewbrands']);
Route::get('/edit-brand/{id}',[BrandController::class,'showbrand']);
Route::put('/update-brand/{id}',[BrandController::class,'updatebrand']);
Route::delete('/deletebrand/{id}',[BrandController::class,'destroybrand']);


//Product variant routes
Route::post('/create-variant',[VariantController::class,'createvariant']);
Route::get('/viewvariants/{id}',[VariantController::class,'viewvariants']);
Route::get('/edit-variant/{id}',[VariantController::class,'showvariant']);
Route::put('/update-variant/{id}',[VariantController::class,'updatevariant']);
Route::delete('/deletevariant/{id}',[VariantController::class,'destroyvariant']);

//Product sku routes
Route::post('/create-sku',[SkuController::class,'createsku']);
Route::get('/viewskus/{id}',[SkuController::class,'viewskus']);
Route::get('/edit-sku/{id}',[SkuController::class,'showsku']);
Route::put('/update-sku/{id}',[SkuController::class,'updatesku']);
Route::delete('/deletesku/{id}',[SkuController::class,'destroysku']);


//Trade marketing routes
Route::post('/create-tmcampaign',[CampaignController::class,'createtmcampaign']); 
Route::get('/viewtmcampaign/{id}',[CampaignController::class,'viewtmcampaigns']);
Route::get('/edit-tmcampaign/{id}',[CampaignController::class,'showtmcampaign']);
Route::put('/update-tmcampaign/{id}',[CampaignController::class,'updatetmcampaign']);
Route::delete('/deletetmcampaign/{id}',[CampaignController::class,'destroytmcampaign']);

//Trade marketing objectives routes
Route::post('/create-tmobjective',[TmobjectiveController::class,'createtmobjective']); 
Route::get('/viewtmobjective/{id}',[TmobjectiveController::class,'viewtmobjectives']);
Route::get('/edit-tmobjective/{id}',[TmobjectiveController::class,'showtmobjective']);
Route::put('/update-tmobjective/{id}',[TmobjectiveController::class,'updatetmobjective']);
Route::delete('/deletetmobjective/{id}',[TmobjectiveController::class,'destroytmobjective']);

//Trade marketing objectives routes
Route::post('/create-tmproduct',[TmproductController::class,'createtmproduct']); 
Route::get('/viewtmproducts/{id}',[TmproductController::class,'viewtmproducts']);
Route::get('/edit-tmproduct/{id}',[TmproductController::class,'showtmproduct']);
Route::put('/update-tmproduct/{id}',[TmproductController::class,'updatetmproduct']);
Route::delete('/deletetmproduct/{id}',[TmproductController::class,'destroytmproduct']);

//Trade marketing channel routes
Route::post('/create-tmchannel',[TmchannelController::class,'createtmchannel']); 
Route::get('/viewtmchannels/{id}',[TmchannelController::class,'viewtmchannels']);
Route::get('/edit-tmchannel/{id}',[TmchannelController::class,'showtmchannel']);
Route::put('/update-tmchannel/{id}',[TmchannelController::class,'updatetmchannel']);
Route::delete('/deletetmchannel/{id}',[TmchannelController::class,'destroytmchannel']);

//Trade marketing competitor research routes
Route::post('/create-tmcompetitor',[TmcompetitorController::class,'createtmcompetitor']); 
Route::get('/viewtmcompetitor/{id}',[TmcompetitorController::class,'viewtmcompetitors']);
Route::get('/edit-tmcompetitor/{id}',[TmcompetitorController::class,'showtmcompetitor']);
Route::put('/update-tmcompetitor/{id}',[TmcompetitorController::class,'updatetmcompetitor']);
Route::delete('/deletetmcompetitor/{id}',[TmcompetitorController::class,'destroytmcompetitor']);

Route::post('/create-tmoffering',[TmcompetitorofferingController::class,'createtmoffering']); 
Route::get('/viewtmoffering/{id}',[TmcompetitorofferingController::class,'viewtmofferings']);
Route::get('/edit-tmoffering/{id}',[TmcompetitorofferingController::class,'showtmoffering']);
Route::put('/update-tmoffering/{id}',[TmcompetitorofferingController::class,'updatetmoffering']);
Route::delete('/deletetmoffering/{id}',[TmcompetitorofferingController::class,'destroytmoffering']);

Route::post('/create-tmaudience',[TmtargetaudienceController::class,'createtmaudience']); 
Route::get('/viewtmaudience/{id}',[TmtargetaudienceController::class,'viewtmaudiences']);
Route::get('/edit-tmaudience/{id}',[TmtargetaudienceController::class,'showtmaudience']);
Route::put('/update-tmaudience/{id}',[TmtargetaudienceController::class,'updatetmaudience']);
Route::delete('/deletetmaudience/{id}',[TmtargetaudienceController::class,'destroytmaudience']);

Route::post('/create-tmposition',[TmpositioningController::class,'createtmposition']); 
Route::get('/viewtmposition/{id}',[TmpositioningController::class,'viewtmpositions']);
Route::get('/edit-tmposition/{id}',[TmpositioningController::class,'showtmposition']);
Route::put('/update-tmposition/{id}',[TmpositioningController::class,'updatetmposition']);
Route::delete('/deletetmposition/{id}',[TmpositioningController::class,'destroytmposition']);

Route::post('/create-tmmessage',[TmmessageController::class,'createtmmessage']); 
Route::get('/viewtmmessage/{id}',[TmmessageController::class,'viewtmmessages']);
Route::get('/edit-tmmessage/{id}',[TmmessageController::class,'showtmmessage']);
Route::put('/update-tmmessage/{id}',[TmmessageController::class,'updatetmmessage']);
Route::delete('/deletetmmessage/{id}',[TmmessageController::class,'destroytmmessage']);

Route::post('/create-tmprice',[TmpriceController::class,'createtmprice']); 
Route::get('/viewtmprices/{id}',[TmpriceController::class,'viewtmprices']);
Route::get('/edit-tmprice/{id}',[TmpriceController::class,'showtmprice']);
Route::put('/update-tmprice/{id}',[TmpriceController::class,'updatetmprice']);
Route::delete('/deletetmprice/{id}',[TmpriceController::class,'destroytmprice']);

Route::post('/create-tmstrategy',[TmstrategyController::class,'createtmstrategy']); 
Route::get('/viewtmstrategies/{id}',[TmstrategyController::class,'viewtmstrategies']);
Route::get('/edit-tmstrategy/{id}',[TmstrategyController::class,'showtmstrategy']);
Route::put('/update-tmstrategy/{id}',[TmstrategyController::class,'updatetmstrategy']);
Route::delete('/deletetmstrategy/{id}',[TmstrategyController::class,'destroytmstrategy']);

Route::post('/create-tmpartnership',[TmpartnershipController::class,'createtmpartnership']); 
Route::get('/viewtmpartnerships/{id}',[TmpartnershipController::class,'viewtmpartnerships']);
Route::get('/edit-tmpartnership/{id}',[TmpartnershipController::class,'showtmpartnership']);
Route::put('/update-tmpartnership/{id}',[TmpartnershipController::class,'updatetmpartnership']);
Route::delete('/deletetmpartnership/{id}',[TmpartnershipController::class,'destroytmpartnership']);