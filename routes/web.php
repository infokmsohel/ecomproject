<?php

Route::get('/',[
   'uses'=> 'SuperMarketController@index',
    'as' => '/'
]);

Route::get('/contact',[
    'uses'=> 'SuperMarketController@contact',
    'as' => 'contact'
]);

Route::post('/contact',[
    'uses'=> 'ContactController@contact',
    'as' => 'customer-contact'
]);

Route::get('/category/{id}/{name}','SuperMarketController@categoryContent')->name('category-content');


Route::get('/product-details/{id}/{name}',[
    'uses'=> 'SuperMarketController@productDetails',
    'as' => 'product-details'
]);

Route::post('/Cart/add',[
    'uses'=> 'CartController@addToCart',
    'as' => 'add-to-cart'
]);

Route::get('/Cart/Show',[
    'uses'=> 'CartController@showCart',
    'as' => 'show-cart'
]);

Route::post('/Cart/UpdateCart',[
    'uses'=> 'CartController@updateCartQty',
    'as' => 'update-cart-qty'
]);

Route::get('/Cart/DeleteCartProduct/{id}',[
    'uses'=> 'CartController@deleteCartProduct',
    'as' => 'delete-cart-product'
]);

Route::get('/customer-login',[
    'uses'=> 'CheckOutController@index',
    'as' => 'checkout',
    'middleware' => 'register'

]);

Route::post('/customer-login',[
    'uses'=> 'CheckOutController@customerLogin',
    'as' => 'customer-login'
]);

Route::post('/customer-logout',[
    'uses'=> 'CheckOutController@customerLogOut',
    'as' => 'customer-logout'
]);


Route::get('/customer-registration',[
    'uses'=> 'CheckOutController@showRegisterForm',
    'as' => 'registered',
    'middleware' => 'register'
]);

Route::get('/email-check/{email}',[
    'uses'=> 'CheckOutController@emailCheck',
    'as' => 'email-check'
]);

Route::get('/ajax-product-search',[
    'uses'=> 'CheckOutController@searchProduct',
    'as' => 'search-product'
]);

Route::post('/search-result-view',[
    'uses'=> 'CheckOutController@searchView',
    'as' => 'search-view'
]);

//Route::get('/ProductNotFound',[
//    'uses'=> 'CheckOutController@searchView',
//    'as' => 'search-view'
//]);

Route::post('/customer-registration',[
    'uses'=> 'CheckOutController@saveCustomerRegistration',
    'as' => 'save-customer-registration'
]);

Route::get('/shipping-info','CheckOutController@showShippingForm')->name('shippingInfo')
//    ->middleware('shipping')
;

//Route::get('/shipping-info',[
//    'uses'=> 'CheckOutController@showShippingForm',
//    'as' => 'shippingInfo'
//]);

Route::post('/shipping-info',[
    'uses'=> 'CheckOutController@saveShippingInfo',
    'as' => 'save-shipping-info'
]);

Route::get('/payment-type',[
    'uses'=> 'CheckOutController@showPaymentType',
    'as' => 'payment-type'
]);

Route::post('/payment-type',[
    'uses'=> 'CheckOutController@saveCustomerOrder',
    'as' => 'new-order'
]);

Route::get('/order-confirmation-message',[
    'uses'=> 'CheckOutController@completeOrder',
    'as' => 'complete-order'
]);


//--------------------frontend------------------------------------------------

Route::get('/AdminPanelUser/AddUser',[
    'uses'=> 'AdminUserController@index',
    'as' => 'add-user'
]);

Route::get('/AdminPanelUser/ManageUser',[
    'uses'=> 'AdminUserController@manageUser',
    'as' => 'manage-user'
]);

Route::get('/Banner/AddBanner',[
    'uses'=> 'BannerController@addBanner',
    'as' => 'add-banner'
]);

Route::get('/Banner/ManageBanner',[
    'uses'=> 'BannerController@manageBanner',
    'as' => 'manage-banner'
]);

Route::get('/CustomerContact/ManageCustomer',[
    'uses'=> 'CustomerContactController@manageCustomerContact',
    'as' => 'manage-contact'
]);

Route::get('/FooterContact/AddContact',[
    'uses'=> 'FooterContactController@addContact',
    'as' => 'add-footer-contact'
]);

