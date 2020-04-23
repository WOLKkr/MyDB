<?php

include 'vendor/autoload.php';
include 'config.php';

$user = MyDB::conn()->table('users')->where('id',13)->select('id,username')->first();

echo $user->username
