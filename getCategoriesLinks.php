<?php
require_once  __DIR__."/descriptions.php";
$path=__DIR__."/raw/subjects/";
$dir0 = opendir($path);
//$limit=0;
while ($dir1 = readdir($dir0)){
if( $dir1 != "." && $dir1 != ".." && is_dir($path.$dir1))
{	
		$dir=opendir($path.$dir1);
		while ($item = readdir($dir))
		{
			//echo "\n".$path.$dir1."\n";
			//var_dump ($item);
			if ($item=="courses.html" && $doc0=file_get_contents($path.$dir1."/".$item))
			{
				//var_dump($doc0);	
				$doc = new DOMDocument();
				@$doc->loadHTML($doc0);
				//var_dump($doc);
				$xpath = new DOMXPath($doc);
				$query = '//a[@class="link-unstyled js-course-search-result"]';
				$descs = $xpath->query($query);
				//var_dump($descs);
				//echo "\n".$item."\n";
				//foreach($descs as $desc){echo "\n".$desc;}
				foreach ($descs as $des) 
				{
					//var_dump($des);
					$file_name=$des->getAttribute('href');
					echo "\n".$file_name;
					
				}
			}
		}
	
}
else
{
	;//echo "Warning: there is a dir in courses";
}
//if ($limit++>1) break;
}

?>
