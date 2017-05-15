<?php

    function pre_print_r($var) {
        echo '<pre style="display: none">' . print_r($var, true) . '</pre>';
    }

    function die_print_r($var) {
        die ('<pre>' . print_r($var, true) . '</pre>');
    }

?>
