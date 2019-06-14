    <?php





    ROUTE::GROUP(['prefix'=>'admin'] ,function(){
        ROUTE::GET('/',function(){

         return view('layouts.admin1');

        });

        Route::get('/articles', 'ArticleController@index') ; 
        
        Route::post('/article' , 'ArticleController@store');

        Route::get('/article/{id}' , 'ArticleController@show'); 

        Route::get('/article/{id}/edit' ,'ArticleController@edit');

        Route::patch('/article/{id}' ,'ArticleController@update');

        Route::delete('/article/{id}' ,'ArticleController@destroy');
        
        Route::post('/category' ,'CategoryController@store');

        Route::get('/categories' ,'CategoryController@index');
        
        Route::get('/categories/list' , 'CategoryController@list');
        
        Route::get('/category/{category}' ,'CategoryController@show');

        Route::delete('/category/{category}' ,'CategoryController@destroy');
        
        Route::get('/category/{category}/edit' ,'CategoryController@edit');
        
        Route::patch('/category/{category}' ,'CategoryController@update');

        Route::post('/user/get','UserController@index');

        Route::post('/user','UserController@store');
        
        Route::DELETE('/user/{user}','UserController@destroy');

        Route::get('/user/{user}/edit','UserController@edit');

        Route::patch('/user/{user}','UserController@update');

    });

     Route::get('/' ,'HomeController@index');
     Route::get('/articles' ,'IndexController@index');
    
//     Route::POST('/uploadimage' ,'ArticleController@uploadFile');

//     Route::post('/upload' , 'ArticleController@upload');

     Route::get('/categories/list' , 'CategoryController@list');

    
//     Route::get('/categories/all' , 'CategoryController@all');
//     Route::post('/article/{article}/comment' , 'CommentController@store');
    Route::post('/login','UserController@login');
    Route::post('/register','UserController@register');
    Route::post('logout','UserController@logout');

   
