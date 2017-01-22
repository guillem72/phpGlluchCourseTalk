#phpGlluchCourseTalk
 
 
phpGlluchMiriadaX is a collection of scripts to obtain 
the metadata from a group of 
[CourseTalk](https://www.coursetalk.com/) courses. 

Tested in january 2017
 
 ## Setup
 
 ### Get all courses
 
 Rip all the site, for example with [HTTrak](http://www.httrack.com/).
 
 ### Get local links
 Go to the ripped site, to *coursetalk.com/providers*. 
 For each provider, go to *PROVIDERNAME/courses*. 
 The list of directories is the list of the courses 
 from that provider. Get it and add to a courses_links0.txt 
 in your home directory.
    
    ls -d $PWD/*/ >> ~/courses_links0.txt
 
 The above comand has to be done for every provider.
 
 ### Place courses_links0.txt
 Move the file *courses_links0.txt* from your home directory 
 to the directory of phpGlluchCourseTalk.
 
 
 ### API key 
 You need API Key for detectlanguage.php. The write it in lang_sample.php and rename the file to lang.php
 
 
 ##Execution order
 
 This files has to be executed in php CLI in this order:
 
 1. **php getInfos.php**. Get the basic information.
 2. **php lang.php**. Detects the language.
 3. Check the files in maybe directories and others and,
  if it is the case, move the courses in the correct directory
 3. **php preclean_en.php**. Deletes the keywords from english courses.
 4. **php preclean_es.php**. Deletes the keywords from spanish courses.
 
 The keywords are the same for all
 courses and doesn't add any useful information
 
 ## Result
 The courses information will be in the directory *courses2/en* for english moocs and in *courses2/es* for spanish courses.
 
 ## Related
 
 phpGlluchCoursera
 
 phpGlluchEdX
 
 phpGlluchMiriadaX
