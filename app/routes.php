<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

    Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    Route::group((Config::get('sfcms')['cache']) ? array('before' => 'cache.fetch', 'after' => 'cache.put') : array(), function () {

    // frontend dashboard

    // article
    Route::get('/article', array('as' => 'dashboard.article', 'uses' => 'ArticleController@index'));
    Route::get('/article/{id}/{slug?}', array('as' => 'dashboard.article.show', 'uses' => 'ArticleController@show'));

    // news
    Route::get('/news', array('as' => 'dashboard.news', 'uses' => 'NewsController@index'));
    Route::get('/news/{id}/{slug?}', array('as' => 'dashboard.news.show', 'uses' => 'NewsController@show'));

    // tags
    Route::get('/tag/{tag}', array('as' => 'dashboard.tag', 'uses' => 'TagController@index'));

    // categories
    Route::get('/category/{category}', array('as' => 'dashboard.category', 'uses' => 'CategoryController@index'));

    // page
    Route::get('/page', array('as' => 'dashboard.page', 'uses' => 'PageController@index'));
    Route::get('/page/{id}', array('as' => 'dashboard.page.show', 'uses' => 'PageController@show'));

    // photo gallery
    Route::get('/photo_gallery/{id}', array('as' => 'dashboard.photo_gallery.show', 'uses' => 'PhotoGalleryController@show'));

    // contact
    Route::get('/contact', array('as' => 'dashboard.contact', 'uses' => 'FormPostController@getContact'));

    // rss
    Route::get('/rss', array('as' => 'rss', 'uses' => 'RssController@index'));


    // search
    Route::get('/search', ['as'=>'admin.search', 'uses'=>'SearchController@index']);

    // user profile



   
});

 Route::group(array('before'=>'authuser'),function(){

     Route::get('/userprofile',array('uses'=>'UserProfileController@showindex'));
     Route::get('/postArticle',array('uses'=>'UserArticleController@showindex'));
     Route::get('/articleList',array('uses'=>'UserArticleController@showArticleList'));
     Route::get('/categoryList',array('uses'=>'UserArticleController@showCategoryList'));
     Route::get('/createCategory',array('uses'=>'UserArticleController@showCreateCategory'));
     Route::get('/myarticle/{id}',array('uses'=>'UserArticleController@editArticle'));
     Route::get('/viewmyarticle/{id}',array('uses'=>'UserArticleController@showArticle'));
     Route::get('/deleteArticleConfirm/{id}',array('uses'=>'UserArticleController@showConfirmDelete'));
     Route::get('/mymessages',array('uses'=>'MessageController@showindex'));
     Route::get('/viewmymessage/{id}',array('uses'=>'MessageController@showMessage'));
     Route::get('/createNewMessage',array('uses'=>'MessageController@createNewMessage'));
     Route::get('/replyMessage/{id}',array('uses'=>'MessageController@replyMessage'));
     Route::get('/deleteMessage/{id}',array('uses'=>'MessageController@deleteMessageConfirm'));
     Route::post('/sendMessage',array('uses'=>'MessageController@sendNewMessage'));
     Route::post('/createArticle',array('uses'=>'UserArticleController@postArticle'));
     Route::post('/storeCategory',array('uses'=>'UserArticleController@postStoreCategory'));
     Route::post('/updateArticle/{id}',array('uses'=>'UserArticleController@updateArticle'));
    
     Route::delete('/deleteArticle/{id}',array('uses'=>'UserArticleController@deleteArticle'));
     Route::delete('/deletePermMessage/{id}',array('uses'=>'MessageController@deleteMessage'));


   });


 //registration
Route::get('/registration',array('as' =>'registration','uses'=>'RegistrationController@index'));

//login
Route::get('/login',array('as'=>'login','uses'=>'LoginController@index'));
Route::get('/logout',array('uses'=>'LoginController@getLogout'));

Route::post('/contact', array('as' => 'dashboard.contact.post', 'uses' => 'FormPostController@postContact'), array('before' => 'csrf'));

// register
Route::post('register',array('uses'=>'RegistrationController@store'));

// login
Route::post('signin',array('uses'=>'LoginController@postLogin'));

