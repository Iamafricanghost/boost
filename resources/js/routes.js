
import TopBar from './components/navigation/topbar.vue';
import SideBar from './components/navigation/SideBar.vue';

// Authentication routes 
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget_password = require('./components/auth/forget_password.vue').default;
let logout = require('./components/auth/logout.vue').default;

//End of authentication routes

//Roles setup routes
let Role = require('./components/Company/roles_setup/view_roles.vue').default;
let Editrole = require('./components/Company/roles_setup/edit.vue').default;
let Storerole = require('./components/Company/roles_setup/create.vue').default;

//Permission setup routes
let Permission = require('./components/Company/permission_setup/view_permission.vue').default;
let Editpermission = require('./components/Company/permission_setup/edit.vue').default;

//Home route
let home = require('./components/dashboard/home.vue').default;



//Country routes
let storecountry = require('./components/Company/Geography/country_create.vue').default;
let country = require('./components/Company/Geography/country_index.vue').default;
let editcountry = require('./components/Company/Geography/country_edit.vue').default;


//Geography routes
let Geography = require('./components/Company/Geography/geography.vue').default;
let RwandaProvinces = require('./components/Company/Geography/rwanda/provinces.vue').default;
let Viewdistricts = require('./components/Company/Geography/rwanda/districts.vue').default;
let Viewsectors = require('./components/Company/Geography/rwanda/sectors.vue').default;
let Viewcells = require('./components/Company/Geography/rwanda/cells.vue').default;
let Viewstreets = require('./components/Company/Geography/rwanda/streets.vue').default;

//Company setup routes
let company = require('./components/Company/company/view_company.vue').default;
let Editcompany = require('./components/Company/company/edit.vue').default;
// let Viewcompany = require('./components/Company/company/view_company.vue').default;


//Company setup routes
let Organs = require('./components/Company/business/view_organs.vue').default;
let Editorgan = require('./components/Company/business/edit.vue').default;
let AssignOrgan = require('./components/Company/business/organassign.vue').default;
let Vieworgandetails = require('./components/Company/business/organ_companies.vue').default;

//Leads setup routes
let leads = require('./components/Company/stakeholders/view_stakeholder.vue').default;
let Editleads = require('./components/Company/stakeholders/edit.vue').default;

//Customer setup routes
let Customers = require('./components/Company/customers/view_customers.vue').default;
let Editcustomer = require('./components/Company/customers/edit.vue').default;

//Vendor setup routes
let Vendors = require('./components/Company/vendors/view_vendors.vue').default;
let Editvendor = require('./components/Company/vendors/edit.vue').default;

//Customer setup routes
let SisterCompanies = require('./components/Company/sisters/view_sisters.vue').default;
let Editsistercompany = require('./components/Company/sisters/edit.vue').default;


//Brand ambassador routes
let Ambassador = require('./components/HR modules/brandambassador/view_ambassador.vue').default;
let Editambassador = require('./components/HR modules/brandambassador/edit.vue').default;


//Employee routes
let Employee = require('./components/HR modules/employees/view_employee.vue').default;
let Editemployee = require('./components/HR modules/employees/edit.vue').default;

//Project routes
let Projects = require('./components/Company/projects/view_projects.vue').default;
let Editproject = require('./components/Company/projects/edit.vue').default;

//Project routes
let Products = require('./components/Company/productcategory/product_index.vue').default;
let Productcategory = require('./components/Company/productcategory/view_categories.vue').default;
let Editcategory = require('./components/Company/productcategory/edit.vue').default;

let Productsubcategory = require('./components/Company/subcategory/view_subcategories.vue').default;
let Editsubcategory = require('./components/Company/subcategory/edit.vue').default;

let Productbrand = require('./components/Company/brands/view_brands.vue').default;
let Editbrand = require('./components/Company/brands/edit.vue').default;

let Productvariant = require('./components/Company/variants/view_variants.vue').default;
let Editvariant = require('./components/Company/variants/edit.vue').default;

let Productskus = require('./components/Company/skus/view_skus.vue').default;
let Editsku = require('./components/Company/skus/edit.vue').default;

//Channel routes
let Channels = require('./components/Company/channels/channels.vue').default;

let Generaltrade = require('./components/Company/channels/general_trade.vue').default;
let Moderntrade = require('./components/Company/channels/modern_trade.vue').default;
let Gtoutlettypesrw = require('./components/Company/channels/gt_outlet_types_rw.vue').default;
let Mtoutlettypesrw = require('./components/Company/channels/mt_outlet_types_rw.vue').default;


