<?php

use Illuminate\Support\Facades\Facade;

return [
    'name' => env('ACC_NAME', 'client'),
    'email' => env('ACC_EMAIL', 'client@mail.com'),
    'password' => env('ACC_PASSWORD', '12345678'),
    'password_confirm' => env('ACC_PASSWORD', '12345678')
];
