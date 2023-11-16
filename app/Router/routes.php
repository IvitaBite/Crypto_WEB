<?php

return [
    ['GET', '/', ['App\Controllers\CryptoPairController', 'index']],
    ['GET', '/search', ['App\Controllers\CryptoPairController', 'search']],
];
