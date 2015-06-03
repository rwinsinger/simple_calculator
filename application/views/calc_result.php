<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Calculator Project</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/style.css");?>" />
</head>
<body>
<div id="container">

  <h1>Calculator Project (<?php echo $methodTitle;?>)</h1>
  
  <div id="body">
    <h3><i>Result:</i> &nbsp; <?php echo $expression;?></h3>

    <hr />
    <p>
      <?php echo anchor($myform, 'Try this one again!'); ?><br />
      <?php echo anchor('form', 'Back to main page'); ?> 
    </p>
  </div>
</div>
  
</body>
</html>