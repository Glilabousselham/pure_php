<?php


spl_autoload_register(function($cls){
    require 'app/'.str_replace('\\','/',$cls).'.php';
});