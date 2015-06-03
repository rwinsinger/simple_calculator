<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Calculator Project</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/style.css");?>" />
</head>
<body>
<div id="container">

  <h1>Calculator Project - Main</h1> 
  
  <div id="body">
    <h3>Overview</h3>

    <p>This is an overview of the Calculator Project.  I created two different calculators within the Codeigniter framework.
    I wasn't sure from the project description if the preference was for the validation to be mostly contained in the class
    or be handled using the framework, so I did it both ways - doing things different in both implementations.  I will be 
    glad to answer questions as to why I did this way or that way, but basically had fun with it.</p>
    <hr />
    <p><?php echo anchor('form/method1', 'Method #1 - External Class'); ?></p>
    <p><?php echo anchor('form/method2', 'Method #2 - CI Model Class'); ?></p> 
  </div>
</div>
  
</body>
</html>
