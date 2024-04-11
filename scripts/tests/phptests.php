<?php
/*
   Just a note, we don't have any API endpoints
   that just give info themselves, so the only real thing
   we can test is that the DB connects.

   You can't say we didn't try.
 */
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
    adminExistsTest();
} catch (Exception $ex) {
    echo "FAILURE!\n";
    die();
}
?>
