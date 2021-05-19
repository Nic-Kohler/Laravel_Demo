<?php

use Illuminate\Support\Facades\Route;


Route::get("/", function(){ return view("welcome"); });

Route::get("/dashboard", "Controller@dashboard")->middleware(["auth"])->name("dashboard");

Route::resource("posts", "PostPagesController");

require __DIR__ . "/auth.php";
