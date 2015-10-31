<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;
use Helpers\Files;

/** Define routes. */
Router::any('', 'Controllers\Welcome@index');
Router::any('subpage', 'Controllers\Welcome@subPage');
Router::any('download/(:all)', function($file){

    echo Files::download($file);

});


/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
