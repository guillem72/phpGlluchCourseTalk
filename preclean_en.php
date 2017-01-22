<?php
/**
 * Deletes keywords from the json. This keywords are the same for all
 * courses and doesn't add any useful information.
 **/
clean_all();

function clean_all()
{
    $path = __DIR__ . "/courses/en/";
    $path_target = __DIR__ . "/courses2/en/";
    $dir = opendir($path);

    while ($item = readdir($dir)) {
        if ($item != "." && $item != ".." && !is_dir($path . $item)) {
            $info0 = file_get_contents($path . $item);
            $info = json_decode($info0);
            //var_dump($info);

            if (isset($info->keywords) AND $info->keywords) {
                unset($info->keywords);

            }
            $info->source = "coursetalk";


            file_put_contents($path_target . $item, json_encode($info, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }
        //if ($limit++>5) break;
    }
}

?>