//
/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'admin', 'namespace' => 'App\Controllers\Admin', 'before' => 'auth.admin'), function () {

    // admin dashboard
    Route::get('/', array('as' => 'admin.dashboard', function () {

        return View::make('backend/_layout/dashboard')->with('active', 'home');
    }));

    // user
    Route::resource('user', 'UserController');
    Route::get('user/{id}/delete', array('as' => 'admin.user.delete', 'uses' => 'UserController@confirmDestroy'))
        ->where('id', '[0-9]+');
    Route::post('user/activate',function(){

        $id=Input::get('activate');
     
        $user = Sentry::findUserById($id);      
        
        $user->activated=1;
        $user->save();
        $formdata['firstName']=$user->first_name;

            Mail::send('emails.contact-form.email', $formdata, function ($message) {
             $user = Sentry::findUserById(Input::get('activate'));  
            $message->from('blacksilent9.8@gmail.com', 'ADMIN');
            $message->to($user->email)->subject('Account Activation for Alumni Tracking');
        });

        Notification::success('Account Activated');
        return Redirect::back();


    });


    // blog
    Route::resource('article', 'ArticleController');
    Route::get('article/{id}/delete', array('as' => 'admin.article.delete', 'uses' => 'ArticleController@confirmDestroy'))
        ->where('id', '\d+');

    // news
    Route::resource('news', 'NewsController');
    Route::get('news/{id}/delete', array('as' => 'admin.news.delete', 'uses' => 'NewsController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // category
    Route::resource('category', 'CategoryController');
    Route::get('category/{id}/delete', array('as' => 'admin.category.delete', 'uses' => 'CategoryController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // page
    Route::resource('page', 'PageController');
    Route::get('page/{id}/delete', array('as' => 'admin.page.delete', 'uses' => 'PageController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // photo gallery
    Route::resource('photo_gallery', 'PhotoGalleryController');
    Route::get('photo_gallery/{id}/delete', array('as' => 'admin.photo_gallery.delete', 'uses' => 'PhotoGalleryController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // ajax - blog
    Route::post('article/{id}/toggle-publish', array('as' => 'admin.article.toggle-publish', 'uses' => 'ArticleController@togglePublish'))
        ->where('id', '[0-9]+');

    // ajax - news
    Route::post('news/{id}/toggle-publish', array('as' => 'admin.news.toggle-publish', 'uses' => 'NewsController@togglePublish'))
        ->where('id', '[0-9]+');

    // ajax - photo gallery
    Route::post('photo_gallery/{id}/toggle-publish', array('as' => 'admin.photo_gallery.toggle-publish', 'uses' => 'PhotoGalleryController@togglePublish'))
        ->where('id', '[0-9]+');
    Route::post('photo_gallery/{id}/toggle-menu', array('as' => 'admin.photo_gallery.toggle-menu', 'uses' => 'PhotoGalleryController@toggleMenu'))
        ->where('id', '[0-9]+');

    // ajax - page
    Route::post('page/{id}/toggle-publish', array('as' => 'admin.page.toggle-publish', 'uses' => 'PageController@togglePublish'))
        ->where('id', '[0-9]+');
    Route::post('page/{id}/toggle-menu', array('as' => 'admin.page.toggle-menu', 'uses' => 'PageController@toggleMenu'))
        ->where('id', '[0-9]+');

    // ajax - form post
    Route::post('form-post/{id}/toggle-answer', array('as' => 'admin.form-post.toggle-answer', 'uses' => 'FormPostController@toggleAnswer'))
        ->where('id', '[0-9]+');

    // file upload photo gallery
    Route::post('/photo-gallery/upload/{id}', array('as' => 'admin.photo.gallery.upload.image', 'uses' => 'PhotoGalleryController@upload'))
        ->where('id', '[0-9]+');
    Route::post('/photo-gallery-delete-image', array('as' => 'admin.photo.gallery.delete.image', 'uses' => 'PhotoGalleryController@deleteImage'));

    // settings
    Route::get('/settings', array('as' => 'admin.settings', 'uses' => 'SettingController@index'));
    Route::post('/settings', array('as' => 'admin.settings.save', 'uses' => 'SettingController@save'), array('before' => 'csrf'));
  
   //
    Route::get('/statistics',array('as'=>'admin.statistics','uses'=>'StatisticsController@index'));

    // form post
    Route::resource('form-post', 'FormPostController', array('only' => array('index', 'show', 'destroy')));
    Route::get('form-post/{id}/delete', array('as' => 'admin.form-post.delete', 'uses' => 'FormPostController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // slider
    Route::get('/slider', array('as' => 'admin.slider', function () {

        return View::make('backend/slider/index');
    }));

    // slider
    Route::resource('slider', 'SliderController', array('only' => array('index', 'create', 'edit', 'update', 'destroy')));
    Route::get('slider/{id}/delete', array('as' => 'admin.slider.delete', 'uses' => 'SliderController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // file upload slider
    Route::post('/slider/upload/{id}', array('as' => 'admin.slider.upload.image', 'uses' => 'SliderController@upload'))
        ->where('id', '[0-9]+');
    Route::post('/slider-delete-image', array('as' => 'admin.slider.delete.image', 'uses' => 'SliderController@deleteImage'));

    // menu-managment
    Route::resource('menu', 'MenuController');
    Route::post('menu/save', array('as' => 'admin.menu.save', 'uses' => 'MenuController@save'));
    Route::get('menu/{id}/delete', array('as' => 'admin.menu.delete', 'uses' => 'MenuController@confirmDestroy'))
        ->where('id', '[0-9]+');
    Route::post('menu/{id}/toggle-publish', array('as' => 'admin.menu.toggle-publish', 'uses' => 'MenuController@togglePublish'))
        ->where('id', '[0-9]+');

    // log
    Route::any('log', ['as'=>'admin.log', 'uses'=>'LogController@index']);
});

// filemanager
Route::get('filemanager/show', function () {

    return View::make('backend/plugins/filemanager');
})->before('auth.admin');

// login
Route::get('/admin/login', array('as' => 'admin.login', function () {

    return View::make('backend/auth/login');
}));

Route::group(array('namespace' => 'App\Controllers\Admin'), function () {

    // admin auth
    Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));
    Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'AuthController@getLogin'));
    Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'AuthController@postLogin'));

    // admin password reminder
    Route::get('admin/forgot-password', array('as' => 'admin.forgot.password', 'uses' => 'AuthController@getForgotPassword'));
    Route::post('admin/forgot-password', array('as' => 'admin.forgot.password.post', 'uses' => 'AuthController@postForgotPassword'));

    Route::get('admin/{id}/reset/{code}', array('as' => 'admin.reset.password', 'uses' => 'AuthController@getResetPassword'))
        ->where('id', '[0-9]+');
    Route::post('admin/reset-password', array('as' => 'admin.reset.password.post', 'uses' => 'AuthController@postResetPassword'));
});



/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

// error
App::error(function (Exception $exception) {

    Log::error($exception);
    $error = $exception->getMessage();
    return Response::view('errors.error', compact('error'));
});

// 404 page not found
App::missing(function () {

    return Response::view('errors.missing', array(), 404);
});
