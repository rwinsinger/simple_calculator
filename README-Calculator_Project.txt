I developed the calculator project in Codeigniter 2.1 because it is the framework that I am most familiar with.  Because I was just going off a short description for this project, I created two different calculators to handle it in somewhat different ways.  I would lean towards using the framework to validate information before adding it to the class, so one method does that whereas the other method has most of the validation in the class.  There are obviously a lot of different ways to write this and I mainly tried to show you my ability and willingness to try different ways of doing things.  I have a high desire to learn as much as I can and grow my skills.  I am eager to learn new things and have an open mind to other ideas and methods of getting the job done.

Regarding this zip package - it contains the whole codeigniter package, so you should be able to drop it in and run it.  If you want to put with existing codeigniter install, you should be able to just copy over the application and css sub-directories.  

Here are the files that I created with...

css/style.css - CSS for project - basically CI default css moved to a file
application/controllers/form.php - one and only controller
application/libraries/Calculator1.php - Class file for Method #1
application/models/calculator2.php - Class file for Method #2
application/views/calc_form.php - Entry page - shared by #1/#2
application/views/calc_result.php - Result page - shared by #1/#2
application/views/main.php - Initial page with links to two calculators