//Boutique routes
let Boutique = require('./components/Company/gt_boutique_outlets/view_boutiques.vue').default;
let Editboutique = require('./components/Company/gt_boutique_outlets/edit.vue').default;

//Trade marketing routes
let Trademarketing = require('./components/Operations/trademarketing/tm_home.vue').default;

let Viewtrademarketing = require('./components/Operations/trademarketing/tm_project_details.vue').default;

//Trade marketing report routes
let Viewcompetionreport = require('./components/Operations/competition_reports/view_trademarketing_projects.vue').default;
let Competitionreportdetails = require('./components/Operations/competition_reports/edit.vue').default;

//Trade marketing objectives routes
let Objectives = require('./components/Operations/trademarketing/objective/index.vue').default;
let EditCampaign = require('./components/Operations/trademarketing/objective/edit_tm_campaign.vue').default;
let EditObjective = require('./components/Operations/trademarketing/objective/edit_tm_objective.vue').default;

//Trade marketing product routes
let EdittmProduct = require('./components/Operations/trademarketing/objective/products/edit_tm_product.vue').default;

//Trade marketing channel routes
let EdittmChannel = require('./components/Operations/trademarketing/objective/channels/edit_tm_channel.vue').default;


//Permission setup routes
let Users = require('./components/Company/users_setup/view_users.vue').default;
let Edituser = require('./components/Company/users_setup/edit.vue').default;

//Trade marketing research routes
let Research = require('./components/Operations/trademarketing/market_research/index.vue').default;
let Editcompetitor = require('./components/Operations/trademarketing/market_research/competition/edit_identification.vue').default;
let Editcompetitoroffering = require('./components/Operations/trademarketing/market_research/competition/edit_offering.vue').default;
let Edittargetaudience = require('./components/Operations/trademarketing/market_research/competition/edit_target_audience.vue').default;
let Editmarketposition = require('./components/Operations/trademarketing/market_research/competition/edit_market_positioning.vue').default;
let Edittmmessage = require('./components/Operations/trademarketing/market_research/competition/edit_messaging.vue').default;
let Edittmprice = require('./components/Operations/trademarketing/market_research/pricing/edit.vue').default;
let Edittmstrategy = require('./components/Operations/trademarketing/market_research/promotional_strategies/edit.vue').default;
let Edittmpartnership = require('./components/Operations/trademarketing/market_research/partnerships/edit.vue').default;

