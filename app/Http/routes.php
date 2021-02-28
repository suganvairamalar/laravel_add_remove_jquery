<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('voters.bootstrap');
    
});*/
Route::get('/', function () {
    //return view('welcome');
    return view('home');
})->name('home');


/*Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');*/



Route::get('/states','StateController@index')->name('state.index');
Route::post('/state/check','StateController@check')->name('state.check');
Route::post('/stateadd','StateController@insert')->name('state.add');
/*Route::post('/statedetail/{id}','StateController@detail')->name('state.detail');*/
Route::post('/stateupdate/{id}','StateController@update')->name('state.update');
Route::post('/statedelete/{id}','StateController@delete')->name('state.delete');


Route::get('/districts','DistrictController@index')->name('district.index');
Route::post('/district/check','DistrictController@check')->name('district.check');
Route::post('/districtadd','DistrictController@insert')->name('district.add');
/*Route::post('/districtdetail/{id}','DistrictController@detail')->name('district.detail');*/
Route::post('/districtupdate/{id}','DistrictController@update')->name('district.update');
Route::post('/districtdelete/{id}','DistrictController@delete')->name('district.delete');

//PAGINATION
Route::get('/news_pagination','NewsController@index')->name('news.index');
Route::get('/news_pagination/fetch_data','NewsController@fetchdata')->name('news.fetchdata');

//PAGINATION & SORTING
Route::get('/voter_pagination','VoterController@index')->name('voter.index');
Route::get('/voter_pagination/fetch_data','VoterController@fetchdata')->name('voter.fetchdata');

////PAGINATION & SORTING & SEARCHING
Route::get('/author_pagination','AuthorController@index')->name('author.index');
//Route::get('/author_pagination/fetch_data','AuthorController@fetchdata')->name('author.fetchdata');

Route::post('/authoradd','AuthorController@insert')->name('author.add');
Route::post('/authorupdate/{id}','AuthorController@update')->name('author.update');
Route::post('/authordelete/{id}','AuthorController@delete')->name('author.delete');

//JQUERY AND LARAVEL CRUD

Route::get('/sellers','SellerController@index')->name('seller.index');
Route::post('/selleradd','SellerController@insert')->name('seller.insert');
Route::get('/seller/{id}/edit','SellerController@edit')->name('seller.edit');
Route::post('/sellerupdate','SellerController@update')->name('seller.update');
Route::get('/sellerdelete/{id}','SellerController@delete')->name('seller.delete');


Route::get('/students','StudentController@index')->name('student.index');
Route::post('/studentadd','StudentController@insert')->name('student.add');
Route::get('/studentedit/{id}','StudentController@edit')->name('student.edit');
Route::post('/studentupdate','StudentController@update')->name('student.update');
Route::get('/studentdelete/{id}','StudentController@delete')->name('student.delete');

Route::get('/known_technologies','KnownTechnologyController@index')->name('known_technology.index');
Route::post('/known_technology_add','KnownTechnologyController@insert')->name('known_technology.insert');
Route::get('/known_technology_edit/{id}','KnownTechnologyController@edit')->name('known_technology.edit');
Route::post('/known_technology_update','KnownTechnologyController@update')->name('known_technology.update');
Route::get('/known_technology_delete/{id}','KnownTechnologyController@delete')->name('known_technology.delete');

Route::get('/employees','EmployeeController@index')->name('employee.index');
Route::get('/findemployeesposition','EmployeeController@find_employee_position')->name('employee.find_position');
Route::post('/employeeadd','EmployeeController@insert')->name('employee.insert');
Route::get('/employeeedit/{id}','EmployeeController@edit')->name('employee.edit');
Route::post('/employeeupdate','EmployeeController@update')->name('employee.update');
Route::get('/employeedelete/{id}','EmployeeController@delete')->name('employee.delete');



Route::get('/positions','PositionController@index')->name('position.index');
//Route::get('/position_fetch_data','PositionController@fetch_data')->name('position.fetch_data');
Route::post('/position_add_data','PositionController@insert')->name('position.insert');
Route::get('/position_edit_data/{id}','PositionController@edit')->name('position.edit');
Route::post('/position_update_data','PositionController@update')->name('position.update');
Route::get('/position_delete_data/{id}','PositionController@delete')->name('position.delete');



Route::get('/departments','DepartmentController@index')->name('department.index');
Route::post('/department_add_data','DepartmentController@insert')->name('department.insert');
//Route::get('/department_edit_data/{id}','DepartmentController@edit')->name('department.edit');
Route::post('/department_update_data','DepartmentController@update')->name('department.update');
Route::get('/department_delete_data/{id}','DepartmentController@delete')->name('department.delete');

//DYNAMICALLY ADD REMOVE CRUD

Route::get("/languages", "LanguageController@index")->name('language.index');
Route::post('/language_add_data','LanguageController@insert')->name('language.insert');
Route::get('/language_edit_data/{id}','LanguageController@edit')->name('language.edit');
Route::post('/language_update_data','LanguageController@update')->name('language.update');
Route::get('/language_delete_data/{id}','LanguageController@delete')->name('language.delete');


Route::get("/marks","MarkController@index")->name('mark.index');
Route::post('/mark_add_data','MarkController@insert')->name('mark.insert');
Route::get('/mark_edit_data/{id}','MarkController@edit')->name('mark.edit');
Route::post('/mark_update_data','MarkController@update')->name('mark.update');
Route::get('/find_rank','MarkController@find_rank')->name('mark.find_rank');








Route::get("/author_book_details","AuthorBookDetailController@index")->name('author_book_detail.index');
Route::post('/author_book_detail_add_data','AuthorBookDetailController@insert')->name('author_book_detail.insert');

Route::get('/dynamic_fields','DynamicFieldController@index')->name('dynamic_field.index');
Route::post('/dynamic_field_add_data','DynamicFieldController@insert')->name('dynamic_field.insert');

Route::get("/taglists","TaglistController@index")->name('taglist.index');
Route::post("/tag_list_add_data","TaglistController@insert")->name('taglist.insert');




