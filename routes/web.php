<?php


$router->post
(
    '/registration','RegistrationController@onRegistration'
);

$router->post
(
    '/login','LoginController@onlogin'
);


$router->post
(
    '/insert',['middleware'=>'auth','uses'=>'PhnBookDetailsController@oninsert']
);

$router->post
(
    '/select',['middleware'=>'auth','uses'=>'PhnBookDetailsController@onselect']
);

$router->post
(
    '/delete',['middleware'=>'auth','uses'=>'PhnBookDetailsController@ondelete']
);

