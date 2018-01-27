<?php
/*
 *
 * Router::get/post (URLPattern, Controller@Method, Name(Optional))
 * For passing a variable, you can use {}...
 * for example
 * Router::get('/{test}','MainController@passVar','www.test');
 *
 *
 */

Router::get('/', 'HomeController@index', 'www.index');
Router::post('/login', 'HomeController@auth', 'www.do.login');
Router::get('/logout', 'HomeController@logout', 'www.logout');
Router::get('/all','HomeController@allUser','www.profile.all');
Router::get('/{username}', 'HomeController@profile', 'www.profile.index');
Router::post('/asking/{username}/ask/{username2}', 'HomeController@ask', 'www.ask.question');
Router::post('/answer/{username}', 'HomeController@answer', 'www.answer.post');
