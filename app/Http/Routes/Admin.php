<?php

    /*Admin dashboard*/
    Route::get('/', ['as' => 'admin.dashboard', 'middleware' => 'acl:dashboard', 'uses' => 'DashboardController@index']);

    //User
    Route::get('users', ['middleware' => 'acl:manage_user', 'as' => 'admin.users', 'uses' => 'UserController@index']);
    Route::get('user/new', ['middleware' => 'acl:add_user', 'as' => 'admin.user.new', 'uses' => 'UserController@create']);
    Route::post('user/store', ['middleware' => 'acl:add_user', 'as' => 'admin.user.store', 'uses' => 'UserController@store']);
    Route::get('user/{id}/edit', ['middleware' => 'acl:edit_user', 'as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
    Route::post('user/{id}/update', ['middleware' => 'acl:edit_user', 'as' => 'admin.user.update', 'uses' => 'UserController@update']);
    Route::get('user/{id}/delete', ['middleware' => 'acl:delete_user', 'as' => 'admin.user.delete', 'uses' => 'UserController@destroy']);

    //Permission Group
    Route::resource('permission-group', 'PermissionGroupController', ['except' => ['store', 'update', 'destroy']]);
    Route::post('permission-group/store', ['middleware' => 'acl:add_permission_group', 'as' => 'admin.permission-group.store', 'uses' => 'PermissionGroupController@store'])->where('id', '[0-9]+');
    Route::post('permission-group/{id}/update', ['middleware' => 'acl:edit_permission_group', 'as' => 'admin.permission-group.update', 'uses' => 'PermissionGroupController@update'])->where('id', '[0-9]+');
    Route::get('permission-group/{id}/delete', ['middleware' => 'acl:delete_permission_group', 'as' => 'admin.permission-group.delete', 'uses' => 'PermissionGroupController@destroy'])->where('id', '[0-9]+');

    //Permission
    Route::resource('permission', 'PermissionController', ['except' => ['store', 'update', 'destroy']]);
    Route::post('permission/store', ['middleware' => 'acl:add_permission', 'as' => 'admin.permission.store', 'uses' => 'PermissionController@store'])->where('id', '[0-9]+');
    Route::post('permission/{id}/update', ['middleware' => 'acl:edit_permission', 'as' => 'admin.permission.update', 'uses' => 'PermissionController@update'])->where('id', '[0-9]+');
    Route::get('permission/{id}/delete', ['middleware' => 'acl:delete_permission', 'as' => 'admin.permission.delete', 'uses' => 'PermissionController@destroy'])->where('id', '[0-9]+');

    //Roles
    Route::resource('role', 'RoleController', ['except' => ['store', 'update', 'destroy']]);
    Route::post('role/store', ['middleware' => 'acl:add_role', 'as' => 'admin.role.store', 'uses' => 'RoleController@store'])->where('id', '[0-9]+');
    Route::post('role/{id}/update', ['middleware' => 'acl:edit_role', 'as' => 'admin.role.update', 'uses' => 'RoleController@update'])->where('id', '[0-9]+');
    Route::get('role/{id}/delete', ['middleware' => 'acl:delete_role', 'as' => 'admin.role.delete', 'uses' => 'RoleController@destroy'])->where('id', '[0-9]+');

    //Menus
    Route::get('menus', ['middleware' => 'acl:manage_menu', 'as' => 'admin.menus', 'uses' => 'MenuController@index']);
    Route::get('menu/new', ['middleware' => 'acl:add_menu', 'as' => 'admin.menu.new', 'uses' => 'MenuController@create']);
    Route::post('menu/save', ['middleware' => 'acl:add_menu', 'as' => 'admin.menu.store', 'uses' => 'MenuController@store']);
    Route::get('menu/{id}/edit', ['middleware' => 'acl:edit_menu', 'as' => 'admin.menu.edit', 'uses' => 'MenuController@edit'])->where('id', '[0-9]+');
    Route::post('menu/{id}/update', ['middleware' => 'acl:edit_menu', 'as' => 'admin.menu.update', 'uses' => 'MenuController@update']);
    Route::get('menu/{id}/delete', ['middleware' => 'acl:delete_menu', 'as' => 'admin.menu.delete', 'uses' => 'MenuController@destroy'])->where('id', '[0-9]+');
    Route::get('menu/article_list', ['as' => 'admin.menu.showArticleList', 'uses' => 'MenuController@showArticleList']);
    Route::get('menu/category_list', ['as' => 'admin.menu.showCategoryList', 'uses' => 'MenuController@showCategoryList']);
    Route::post('menu/update_ordering', ['as' => 'admin.menu.update_ordering', 'uses' => 'MenuController@update_ordering']);

    //Article Category
    Route::get('article_categories', ['middleware' => 'acl:manage_article_category', 'as' => 'admin.article_categories', 'uses' => 'ArticleCategoryController@index']);
    Route::get('article_category/new', ['middleware' => 'acl:add_article_category', 'as' => 'admin.article_category.new', 'uses' => 'ArticleCategoryController@create']);
    Route::post('article_category/save', ['middleware' => 'acl:add_article_category', 'as' => 'admin.article_category.store', 'uses' => 'ArticleCategoryController@store']);
    Route::get('article_category/{id}/edit', ['middleware' => 'acl:edit_article_category', 'as' => 'admin.article_category.edit', 'uses' => 'ArticleCategoryController@edit'])->where('id', '[0-9]+');
    Route::post('article_category/{id}/update', ['middleware' => 'acl:edit_article_category', 'as' => 'admin.article_category.update', 'uses' => 'ArticleCategoryController@update']);
    Route::get('article_category/{id}/delete', ['middleware' => 'acl:delete_article_category', 'as' => 'admin.article_category.delete', 'uses' => 'ArticleCategoryController@destroy'])->where('id', '[0-9]+');

    //Article
    Route::get('articles', ['middleware' => 'acl:manage_article', 'as' => 'admin.articles', 'uses' => 'ArticleController@index']);
    Route::get('article/new', ['middleware' => 'acl:add_article', 'as' => 'admin.article.new', 'uses' => 'ArticleController@create']);
    Route::post('article/save', ['middleware' => 'acl:add_article', 'as' => 'admin.article.store', 'uses' => 'ArticleController@store']);
    Route::get('article/{id}/edit', ['middleware' => 'acl:edit_article', 'as' => 'admin.article.edit', 'uses' => 'ArticleController@edit'])->where('id', '[0-9]+');
    Route::post('article/{id}/update', ['middleware' => 'acl:edit_article', 'as' => 'admin.article.update', 'uses' => 'ArticleController@update']);
    Route::get('article/{id}/delete', ['middleware' => 'acl:delete_article', 'as' => 'admin.article.delete', 'uses' => 'ArticleController@destroy'])->where('id', '[0-9]+');
    Route::get('article/browse_image', ['as' => 'admin.article.browse_image', 'uses' => 'ArticleController@browse_image']);
    Route::get('article/change_upload_path', ['as' => 'admin.article.change_upload_path', 'uses' => 'ArticleController@change_upload_path']);

    //Video Uploader
    Route::resource('video', 'VideoUploadController', ['except' => ['store', 'update', 'destroy']]);
    Route::post('video/store', ['middleware' => 'acl:add_video', 'as' => 'admin.video.store', 'uses' => 'VideoUploadController@store'])->where('id', '[0-9]+');
    Route::post('video/{id}/update', ['middleware' => 'acl:edit_video', 'as' => 'admin.video.update', 'uses' => 'VideoUploadController@update'])->where('id', '[0-9]+');
    Route::get('video/{id}/delete', ['middleware' => 'acl:delete_video', 'as' => 'admin.video.delete', 'uses' => 'VideoUploadController@destroy'])->where('id', '[0-9]+');

    //Course
    Route::get('courses', ['middleware' => 'acl:manage_course', 'as' => 'admin.course', 'uses' => 'CourseController@index']);
    Route::get('course/new', ['middleware' => 'acl:add_course', 'as' => 'admin.course.new', 'uses' => 'CourseController@create']);
    Route::post('course/save', ['middleware' => 'acl:add_course', 'as' => 'admin.course.store', 'uses' => 'CourseController@store']);
    Route::get('course/{id}/edit', ['middleware' => 'acl:edit_course', 'as' => 'admin.course.edit', 'uses' => 'CourseController@edit'])->where('id', '[0-9]+');
    Route::post('course/{id}/update', ['middleware' => 'acl:edit_course', 'as' => 'admin.course.update', 'uses' => 'CourseController@update']);
    Route::get('course/{id}/delete', ['middleware' => 'acl:delete_course', 'as' => 'admin.course.delete', 'uses' => 'CourseController@destroy'])->where('id', '[0-9]+');

    //Lectures
    Route::get('lectures', ['middleware' => 'acl:manage_lecture', 'as' => 'admin.lecture', 'uses' => 'LectureController@index']);
    Route::get('lecture/new', ['middleware' => 'acl:add_lecture', 'as' => 'admin.lecture.new', 'uses' => 'LectureController@create']);
    Route::post('lecture/save', ['middleware' => 'acl:add_lecture', 'as' => 'admin.lecture.store', 'uses' => 'LectureController@store']);
    Route::get('lecture/{id}/edit', ['middleware' => 'acl:edit_lecture', 'as' => 'admin.lecture.edit', 'uses' => 'LectureController@edit'])->where('id', '[0-9]+');
    Route::post('lecture/{id}/update', ['middleware' => 'acl:edit_lecture', 'as' => 'admin.lecture.update', 'uses' => 'LectureController@update']);
    Route::get('lecture/{id}/delete', ['middleware' => 'acl:delete_lecture', 'as' => 'admin.lecture.delete', 'uses' => 'LectureController@destroy'])->where('id', '[0-9]+');
    Route::get('lecture/{id}/video_upload', ['middleware' => 'acl:upload_lecture_video', 'as' => 'admin.lecture.video_upload', 'uses' => 'LectureController@video_upload'])->where('id', '[0-9]+');
    Route::post('lecture/{id}/upload_progress', ['middleware' => 'acl:upload_video_process', 'as' => 'admin.lecture.upload_progress', 'uses' => 'LectureController@upload_progress']);

