<?php

// echo getcwd();
// echo dirname(getcwd());
// echo realpath(dirname(getcwd()));

////////////////////////////////////////////

// $name = 'ijfsdjdf,g idfpogds.gds;dlf s  .fdg.fdg. dsf.png';

// // $ext = strtolower(end(explode('.', $name)));
// $exploded_array = explode('.', $name);

// $ext = end($exploded_array);




// spl_autoload_register(function ($class) {
//     require dirname(getcwd()).'/'.str_replace('\\','/',$class) .".php";
//     echo $class;
// });


// spl_autoload_register();

// spl_autoload_extensions('.php');


// use db\MyConnection;
// echo MyConnection::connect() != null;

// var_dump(get_include_path());

// echo '<br>';
// var_dump(getcwd());
// echo '<br>';
// var_dump(dirname(getcwd()));
// echo '<br>';
// var_dump(dirname(__DIR__));
// echo '<br>';
// var_dump($_SERVER['CONTEXT_DOCUMENT_ROOT']);




// require dirname(getcwd()) . '/auto_loader.php';

// use Model\Category;


// print_r(Category::getAll());

echo 'getcwd : ' . dirname(getcwd());
echo '<br>file : ' . dirname(__FILE__);
echo '<br>dire : ' . dirname(__DIR__);
