<?php
/**
 * Retrieve and save the information of a course in a courses0 directory.
 * @param $item the local link to the course
**/
require_once __DIR__ . "/course.class.php";
function get_data($item)
{

    $path_target = __DIR__ . "/courses0/";


    $quitar = array
    ("description" => false,
        "contents" => false,
        "instructors" => "Instructors: \n",
        "requirements" => false,
        "length" => false,
        "effort" => false,
        "prices" => false,
        "institutions" => false,
        "subjects" => false,
        "language" => false,
        "url" => false,
        "title" => false,
        "keywords" => false
    );

    $quitar_donde = array(
        "description" => false,
        "contents" => false,
        "instructors" => "beginning",
        "requirements" => false,
        "length" => false,
        "effort" => false,
        "prices" => false,
        "institutions" => false,
        "subjects" => false,
        "language" => false,
        "url" => false,
        "title" => false,
        "keywords" => false
    );

    $query = array(
        "description" => '//div[@class="course-info__academic__item--extra-whitespace" and @itemprop="description"]',
        "contents" => false,
        "instructors" => '//div[ i[@class="course-info__academic__instuctor-icon"]]',
        "requirements" => false,
        "length" => false,
        "effort" => false,
        "prices" => '//meta[@itemprop="price"]/@content',
        "institutions" => '//div[ i[@class="course-info__academic__school-icon"]]',
        "subjects" => false,
        "language" => false,
        "url" => '//meta[@property="og:url"]/@content',
        "title" => '//h1[@class="course-header__name__title"]',
        "keywords" => '//meta[@name="keywords"]/@content'
    );
    $no_xpath = array();

    $ct = new Course($item);
    $ct->quitar = $quitar;
    $ct->quitar_donde = $quitar_donde;
    $ct->query = $query;
    $ct->no_xpath = $no_xpath;
    $filename2 = trim(basename($item, ".html"));
    $ct->get_info_course();
    //if ($edx->query["language"]) $filename2=$edx->processed["language"]."/".$filename2;
    $ct->save($path_target . $filename2 . ".json");
}

?>
