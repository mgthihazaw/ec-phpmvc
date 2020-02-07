<?php
// phpinfo();
// die();
require_once '../bootstrap/init.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$user = Capsule::table('users')->where('id', 1)->first();
var_dump($user->username);