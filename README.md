#phpGlluchCoursera
 
 ## Preactions
 ### Links
 Get the list of links to the course files and place in *courses_links0.txt*
 For example:
 
 ...
 /compartida/providers/acumen/courses/design-kit-prototyping-2.html
 /compartida/providers/acumen/courses/design-kit-the-course-for-human-centered-design-5.html
 /compartida/providers/canvas-network/courses/exploring-space-weather-and-5e-instructional-model-with-nasa-mms-team.html
 /compartida/providers/careerfoundry/courses/ux-design.html
 /compartida/providers/codecademy/courses/python.html
 /compartida/providers/codecademy/courses/ruby.html
 ...
 
 ### API key 
 You need API Key for detectlanguage.php. The write it in lang_sample.php and rename the file to lang.php
 
 
 ##Order of execution
 
 This files has to be executed in php CLI in this order:
 
 1. php getInfos.php  
 2. php lang.php
 3. php preclean_en.php
 4. php preclean_es.php
 
 ## Result
 The courses information will be in the directory *courses2/en* for english moocs and in *courses2/es* for spanish courses.
 
