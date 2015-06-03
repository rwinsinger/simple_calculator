<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

  function __construct() {
    parent::__construct();
    
    // Loading these helpers in constructor since they are used by all main
    // functions.  Could have also set these up in CI config to auto load.
    $this->load->helper(array('form', 'url'));
  }
  
  /**
   *  Main page - can navigate to either calculators
   */
  public function index() { 
    // Display the main page
    $this->load->view('main');
  }

  /**
   * Method #1 - Uses an external calculator class located in the application/libraries
   * directory.  This class is a little more self contained than the 2nd method. It 
   * doesn't use the CI validation.  The class throws exceptions for invalid data
   * or other errors.  Those error messages are then displayed above the fields 
   * on the entry page.
   * 
   * @throws Exception 
   */
  public function method1() {
  
    // Initialize the data array with navigation and available operators
    $data = array();
    $data['methodTitle'] = "Method #1";
    $data['myform'] = "form/method1";
    $data['operators'] = array('+' => '+',
                               '-' => '-',
                               '*' => '*',
                               '/' => '/');
    $result = FALSE;
    
    // If the user submitted the data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Using try/catch to handle missing or invalid data entry
      try {
        // Load the external calculator class & send in user's data
        $this->load->library('calculator1',
                array('operand1' => $this->input->post('value1'),
                      'operand2' => $this->input->post('value2')));

        // Basically just getting object to easier to use name
        $calc = $this->calculator1;
        
        // Based on operator used, perform the correct calculation
        switch ($this->input->post('operator')) {
          case '+' : $calc->Addition();
                     break;
          case '-' : $calc->Subtraction();
                     break;
          case '*' : $calc->Multiplication();
                     break;
          case '/' : $calc->Division();
                     break; 
          default  : throw new Exception("Invalid operator type");
        }

        // Get the expression to send to the view - uses class method
        $data['expression'] = $calc->getExpression();
        
        // Display the results
        $this->load->view('calc_result',$data);
        $result = TRUE;
      }
      catch (Exception $e) {
        $data['error'] = $e->getMessage();
      }
    }

    // Display the entry form if initial entry or not a result
    if (!$result) {
      $this->load->view('calc_form', $data);  
    }    
  }
  
  /**
   * Method #2 - Uses an model calculator class.  This method uses the CI form
   * validation.  The validation can be easier to use, but also needed to have some
   * custom callbacks to handle the data.  Because we use the form validation,
   * it is easier to display field level errors if the occur.
   *  
   */
  public function method2() {
    // Including form validation library
    $this->load->library('form_validation');
    
    // Initialize the data array with navigation and available operators
    $data = array('methodTitle' => "Method #2",
                  'myform'      => 'form/method2');
    
    // Load the calculator model and instantiate the class
    $this->load->model('calculator2');
    $calc = new Calculator2();

    // Setup validation rules for the different input fields
    $this->form_validation->set_rules('value1', 'First Value', 'required|callback_numeric_check');
    $this->form_validation->set_rules('operator', 'Operator', 'required');
    $this->form_validation->set_rules('value2', 'Second Value', 
                  'required|callback_numeric_check|callback_divbyzero_check');

    // Run validation checks - if errors, we will redisplay the entry form
    // with the errors and entered values
    if ($this->form_validation->run() == FALSE) {
      $value = $calc->getOperatorList();

      // Grab the list of supported operators from the class
      $data['operators'] = $calc->getOperatorList();

      // Display the entry form
      $this->load->view('calc_form',$data);

    } else {
      // Data has been validated.. 
      // Now assign the entered numbers in the class
      $calc->setOperand1($this->input->post('value1'));
      $calc->setOperand2($this->input->post('value2'));

      // Set the operator selected
      $calc->setOperator($this->input->post('operator'));

      // Perform the actual calculation
      $calc->calculate();

      // Build the expression to be displayed.  Could have written a method
      // in the model to do this as well - just did it this way to show the 
      // getters can be used to get this information.
      $data['expression'] = $calc->getOperand1() . " " .
                            $calc->getOperator() . " " .
                            $calc->getOperand2() . " = " .
                            $calc->getResult();

      // Display the results
      $this->load->view('calc_result',$data);
    }
  }

  /**
   * Custom validation for testing numeric entry.
   * CI has integer and decimal built in validation, but integer will only allow
   * for whole numbers and decimal will require numbers entered with decimal
   * points.  Using PHP is_numeric to handle entry of both types.  Sets a field
   * level error message if not numeric.
   *
   * @param  string $str
   * @return boolean 
   */
  public function numeric_check($str) {
    // Check if numeric - return TRUE if so
    if (is_numeric($str)) {
      return TRUE;
    } else {
      // if not numeric, set the custom error message and return FALSE
      $this->form_validation->set_message('numeric_check','This %s field must be numeric');
      return FALSE;        
    }
  }
  
  /**
   * Custom validation for testing if user trying to divide by zero.
   * Have to check the posted value to see if dividing and also if divisor was entered
   * as a zero.  Sets a field level error message if trying to divide by zero.
   * 
   * @param  string $str
   * @return boolean 
   */
  public function divbyzero_check($str) {
    // If dividing - need to verify that divisor value isn't 0 and error if is
    if ((($this->input->post('operator')) == '/') && ($str == 0)) {
      // if not numeric, set the custom error message and return FALSE
      $this->form_validation->set_message('divbyzero_check','This %s field must be != 0 for division');
      return FALSE;
    }
    
    return TRUE;
  }
}

?>

