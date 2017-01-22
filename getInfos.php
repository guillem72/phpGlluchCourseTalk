<?php
/**
 * From a list of courses in courses_links0.txt, obtain the
 * information for each course and save it in a dir established
 * in descriptions.php
 *
 **/
require_once __DIR__ . "/descriptions.php";
$master = "courses_links0.txt";
$courses = explode("\n", file_get_contents($master));
//$limit=0;
foreach ($courses as $item) {
    $course = trim($item);
    if (file_exists($course)) {
        get_data($course);
        echo PHP_EOL . "Working in " . basename($course);
    } else {
        echo PHP_EOL . basename($course) . " NOT FOUND";
    }


//if ($limit++>1) break;
}

?>
