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


// START OSM
Route::prefix('osm')->group(function() {
  Route::get('/', function() {
    return redirect()->route('employee-login');
  });

  Route::get('/login', 'Auth\LoginController@loadEmployeeLogin')->name('employee-login');
  Route::post('/login', 'Auth\LoginController@employeeLogin')->name('employee-login');

  Route::middleware('auth:employee')->group(function() {
    // MIDDLEWARE EMPLOYEE

    Route::prefix('store')->group(function() {
      // STORE PREFIX

      Route::get('/', function() {
        return redirect()->route('employee-dashboard');
      });

      Route::get('/products', 'ProductController@loadOsmProducts')->name('osm-store-products');
      Route::post('/products', 'ProductController@toggleStatus');

      Route::get('/products/add', 'ProductController@loadNewProduct')->name('osm-add-product');
      Route::post('/products/add', 'ProductController@newProduct');

      Route::get('/products/edit/{id}', 'ProductController@loadEditProduct')->name('osm-edit-product');
      Route::post('/products/edit/{id}', 'ProductController@updateProduct');

      Route::get('/customers', 'Osm\CustomerController@loadOsmCustomers')->name('osm-store-customers');
      Route::post('/customer', 'Osm\CustomerController@toggleStatus');

      Route::get('/customers/edit{id}', 'Osm\CustomerController@loadEditCustomer')->name('osm-edit-customer');
      Route::post('/customers/edit/{id}', 'Osm\CustomerController@updateCustomer');

    });
    // END STORE PREFIX

    Route::get('/dashboard', 'Osm\EmployeeController@loadDashboard')->name('employee-dashboard');
    Route::get('/new-employee', 'Auth\RegisterController@showEmployeeRegister');
    Route::post('/new-employee', 'Auth\RegisterController@createEmployee');

  });
  // END MIDDLEWARE EMPLOYEE
});

// Route::group(array('domain' => 'osm.pre-alpha.geekr.nl'), $osmRoutes);
// Route::group(array('domain' => 'osm.geekr.nl'), $osmRoutes);
// Route::group(array('domain' => 'http://localhost/osm'), $osmRoutes);

// END OSM


Route::get('admin', function () {
    return redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
});

Route::get('/', 'IndexController@index')->name('index');

Route::post('/webtheme/toggle', 'UserController@changeWebTheme')->name('toggle-web-theme');

Auth::routes();

Route::get('/download', 'InvoiceController@download');
Route::get('/dl', 'InvoiceController@load');

Route::get('/account', 'AccountController@index')->name('home')->middleware('verified');

Route::middleware(['auth', 'verified'])->group(function() {
  Route::prefix('mijn-account')->group(function() {

    Route::get('addressen', 'AddressController@loadAddresses')->name('my-addresses');

    Route::get('addressen/nieuw', 'AddressController@loadNewAddress')->name('new-addresses');
    Route::post('/addressen/nieuw', 'AddressController@addAddress');

    Route::get('addressen/verwijder/{id}', 'AddressController@removeAddress');

    Route::get('addressen/edit/{id}', 'AddressController@loadEditAddress')->name('edit-addresses');
    Route::post('addressen/edit/{id}', 'AddressController@editAddress');

    Route::get('bestellingen', 'OrderController@loadOrderOverview')->name('my-orders');
    Route::get('bestellingen/details/{id}', 'OrderController@loadOrderDetails')->name('order-details');

    Route::get('details', 'UserController@loadDetails')->name('my-details');
    Route::post('details', 'UserController@editDetails')->name('my-details');

  });
});

Route::prefix('klantenservice')->group(function() {

  Route::get('/', 'Support\FaqController@loadIndex')->name('customer-support');
  Route::get('/bestellen-en-bezorgen', 'Support\FaqController@loadOrder')->name('customer-support-order');
  Route::get('/annuleren-en-retour', 'Support\FaqController@loadCancel')->name('customer-support-cancel');
  Route::get('/garantie-en-reparatie', 'Support\FaqController@loadGuarantee')->name('customer-support-guarantee');
  Route::get('/betalen', 'Support\FaqController@loadPay')->name('customer-support-pay');
  Route::get('/mijn-account', 'Support\FaqController@loadAccount')->name('customer-support-account');
  Route::get('/cadeaukaart', 'Support\FaqController@loadCadeau')->name('customer-support-cadeau');
  Route::get('/privacy', 'Support\FaqController@loadPrivacy')->name('customer-support-privacy');
  Route::get('/anders', 'Support\FaqController@loadOther')->name('customer-support-other');

  Route::get('/contact-formulier', 'Support\ContactController@loadContactForm')->name('customer-support-form');
  Route::post('/contact-formulier', 'Support\ContactController@submitForm');

});

Route::post('/', 'IndexController@search')->name('search');

Route::get('/categories', 'CategoryController@loadAll')->name('categories');

Route::get('/categorie/{id}', 'CategoryController@load')->name('category');

Route::get('/test', 'InvoiceController@show');

Route::get('/product-details/{id}', 'ProductController@loadProductDetails')->name('product-details');

Route::get('/winkelmandje', 'CartController@loadCart')->name('winkelmandje');


Route::post('/cart/add', 'CartController@addToCart');

Route::get('/cart/remove/{id}', 'CartController@removeFromCart');

Route::post('/cart/amount', 'CartController@amountChange');

Route::get('/order', 'OrderController@loadOrder');

Route::post('/order/create', 'OrderController@createOrder');

Route::get('/order/confirmed', 'OrderController@loadOrderConfirmed');

Route::get('/payment/prepare', 'PaymentController@preparePayment');

Route::get('/payment/receive', 'PaymentController@paymentReceive');

// Route::get('/product/{id}', 'ProductController@productPage');

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->middleware('verified');
