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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/home', 'Web\HomeController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Admin\Auth\RegisterController@register');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function() {

    Route::get('/', 'Admin\HomeController@index');

    Route::get('/logout', 'Admin\Auth\LoginController@logout');

    //用户管理
    Route::get('/account', 'Admin\AccountController@index');
    Route::post('/account/query', 'Admin\AccountController@queryAccount');
    Route::post('/account/save', 'Admin\AccountController@saveAccount');
    Route::post('/account/update', 'Admin\AccountController@updateAccount');
    Route::get('/account/delete/{id}', 'Admin\AccountController@deleteAccount');
    Route::get('/account/showResetPassword/{id}', 'Admin\AccountController@showResetPassword');
    Route::post('/account/resetPassword', 'Admin\AccountController@resetPassword');
    Route::get('/account/export', 'Admin\AccountController@export');

    //角色管理
    Route::get('/role', 'Admin\RoleController@index');
    Route::post('/role/query', 'Admin\RoleController@queryRole');
    Route::get('/role/add', 'Admin\RoleController@addRole');
    Route::post('/role/save', 'Admin\RoleController@saveRole');
    Route::get('/role/edit/{id}', 'Admin\RoleController@editRole');
    Route::post('/role/update', 'Admin\RoleController@updateRole');
    Route::get('/role/delete/{id}', 'Admin\RoleController@deleteRole');
    Route::get('/role/getRoleTree', 'Admin\RoleController@getRoleTree');
    Route::get('/role/selectMenus/{id}', 'Admin\RoleController@selectMenus');
    Route::post('/role/saveMenus', 'Admin\RoleController@saveMenus');

    //角色成员管理
    Route::get('/roleMember', 'Admin\RoleMemberController@index');
    Route::post('/roleMember/query', 'Admin\RoleMemberController@queryRoleMember');
    Route::get('/roleMember/add', 'Admin\RoleMemberController@addRoleMember');
    Route::post('/roleMember/save', 'Admin\RoleMemberController@saveRoleMember');
    Route::get('/roleMember/delete/{s_role_id}/{account_id}', 'Admin\RoleMemberController@deleteRoleMember');

    //群组管理
    Route::get('/group', 'Admin\GroupController@index');
    Route::get('/group/get/{id}', 'Admin\GroupController@getGroupById');
    Route::get('/group/add', 'Admin\GroupController@addGroup');
    Route::post('/group/save', 'Admin\GroupController@saveGroup');
    Route::get('/group/edit/{id}', 'Admin\GroupController@editGroup');
    Route::post('/group/update', 'Admin\GroupController@updateGroup');
    Route::get('/group/delete/{id}', 'Admin\GroupController@deleteGroup');
    Route::get('/group/getGroupTree', 'Admin\GroupController@getGroupTree');

    //群组成员管理
    Route::get('/groupMember', 'Admin\GroupMemberController@index');
    Route::post('/groupMember/query', 'Admin\GroupMemberController@queryGroupMember');
    Route::get('/groupMember/add', 'Admin\GroupMemberController@addGroupMember');
    Route::post('/groupMember/save', 'Admin\GroupMemberController@saveGroupMember');
    Route::get('/groupMember/delete/{s_group_id}/{account_id}', 'Admin\GroupMemberController@deleteGroupMember');
    Route::get('/groupMember/selectGroup/{account_id}', 'Admin\GroupMemberController@selectGroup');
    Route::post('/groupMember/saveGroupGrant', 'Admin\GroupMemberController@saveGroupGrant');
    Route::get('/groupMember/getSelectedGroupTree/{account_id}', 'Admin\GroupMemberController@getSelectedGroupTree');

    //菜单管理
    Route::get('/menu', 'Admin\MenuController@index');
    Route::get('/menu/add', 'Admin\MenuController@addMenu');
    Route::post('/menu/save', 'Admin\MenuController@saveMenu');
    Route::get('/menu/edit/{id}', 'Admin\MenuController@editMenu');
    Route::post('/menu/update', 'Admin\MenuController@updateMenu');
    Route::get('/menu/delete/{id}', 'Admin\MenuController@deleteMenu');
    Route::get('/menu/getFirstMenu', 'Admin\MenuController@getFirstMenu');
    Route::get('/menu/getMenuTree', 'Admin\MenuController@getMenuTree');

    //内容管理===栏目
    Route::get('/cms/catalog', 'Admin\Cms\CmsCatalogController@index');
    Route::get('/cms/catalog/add', 'Admin\Cms\CmsCatalogController@addCatalog');
    Route::post('/cms/catalog/save', 'Admin\Cms\CmsCatalogController@saveCatalog');
    Route::get('/cms/catalog/edit/{id}', 'Admin\Cms\CmsCatalogController@editCatalog');
    Route::post('/cms/catalog/update', 'Admin\Cms\CmsCatalogController@updateCatalog');
    Route::get('/cms/catalog/delete/{id}', 'Admin\Cms\CmsCatalogController@deleteCatalog');
    Route::get('/cms/catalog/getCatalogByParent/{id}', 'Admin\Cms\CmsCatalogController@getCatalogByParent');

    //内容管理===文章
    Route::get('/cms/article', 'Admin\Cms\CmsArticleController@index');
    Route::post('/cms/article/query', 'Admin\Cms\CmsArticleController@queryArticle');
    Route::post('/cms/article/save', 'Admin\Cms\CmsArticleController@saveArticle');
    Route::post('/cms/article/update', 'Admin\Cms\CmsArticleController@updateArticle');
    Route::get('/cms/article/delete/{id}', 'Admin\Cms\CmsArticleController@deleteArticle');
    Route::get('/cms/article/updateIsTopStatus/{id}/{status}', 'Admin\Cms\CmsArticleController@updateIsTopStatus');
    Route::get('/cms/article/updateCommentStatus/{id}/{status}', 'Admin\Cms\CmsArticleController@updateCommentStatus');
    Route::get('/cms/article/updateVisibilityStatus/{id}/{status}', 'Admin\Cms\CmsArticleController@updateVisibilityStatus');

    //内容管理===评论
    Route::get('/cms/comment', 'Admin\Cms\CmsCommentController@index');
    Route::post('/cms/comment/query', 'Admin\Cms\CmsCommentController@queryComment');
    Route::get('/cms/comment/delete/{id}', 'Admin\Cms\CmsCommentController@deleteComment');
    Route::get('/cms/comment/view/{id}', 'Admin\Cms\CmsCommentController@viewComment');
    Route::get('/cms/comment/edit/{id}', 'Admin\Cms\CmsCommentController@editComment');
    Route::post('/cms/comment/update', 'Admin\Cms\CmsCommentController@updateComment');
    Route::post('/cms/comment/updateStatus', 'Admin\Cms\CmsCommentController@updateStatus');

});

Auth::routes();
