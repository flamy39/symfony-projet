<?php

use App\Kernel;
//aergaezrg
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
//test
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
