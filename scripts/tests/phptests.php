<?php
echo "Begin PHP tests\n";

// Load config
include_once "../../config.php";

// load all tests
include_once "testfunctions.php";

// run the tests
try {
	// perform some task
    phpVersionTest();
    dbTest();
    bestPostTest();
} catch (Exception $ex) {
    echo "FAILURE!\n";
}
?>
