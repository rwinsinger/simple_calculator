<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Calculator Project</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/style.css"); ?>" />
  </head>
  <body>

    <?php
    // With CI, you can create an array with input field configuration and then 
    // pass that to the build in method.  I have setup one input that way and the 
    // other with standard html.  Both re-populate the field if there are errors
    // with the form.
    $value1Details = array(
        'name' => 'value1',
        'id' => 'value1',
        'value' => set_value('value1'),
        'maxlength' => '20',
        'size' => '15',
    );
    ?>
    <div id="container">

      <h1>Calculator Project (<?php echo $methodTitle;?>)</h1>

      <div id="body">
        <div>
        <span class="error"><?php if (isset($error)) { echo $error; }?></span>
        </div>

        <?php echo form_open($myform); ?>

        <table>
          <tr>
            <td><h5>First Value:</h5></td>
            <td><?php echo form_input($value1Details); ?></td>
            <td><?php echo form_error('value1','<div class="fld_error">','</div'); ?></td>
            </td></tr>
          <tr>
            <td><h5>Operator Type:</h5></td>
            <td><?php echo form_dropdown('operator', $operators, set_value('operator')); ?></td>
            <td><?php echo form_error('operator','<div class="fld_error">','</div'); ?></td>
          </tr>
          <tr>
            <td><h5>Second Value:</h5></td>
            <td><input type="text" name="value2" value="<?php echo set_value('value2'); ?>" size="15" maxsize="20" /></td>
            <td><?php echo form_error('value2','<div class="fld_error">','</div'); ?></td>
          </tr>
        </table>  

        <p><input type="submit" value="Calculate" /> &nbsp; <?php echo anchor('form', 'Back to main page'); ?></p>

        </form>
      </div>
    </div>

  </body>
</html> 
