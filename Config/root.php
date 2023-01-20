<?php

$routes=[
    "subscribe" => ["controller" => "login", "function" => "subscribe"],
    "logout" => ["controller" => "login", "function" => "logout"],
    "home" => ["controller" => "home", "function" => "home"],
    'blog/home' => ["controller" => "blog", "function" => "home"],
    'blog/detail/:post' => ["controller" => "blog", "function" => "detail"],
    "login" => ["controller" => "login", "function" => "login"],
    "sendmail" => ["controller" => "home", "function" => "sendMail"],
    "blog/create" => ["controller" => "adminPost", "function" => "createPost"],
    "blog/edit/:post" => ["controller" => "adminPost", "function" => "editPost"],
    "blog/delete/:post" => ["controller" => "adminPost", "function" => "deletePost"],
    "blog/comment/add" => ["controller" => "blog", "function" => "addComment"],
    "click/add" => ["controller" => "blog", "function" => "addClick"],
    "admin/user" => ['controller' => "admin", "function" => "user"],
    "admin/user/switch/:user" => ['controller' => "admin", "function" => "switchUserStatus"],
    "admin/post" => ['controller' => "admin", "function" => "post"],
    "admin/comment" => ['controller' => "admin", "function" => "comment"],
    "admin/comment/switch/:comment" => ['controller' => "admin", "function" => "switchCommentValided"],
];