Route::post('/FooterContact/SaveFooter',[
    'uses'=> 'FooterContactController@saveFooter',
    'as' => 'save-footer'
]);


Route::get('/FooterContact/ManageFooterContact',[
    'uses'=> 'FooterContactController@manageFooterContact',
    'as' => 'manage-footer-contact'
]);

Route::get('/Slider/AddSlider',[
    'uses'=> 'SliderController@addSlider',
    'as' => 'add-slider'
]);

Route::get('/Slider/ManageSlider',[
    'uses'=> 'SliderController@manageSlider',
    'as' => 'manage-slider'
]);




Route::get('/Category/AddCategory',[
    'uses'=> 'CategoryController@index',
    'as' => 'add'
]);



Route::post('/Category/Saved',[
    'uses'=> 'CategoryController@saveCategoryInfo',
    'as' => 'save-category'
]);

Route::get('/Category/ManageCategory',[
    'uses'=> 'CategoryController@manageCategory',
    'as' => 'manageCat'
]);

Route::get('/Category/ManageCategory/Unpublished/{id}',[
    'uses'=> 'CategoryController@unpublishedCategory',
    'as' => 'unpublished-category'
]);

Route::get('/Category/ManageCategory/Published/{id}',[
    'uses'=> 'CategoryController@publishedCategory',
    'as' => 'published-category'
]);

Route::get('/Category/EditCategory/{id}',[
    'uses'=> 'CategoryController@editCategory',
    'as' => 'editCat'
]);

Route::post('/Category/UpdateCategory',[
    'uses'=> 'CategoryController@updateCategory',
    'as' => 'updateCat'
]);

Route::get('/Category/DeleteCategory/{id}',[
    'uses'=> 'CategoryController@deleteCategory',
    'as' => 'deleteCat'
]);


Route::get('/Brand/AddBrand',[
    'uses'=> 'BrandController@addBrand',
    'as' => 'addBrand'
]);

Route::post('Brand/Saved',[
    'uses'=> 'BrandController@saveBrand',
    'as' => 'saveBrand'
]);



Route::get('/Brand/ManageBrand',[
    'uses'=> 'BrandController@manageBrand',
    'as' => 'manageBrand'
]);

Route::get('/Product/AddProduct',[
    'uses'=> 'ProductController@addProductInfo',
    'as' => 'addProduct'
]);

Route::post('/Product/SavedProduct',[
    'uses'=> 'ProductController@saveProductInfo',
    'as' => 'saveProduct'
]);

Route::get('/Product/ManageProduct',[
    'uses'=> 'ProductController@manageProductInfo',
    'as' => 'manageProduct'
]);

Route::get('/Product/ViewProduct/{id}',[
    'uses'=> 'ProductController@viewProduct',
    'as' => 'view-product'
]);

Route::get('/Product/ManageProduct/Unpublished/{id}',[
    'uses'=> 'ProductController@unpublishedProduct',
    'as' => 'unpublished-product'
]);

Route::get('/Product/ManageProduct/published/{id}',[
    'uses'=> 'ProductController@publishedProduct',
    'as' => 'published-product'
]);

Route::get('/Product/EditProduct/{id}',[
    'uses'=> 'ProductController@editProduct',
    'as' => 'edit-product'
]);

Route::post('/Product/UpdatedProduct',[
    'uses'=> 'ProductController@updateProduct',
    'as' => 'updateProduct'
]);

Route::get('/Product/deleteProduct/{id}',[
    'uses'=> 'ProductController@deleteProduct',
    'as' => 'deleteProduct'
]);

Route::get('/ManageOrder',[
    'uses'=> 'OrderController@manageOrder',
    'as' => 'manage-order'
]);

Route::get('/ManageOrder/ViewOrder/{id}',[
    'uses'=> 'OrderController@viewOrder',
    'as' => 'view-order-details'
]);

Route::get('/ManageOrder/ViewOrderInvoice/{id}',[
    'uses'=> 'OrderController@viewOrderInvoice',
    'as' => 'view-invoice'
]);

Route::get('/ManageOrder/DownloadInvoice/{id}',[
    'uses'=> 'OrderController@downloadInvoice',
    'as' => 'download-invoice'
]);

Route::match(['get', 'post'], 'laravel-send-custom-email', 'EmailController@customEmail');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
