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


Route::get('/', function() {
	$allcate1 = App\categories::where('status', '>', 0)->get();
  return view('client.page.home', compact('allcate1', 'TimelinePost', 'LatestPost', 'getTag'));
})->name('homepage');

Route::get('/home', function() {
  return redirect(route('homepage'));
});

Route::pattern('category', '[a-z\-]+');

Route::get('category/{category}/{post?}', function ($category, $post=null) {
	// check sự tồn tại của danh mục
	$getDataCategory = App\subcategories::where('slug', $category)->first();
  if ($getDataCategory != null) {
    	if ($post == null) { // nếu không tồn tại post thì cho vào danh mục
       $getDataPost = App\posts::where('cate_id', $getDataCategory->id)->where('status', '=', 2)->paginate(8);
       return view('client.page.category', compact('getDataCategory', 'getDataPost'));
     }else{
      $getPost=App\posts::where('slug', $post)->where('status', '=', 2)->first();
      if ($getPost != null) {
       return view('client.page.post', compact('getDataCategory', 'getPost'));
     }else{
       return abort(404);
     }
   }
 }
 return abort(404);
})->name('category')->middleware('CountViews');


Route::get('/tag/{tag}', function($tag) {
  echo "$tag";
  return view('client.page.tag');
});

Route::get('/search', function() {
	$q = $_GET['q'];
	$resultSearch = App\posts::where('title', 'like', "%$q%")->where('status', '=', 2)->paginate(10);
	$resultSearch->withPath("search?q=$q");
  return view('client.page.search', compact('resultSearch', 'q'));
});



// login/logout/register

// Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home')->middleware('author.roles');

Route::get('/logout', function() {
  Auth::logout(); 
  return redirect(route('homepage'))->with('msg', 'Đăng Xuất Thành Công');
})->name('logout');


// test
Route::get('ducpanda', function() {
  $linktoken = 'ducpanda.net';
// test là view
  Mail::send('mail.resetpassword', ['linktoken' => $linktoken], function ($message) {
    $message->from('ducbnph05034@fpt.edu.vn', 'ducpanda.net');

    $message->to('ducbnph05034@fpt.edu.vn', 'ducpanda.net');

    $message->subject('quên mật khẩu');
  });
  return view('mail.resetpassword', compact('linktoken'));
});


// -------------------------------------//error view------------------------------------------



Route::get('error404', function() {
  return view('error.404');
})->name('error404');

Route::get('error500', function() {
  return view('error.500');
})->name('error500');



// -------------------------------------<!-- login 2 -->-----------------------------------




Route::get('login', 'Auth\LoginController@index')->name('login');

Route::post('PostLogin', 'Auth\LoginController@store')->name('PostLogin');

Route::get('resetpassword', 'Auth\ResetPasswordController@index')->name('password.request');
Route::post('password/email', 'Auth\ResetPasswordController@store')->name('password.email');

Route::get('changepassword/token={tokenEmail}', 'Auth\ResetPasswordController@edit')->name('password.reset');
Route::post('changepassword', 'Auth\ResetPasswordController@update')->name('password.reset');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@create')->name('register');


// xac minh mail 
Route::get('comfimmail/{token}', 'Auth\RegisterController@comfimmail')->name('comfim.mail');


// ------------------------------------------------------------------------------------------






?>