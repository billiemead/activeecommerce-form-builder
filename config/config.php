<?php
/*--------------------
https://github.com/billiemead/activeecommerce-form-builder.git
Licensed under the GNU General Public License v3.0
Author: Billie Mead (billiemead.com)
Last Updated: 03/15/2021
----------------------*/
return [
    
    /**
     * Front-end URL path to use for this package routes
     */
    'url_path' => '/form-builder',

    /**
     * Back-end URL path to use for this package routes
     */
    'url_path_admin' => '/admin/form-builder',

    /**
     * Front-end Template layout file. This is the path to the layout file your application uses
     */
    'layout_file' => 'frontend.layouts.app',

    /**
     * Back-end Template layout file. This is the path to the layout file your application uses
     */
    'layout_file_admin' => 'backend.layouts.app',

    /**
     * The stack section in the layout file to output js content
     * Define something like @stack('stack_name') and provide the 'stack_name here'
     */
    'layout_js_stack' => 'scripts',

    /**
     * The stack section in the layout file to output css content
     */
    'layout_css_stack' => 'styles',

    /**
     * The class that will provide the roles we will display on form create or edit pages?
     */
    
    'roles_provider' => \App\Role::class,

    /**
     * Models used in form builder
     */
    'models' => [
        'user' => \App\User::class,
    ],
];
