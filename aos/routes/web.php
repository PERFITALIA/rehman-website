<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    //header('Location: https://trivenigroup.com/aos/public/admin/login');
    //return view('welcome');
    return redirect('/admin/login');
});

 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace("Admin")->prefix('admin')->group(function(){
Route::get('/', 'HomeController@index')->name('admin.home');


    Route::group(['middleware'=>'auth:admin'],function(){
    
    
    
        //Year
        Route::get('year', ['uses'=>'YearController@index', 'as'=>'year.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('year/add', ['uses'=>'YearController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('year/delete/{id}','YearController@destroy')->name('year.destroy');
        Route::post('year-upload', 'YearController@yearPost')->name('YearPost');
        // Route::post('year/delete/{id}','YearController@destroy')->name('year.destroy');
        Route::get('year/edit/{id}','YearController@edit')->name('year.edit');
        Route::post('year/edit/{id}', 'YearController@edit_year');

        // Compostition  of csr committee
        Route::get('compostion_of_csr_committee', ['uses'=>'CompositionController@index', 'as'=>'composition.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('composition_of_csr_policy/add', ['uses'=>'CompositionController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('composition/delete/{id}','CompositionController@destroy')->name('composition.destroy');
        Route::post('composition-upload', 'CompositionController@CompositionPost')->name('CompositionPost');
        // Route::post('composition/delete/{id}','CompositionController@destroy')->name('composition.destroy');
        Route::get('composition/edit/{id}','CompositionController@edit')->name('composition.edit');
        Route::post('composition/edit/{id}', 'CompositionController@edit_composition');
        
        // CSR Policy
        Route::get('csr_policy', ['uses'=>'CsrController@index', 'as'=>'csr.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('csr_policy/add', ['uses'=>'CsrController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('csr/delete/{id}','CsrController@destroy')->name('csr.destroy');
        Route::post('csr-upload', 'CsrController@CsrPost')->name('CsrPost');
        Route::get('csr/edit/{id}','CsrController@edit')->name('csr.edit');
        Route::post('csr/edit/{id}', 'CsrController@edit_csr');

        // Vigil Mechanism Policy
        Route::get('vigil_mechanism_policy', ['uses'=>'VigilController@index', 'as'=>'vigil .index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('vigil_mechanism_policy/add', ['uses'=>'VigilController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('vigil/delete/{id}','VigilController@destroy')->name('vigil.destroy');
        Route::post('vigil-upload', 'VigilController@VigilPost')->name('VigilPost');
        Route::get('vigil/edit/{id}','VigilController@edit')->name('vigil.edit');
        Route::post('vigil/edit/{id}', 'VigilController@edit_vigil');
       
       
        // Nrc Policy
        Route::get('nrc_policy', ['uses'=>'NrcController@index', 'as'=>'nrc .index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('nrc_policy/add', ['uses'=>'NrcController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('nrc/delete/{id}','NrcController@destroy')->name('nrc.destroy');
        Route::post('nrc-upload', 'NrcController@NrcPost')->name('NrcPost');
        Route::get('nrc/edit/{id}','NrcController@edit')->name('nrc.edit');
        Route::post('nrc/edit/{id}', 'NrcController@edit_nrc');
        
        // Code of independent director
        Route::get('code_of_independent_director', ['uses'=>'CodeController@index', 'as'=>'code.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('code_of_independent_director/add', ['uses'=>'CodeController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('code/delete/{id}','CodeController@destroy')->name('code.destroy');
        Route::post('code-upload', 'CodeController@CodePost')->name('CodePost');
        Route::get('code/edit/{id}','CodeController@edit')->name('code.edit');
        Route::post('code/edit/{id}', 'CodeController@edit_code');
        
        
        // Notice of Agm
        Route::get('notice_of_agm', ['uses'=>'NoticeController@index', 'as'=>'notice.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('notice_of_agm/add', ['uses'=>'NoticeController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('notice/delete/{id}','NoticeController@destroy')->name('notice.destroy');
        Route::post('notice-upload', 'NoticeController@NoticePost')->name('NoticePost');
        Route::get('notice/edit/{id}','NoticeController@edit')->name('notice.edit');
        Route::post('notice/edit/{id}', 'NoticeController@edit_notice');
       
       
        //Annual Return
        Route::get('annual_return', ['uses'=>'AnnualController@index', 'as'=>'annual.index','middleware' => 'App\Http\Middleware\UserRole']);
        Route::get('annual_return/add', ['uses'=>'AnnualController@create','middleware' => 'App\Http\Middleware\UserRole']);
        Route::post('annual/delete/{id}','AnnualController@destroy')->name('annual.destroy');
        Route::post('annual-upload', 'AnnualController@AnnualPost')->name('AnnualPost');
        Route::get('annual/edit/{id}','AnnualController@edit')->name('annual.edit');
        Route::post('annual/edit/{id}', 'AnnualController@edit_annual');
        
        
        
    
        
        //Change Password 
        Route::get('account_settings', 'HomeController@account_settings')->name('account_settings');
        Route::post('change_password', 'HomeController@changePassword')->name('change_password');

 	Route::post('change_password_frontend', 'HomeController@change_password_frontend')->name('change_password_frontend');
        
    });
    

    //Auth
    Route::namespace('Auth')->group(function(){
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
        
    });
    
    //File Manager Working
    Route::group(['prefix' => 'laravel-filemanager', 'middleware'=>'auth:admin'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    
    
});



