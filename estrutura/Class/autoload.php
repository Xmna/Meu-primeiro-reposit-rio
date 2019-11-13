 <?php

function autoLoad($class) {
        include_once "class/$class";
}
spl_autoload_register("autoLoad");