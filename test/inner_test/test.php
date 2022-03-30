<?php

echo 'getcwd : ' . dirname(getcwd());
echo '<br>file : ' . dirname(__FILE__);
echo '<br>dire : ' . dirname(__DIR__);
echo '<br>dire real path : ' . realpath(dirname(__DIR__));
echo '<br>root dir : ';
var_dump($_SERVER['DOCUMENT_ROOT']);