export const routes = [
    { path: '/', name:'/', components:{
      'login':login
    }},
    { path: '/rgr', component: register , name:'register'},
    { path: '/forget_password', component: forget_password , name:'forget_password'},
    { path: '/logout', component: logout , name:'logout'},

    //Remember to add named router views as components for the following non-authentication routes
    { path: '/home', components: {default:home,'topbar':TopBar,'sidebar':SideBar} , name:'home'},

   //Roles setup routes
   { path: '/store-role', components: {default:Storerole,'topbar':TopBar,'sidebar':SideBar} , name:'store-role'},
   { path: '/roles', components: {default:Role,'topbar':TopBar,'sidebar':SideBar} , name:'roles'},
   { path: '/edit-role/:id', components: {default:Editrole,'topbar':TopBar,'sidebar':SideBar} , name:'edit-role'},

    //Permissions setup routes
    { path: '/permissions', components: {default:Permission,'topbar':TopBar,'sidebar':SideBar} , name:'permissions'},
    // { path: '/viewpermission', components: {default:Permission,'topbar':TopBar,'sidebar':SideBar} , name:'viewpermission'},
    { path: '/edit-permission/:id', components: {default:Editpermission,'topbar':TopBar,'sidebar':SideBar} , name:'edit-permission'},

    //Permissions setup routes
    { path: '/users', components: {default:Users,'topbar':TopBar,'sidebar':SideBar} , name:'users'},
    // { path: '/viewpermission/', components: {default:Permission,'topbar':TopBar,'sidebar':SideBar} , name:'viewpermission'},
    { path: '/edit-user/:id', components: {default:Edituser,'topbar':TopBar,'sidebar':SideBar} , name:'edit-user'},

   

    //Country routes
    { path: '/store-country', components: {default:storecountry,'topbar':TopBar,'sidebar':SideBar} , name:'store-country'},
    { path: '/country', components: {default:country,'topbar':TopBar,'sidebar':SideBar} , name:'country'},
    { path: '/edit-country/:id', components: {default:editcountry,'topbar':TopBar,'sidebar':SideBar} , name:'edit-country'},

        //Geography routes
    { path: '/geography', components: {default:Geography,'topbar':TopBar,'sidebar':SideBar} , name:'geography'},
    { path: '/rwandaprovinces', components: {default:RwandaProvinces,'topbar':TopBar,'sidebar':SideBar} , name:'rwandaprovinces'},
    { path: '/view-districts/:id', components: {default:Viewdistricts,'topbar':TopBar,'sidebar':SideBar} , name:'view-districts'},
    { path: '/view-sectors/:id', components: {default:Viewsectors,'topbar':TopBar,'sidebar':SideBar} , name:'view-sectors'},
    { path: '/view-cells/:id', components: {default:Viewcells,'topbar':TopBar,'sidebar':SideBar} , name:'view-cells'},
    { path: '/view-streets/:id', components: {default:Viewstreets,'topbar':TopBar,'sidebar':SideBar} , name:'view-streets'},

 
    //Company routes
    { path: '/company', components: {default:company,'topbar':TopBar,'sidebar':SideBar} , name:'company'},
    { path: '/edit-company/:id', components: {default:Editcompany,'topbar':TopBar,'sidebar':SideBar} , name:'edit-company'},
      //  { path: '/view-companies', components: {default:Viewcompany,'topbar':TopBar,'sidebar':SideBar} , name:'view-companies'},


  //Business organs routes
  { path: '/organs', components: {default:Organs,'topbar':TopBar,'sidebar':SideBar} , name:'organs'},
  { path: '/edit-organ/:id', components: {default:Editorgan,'topbar':TopBar,'sidebar':SideBar} , name:'edit-organ'},
  { path: '/organ-assign', components: {default:AssignOrgan,'topbar':TopBar,'sidebar':SideBar} , name:'organ-assign'},
  { path: '/vieworgandetails/:id', components: {default:Vieworgandetails,'topbar':TopBar,'sidebar':SideBar} , name:'vieworgandetails'},


  //Leads routes
  { path: '/leads', components: {default:leads,'topbar':TopBar,'sidebar':SideBar} , name:'leads'},
  { path: '/edit-lead/:id', components: {default:Editleads,'topbar':TopBar,'sidebar':SideBar} , name:'edit-lead'},

  //Customer routes
  { path: '/customers', components: {default:Customers,'topbar':TopBar,'sidebar':SideBar} , name:'customers'},
  { path: '/edit-customer/:id', components: {default:Editcustomer,'topbar':TopBar,'sidebar':SideBar} , name:'edit-customer'},
    
  //Vendor routes
    { path: '/vendors', components: {default:Vendors,'topbar':TopBar,'sidebar':SideBar} , name:'vendors'},
    { path: '/edit-vendor/:id', components: {default:Editvendor,'topbar':TopBar,'sidebar':SideBar} , name:'edit-vendor'},

  //Sister company routes
  { path: '/sister', components: {default:SisterCompanies,'topbar':TopBar,'sidebar':SideBar} , name:'sister'},
  { path: '/edit-sister/:id', components: {default:Editsistercompany,'topbar':TopBar,'sidebar':SideBar} , name:'edit-sister'},


    //Brand ambassador routes
    { path: '/brandambassador', components: {default:Ambassador,'topbar':TopBar,'sidebar':SideBar} , name:'brandambassador'},
    { path: '/edit-ambassador/:id', components: {default:Editambassador,'topbar':TopBar,'sidebar':SideBar} , name:'edit-ambassador'},

    //Employee routes
    { path: '/employee', components: {default:Employee,'topbar':TopBar,'sidebar':SideBar} , name:'employee'},
    { path: '/edit-employee/:id', components: {default:Editemployee,'topbar':TopBar,'sidebar':SideBar} , name:'edit-employee'},

  //Project routes
  { path: '/projects', components: {default:Projects,'topbar':TopBar,'sidebar':SideBar} , name:'projects'},
  { path: '/edit-project/:id', components: {default:Editproject,'topbar':TopBar,'sidebar':SideBar} , name:'edit-project'},

    //Product routes
    { path: '/products', components: {default:Products,'topbar':TopBar,'sidebar':SideBar} , name:'products'},
    { path: '/product-categories', components: {default:Productcategory,'topbar':TopBar,'sidebar':SideBar} , name:'product-categories'},
    { path: '/edit-category/:id', components: {default:Editcategory,'topbar':TopBar,'sidebar':SideBar} , name:'edit-category'},

    { path: '/product-subcategories', components: {default:Productsubcategory,'topbar':TopBar,'sidebar':SideBar} , name:'product-subcategories'},
    { path: '/edit-subcategory/:id', components: {default:Editsubcategory,'topbar':TopBar,'sidebar':SideBar} , name:'edit-subcategory'},

    { path: '/product-brands', components: {default:Productbrand,'topbar':TopBar,'sidebar':SideBar} , name:'product-brands'},
    { path: '/edit-brand/:id', components: {default:Editbrand,'topbar':TopBar,'sidebar':SideBar} , name:'edit-brand'},

    { path: '/product-variants', components: {default:Productvariant,'topbar':TopBar,'sidebar':SideBar} , name:'product-variants'},
    { path: '/edit-variant/:id', components: {default:Editvariant,'topbar':TopBar,'sidebar':SideBar} , name:'edit-variant'},

    { path: '/product-skus', components: {default:Productskus,'topbar':TopBar,'sidebar':SideBar} , name:'product-skus'},
    { path: '/edit-sku/:id', components: {default:Editsku,'topbar':TopBar,'sidebar':SideBar} , name:'edit-sku'},


  //Channel routes
  { path: '/channels', components: {default:Channels,'topbar':TopBar,'sidebar':SideBar} , name:'channels'},
  { path: '/general-trade', components: {default:Generaltrade,'topbar':TopBar,'sidebar':SideBar} , name:'general-trade'},
  { path: '/modern-trade', components: {default:Moderntrade,'topbar':TopBar,'sidebar':SideBar} , name:'modern-trade'},
  { path: '/gt-rwanda', components: {default:Gtoutlettypesrw,'topbar':TopBar,'sidebar':SideBar} , name:'gt-rwanda'},
  { path: '/mt-rwanda', components: {default:Mtoutlettypesrw,'topbar':TopBar,'sidebar':SideBar} , name:'mt-rwanda'},

  //Boutique routes
  { path: '/rw-gt-boutiques', components: {default:Boutique,'topbar':TopBar,'sidebar':SideBar} , name:'rw-gt-boutiques'},
  { path: '/edit-boutique/:id', components: {default:Editboutique,'topbar':TopBar,'sidebar':SideBar} , name:'edit-boutique'},

    //Trademarketing routes
    { path: '/trade-marketing', components: {default:Trademarketing,'topbar':TopBar,'sidebar':SideBar} , name:'trade-marketing'},
    { path: '/view-tm-report', components: {default:Viewtrademarketing,'topbar':TopBar,'sidebar':SideBar} , name:'view-tm-report'},

    //Trademarketing report routes
    { path: '/view-competition-report', components: {default:Viewcompetionreport,'topbar':TopBar,'sidebar':SideBar} , name:'view-competition-report'},
    { path: '/view-project-competition-report/:id', components: {default:Competitionreportdetails,'topbar':TopBar,'sidebar':SideBar} , name:'view-project-competition-report'},


  //Trademarketing objectives routes
  { path: '/tm-objectives', components: {default:Objectives,'topbar':TopBar,'sidebar':SideBar} , name:'tm-objectives'},
  { path: '/edit-tm-campaign/:id', components: {default:EditCampaign,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-campaign'},
  { path: '/edit-tm-objective/:id', components: {default:EditObjective,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-objective'},

  //Trade marketing product routes
  { path: '/edit-tm-product/:id', components: {default:EdittmProduct,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-product'},

  //Trade marketing channel routes
  { path: '/edit-tm-channel/:id', components: {default:EdittmChannel,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-channel'},

//Trademarketing market research routes
{ path: '/tm-market-research', components: {default:Research,'topbar':TopBar,'sidebar':SideBar} , name:'tm-market-research'},
{ path: '/edit-tm-competitor/:id', components: {default:Editcompetitor,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-competitor'},
{ path: '/edit-tm-offering/:id', components: {default:Editcompetitoroffering,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-offering'},
{ path: '/edit-tm-target_audience/:id', components: {default:Edittargetaudience,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-target_audience'},
{ path: '/edit-tm-position/:id', components: {default:Editmarketposition,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-position'},
{ path: '/edit-tm-message/:id', components: {default:Edittmmessage,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-message'},
{ path: '/edit-tm-price/:id', components: {default:Edittmprice,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-price'},
{ path: '/edit-tm-strategy/:id', components: {default:Edittmstrategy,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-strategy'},
{ path: '/edit-tm-partnership/:id', components: {default:Edittmpartnership,'topbar':TopBar,'sidebar':SideBar} , name:'edit-tm-partnership'},

  ]