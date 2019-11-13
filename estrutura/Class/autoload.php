 <?php

function autoLoad($class) {
        include_once "Class/$class.class.php";
}
spl_autoload_register("autoLoad");