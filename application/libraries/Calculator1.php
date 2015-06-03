<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This is an external class for the calculator.  Have setup the constructor to
 * accept the data  This has no validation
 * in it at all and requires the controller to make sure the data is correct and
 * in place.
 *
 * @author rwinsinger
 */
class Calculator1 { 

  // Store the operands, operator, and result.  Made private so only accessible
  // from this class's methods
  private $operand1;
  private $operand2;
  private $operator;
  private $result;
  
  /**
   * Constructor is setup to allow the calculator numbers to be set during
   * instantiating class.  Only tries to test data that has been entered.
   * 
   * @param type $data 
   */
  function __construct($data=FALSE) {
    if ($data !== FALSE) {
      if (isset($data['operand1']) && ($data['operand1'] != '')) {
        $this->setOperand1($data['operand1']);
      }
      if (isset($data['operand2']) && ($data['operand2'] != '')) {
        $this->setOperand2($data['operand2']);
      }
    }
  }
  
  /**
   * Sets the first operand from passed value.  Checks to see if it is numeric 
   * (can be integer or decimal).  Throws exception if not numeric.
   * 
   * @param string $op1
   * @throws Exception 
   */
  public function setOperand1($op1) {
    if (!is_numeric($op1)) {
      throw new Exception('Please enter valid numeric numbers.');
    }
    $this->operand1 = $op1;
  }  
  
  /**
   * Returns the value stored in the first operand variable
   * 
   * @return string 
   */
  public function getOperand1() {
    return ($this->operand1);
  }
  
  /**
   * Sets the second operand from passed value.  Checks to see if it is numeric 
   * (can be integer or decimal).  Throws exception if not numeric.
   * 
   * @param string $op2
   * @throws Exception 
   */
  public function setOperand2($op2) {
    if (!is_numeric($op2)) {
      throw new Exception('Please enter valid numeric numbers.');
    }
    $this->operand2 = $op2;
  }
  
  /**
   * Returns the value stored in the second operand variable
   * 
   * @return string 
   */
  public function getOperand2() {
    return ($this->operand2);
  }
  
  /**
   * Performs the addition of the two operand values.  First checks to verify that
   * they have data in them and throws an exception if not.  If okay, it sets the 
   * operator variable and then performs the calculation - storing it in the class
   * variable.  Finally it returns it to the result.
   * 
   * @return string
   * @throws Exception 
   */
  public function Addition() {
    // Verify that values are there and correct type
    if (!(isset($this->operand1) && isset($this->operand2))) {
      throw new Exception("Both value fields are required");
    }
    
    $this->operator = '+';
    $this->result = $this->operand1 + $this->operand2;
    
    return ($this->result);
  }
  
  /**
   * Performs the subtraction of the two operand values.  First checks to verify that
   * they have data in them and throws an exception if not.  If okay, it sets the 
   * operator variable and then performs the calculation - storing it in the class
   * variable.  Finally it returns it to the result.
   * 
   * @return string
   * @throws Exception 
   */
  public function Subtraction() {
    if (!(isset($this->operand1) && isset($this->operand2))) {
      throw new Exception("Both value fields are required");
    }
    
    $this->operator = '-';
    $this->result = $this->operand1 - $this->operand2;
    
    return ($this->result);
  }
  
  /**
   * Performs the multiplication of the two operand values.  First checks to verify that
   * they have data in them and throws an exception if not.  If okay, it sets the 
   * operator variable and then performs the calculation - storing it in the class
   * variable.  Finally it returns it to the result.
   * 
   * @return string
   * @throws Exception 
   */
  public function Multiplication() {
    if (!(isset($this->operand1) && isset($this->operand2))) {
      throw new Exception("Both value fields are required");
    }
    
    $this->operator = '*';
    $this->result = $this->operand1 * $this->operand2;
    
    return ($this->result);
  }
  
  /**
   * Performs the division of the two operand values.  First checks to verify that
   * they have data in them and throws an exception if not.  If okay, it sets the 
   * operator variable and then performs the calculation - storing it in the class
   * variable.  Finally it returns it to the result.
   * 
   * @return string
   * @throws Exception 
   */
  public function Division() {
    if (!(isset($this->operand1) && isset($this->operand2))) {
      throw new Exception("Both value fields are required");
    } elseif ($this->operand2 == 0) {
      throw new Exception("Dividing by 0 is not allowed");
    }

    $this->operator = '/';
    $this->result = $this->operand1 / $this->operand2;
    
    return ($this->result);
  } 
  
  /**
   * Checks to make sure that all class variables needed have been set (other methods
   * are used to set them).  Then builds a string containing the expression and returns
   * it.  If one or more field is empty, an exception will be thrown.
   * 
   * @return string
   * @throws Exception 
   */
  public function getExpression() {
    if (isset($this->operand1) && isset($this->operand2) && isset($this->operator) && isset($this->result)) {
      return ($this->operand1 ." ". $this->operator ." ". $this->operand2 ." = ". $this->result);
    } else {  
      throw new Exception("Both value fields are required");
    } 
  } 
}

?>