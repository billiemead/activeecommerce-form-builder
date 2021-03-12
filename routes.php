<?php

Route::middleware('web', 'admin')->prefix(config('formbuilder.url_path', '/form-builder'))->namespace('billiemead\FormBuilder\Controllers')->name('formbuilder::')->group(function () {

	Route::redirect('/', url(config('formbuilder.url_path', '/form-builder').'/forms'));

	/* Public form url */
	Route::get('/form/{identifier}', 'RenderFormController@render')->name('form.render');
	Route::post('/form/{identifier}', 'RenderFormController@submit')->name('form.submit');
	Route::get('/form/{identifier}/feedback', 'RenderFormController@feedback')->name('form.feedback');

});

Route::middleware('web', 'admin')->prefix(config('formbuilder.url_path_admin', '/admin/form-builder'))->namespace('billiemead\FormBuilder\Controllers')->name('formbuilder::')->group(function () {

	/* My submission routes */
	Route::resource('/my-submissions', 'MySubmissionController');
	
	/* Form submission management routes */
	Route::name('forms.')->prefix('/forms/{fid}')->group(function () {
			Route::resource('/submissions', 'SubmissionController');
	});

	/* Form management routes */
	Route::resource('/forms', 'FormController');

});