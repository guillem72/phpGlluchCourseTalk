<?php
require_once("lib/detectlanguage.php");
use \DetectLanguage\DetectLanguage;
DetectLanguage::setApiKey("YOUR KEY");
lang_dirs();
function lang_dirs()
{
$path=__DIR__."/courses0/";
$path_target=__DIR__."/courses/";
$dir = opendir($path);

while ($item = readdir($dir))
{
	if( $item != "." && $item != ".." && !is_dir($path.$item))
	{
		$info0=file_get_contents($path.$item);
		//echo "\nFIle".$item;
		//var_dump($info0);
		$info=json_decode($info0);
		$t="";
		if (isset($info->title)) $t.=$info->title;
		if (isset($info->description)) $t.=$info->description;
		if ($t==="") echo "Warning: no info in ".$item.PHP_EOL;
		$results =  DetectLanguage::detect($t);
		
		if ($results[0]->isReliable)
		{
			$lang=$results[0]->language;
			if ($lang==="es" OR $lang==="en") $info->language=$lang;
			else 
				{echo $item." is in ".$lang.PHP_EOL;
					$lang="others";
					}
		}
		else
			if ($lang==="es" OR $lang==="en")
			{
				$info->language=$lang;
				$lang="maybe_".$lang;
			}
			else 
			{
				echo $item." is in ".$lang.PHP_EOL;
				$lang="others";
			}
		file_put_contents($path_target.$lang."/".$item,json_encode($info, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	}
}
	
	
}


?>
