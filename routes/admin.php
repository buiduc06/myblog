<?php 
use Illuminate\Http\Request;




// Route::get('/', function() {
// 	return redirect(route('admin.index'));
// }); 



Route::get('index', function() {
	$countpost = App\posts::count();
	$publicpost = App\posts::where('status', '=', 2)->count();
	$countuser = App\user::count();
	$countview = App\posts::sum('posts.views');

	return view('admin.page.home', compact('countpost', 'publicpost', 'countuser', 'countview'));
})->name('admin.index')->middleware('module.roles');  

   
Route::get('home', function() {

	 $countpost = App\posts::count();
	$publicpost = App\posts::where('status', '=', 2)->count();
	 $countuser = App\user::count();
	 $countview = App\posts::sum('posts.views');

	return view('admin.page.home', compact('countpost', 'publicpost', 'countuser', 'countview'));
})->name('admin.home')->middleware('module.roles'); 




Route::group(['prefix' => 'posts' , 'middleware' => 'module.roles'], function() {
	$n='admin.posts';

	Route::get('/', 'PostsController@index')->name($n);
	Route::get('create', 'PostsController@create')->name($n.'.create');
	Route::post('store', 'PostsController@store')->name($n.'.store');
	Route::get('delete/{id}', 'PostsController@destroy')->name($n.'.delete');
	Route::get('edit/{id}','PostsController@edit')->name($n.'.edit');
	Route::post('update/{id}', 'PostsController@update')->name($n.'.update');
	Route::get('test', 'PostsController@show')->name($n.'test');
});



//category route
Route::group(['prefix' => 'categories', 'middleware' => 'module.roles'], function() {
	$n='admin.categories';

	Route::get('/', 'CategoryController@index')->name($n);
	Route::get('create', 'CategoryController@create')->name($n.'.create');
	Route::get('edit/{id}', 'CategoryController@edit')->name($n.'.edit')->where('id', '[0-9]+');
	Route::post('update/{id}', 'CategoryController@update')->name($n.'.update')->where('id', '[0-9]+');
	Route::post('store', 'CategoryController@store')->name($n.'.store');
	Route::get('delete/{id}', 'CategoryController@destroy')->name($n.'.delete')->where('id', '[0-9]+');

});




// users route
Route::group(['prefix' => 'users', 'middleware' => 'module.roles'], function() {
	$n='admin.users';

	Route::any('/', 'UsersController@index')->name($n);
	Route::get('create', 'UsersController@create')->name($n.'.create');
	Route::post('store', 'UsersController@store')->name($n.'.store');
	Route::post('update/{id}', 'UsersController@update')->name($n.'.update');
	Route::get('delete/{id}','UsersController@destroy')->name($n.'.delete');
	Route::get('edit/{id}', 'UsersController@edit')->name($n.'.edit');
});


Route::group(['prefix' => 'modules', 'middleware' => 'module.roles'], function() {
	$n='admin.modules';

	Route::any('/', 'ModulesController@index')->name($n);
	Route::get('create', 'ModulesController@create')->name($n.'.create');
	Route::post('store', 'ModulesController@store')->name($n.'.store');
	Route::post('update/{id}', 'ModulesController@update')->name($n.'.update');
	Route::get('delete/{id}', 'ModulesController@destroy')->name($n.'.delete');
	Route::get('edit/{id}', 'ModulesController@edit')->name($n.'.edit');

	Route::group(['prefix' => 'submodules'], function() {
		$n='admin.modules.submodules';

		Route::any('/', 'ModulesController@index')->name($n);
		Route::get('create', 'ModulesController@create')->name($n.'.create');
		Route::post('store', 'ModulesController@store')->name($n.'.store');
		Route::post('update/{id}', 'ModulesController@update')->name($n.'.update');
		Route::get('delete/{id}', 'ModulesController@destroy')->name($n.'.delete');
		Route::get('edit/{id}', 'ModulesController@edit')->name($n.'.edit');
	});
});

// phần quyền

Route::group(['prefix' => 'roles', 'middleware' => 'module.roles'], function() {
	$n='admin.roles';
	Route::any('/', 'RolesController@index')->name($n);
	Route::get('Userhasrole', 'RolesController@changeRoleForUsers')->name($n.'.Userhasrole');
	Route::get('updateRoles/{id}', 'RolesController@updateRoles')->name($n.'.updateRoles');
	Route::post('store', 'RolesController@store')->name($n.'.store');
	Route::post('update/{id}', 'RolesController@update')->name($n.'.update');
	Route::get('destroy/{id}', 'RolesController@destroy')->name($n.'.destroy');

});


// xét duuyeet
Route::group(['prefix' => 'approval', 'middleware' => 'module.roles'], function() {
	$n = 'admin.approval';
	Route::any('/', 'ApprovalController@index')->name($n);
	Route::get('show/{id}', 'ApprovalController@show')->name($n.'.show');
	Route::get('update/{id}/{check}', 'ApprovalController@update')->name($n.'.update');
});



Route::group(['prefix' => 'myprofile','middleware' => 'module.roles'], function() {
	$n='admin.myprofile';

	Route::any('/','MyprofileController@index')->name($n);
	Route::post('update/{id}','MyprofileController@update')->name($n.'.update');
	Route::get('edit/{id}','MyprofileController@edit')->name($n.'.edit');
	Route::get('changepassword','MyprofileController@changepassword')->name($n.'.changepassword');
	Route::post('changepassword','MyprofileController@updatepassword')->name($n.'.changepassword');
	Route::get('chatlog','MyprofileController@chatlog')->name($n.'.chatlog');
	Route::post('sendchat','MyprofileController@sendchat')->name($n.'.sendchat');

	// mail
	Route::get('inbox','MyprofileController@inbox')->name($n.'.inbox');
	Route::get('showmail/{id}','MyprofileController@showmail')->name($n.'.showmail');
	Route::get('createmail','MyprofileController@createmail')->name($n.'.createmail');

});



// web_settings
// 

Route::group(['prefix' => 'web_settings','middleware' => 'module.roles'], function() {
	$n='admin.web_settings';

	Route::any('/','Web_settingController@index')->name($n);
	Route::get('/update/{id}/{status}','Web_settingController@update')->name($n.'.update');
});





?>