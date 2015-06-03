<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * One way to setup the calculator was to build a model class for it.  This is 
 * much like the external class - just another way to do it.  This has no validation
 * in it at all and requires the controller to make sure the data is correct and
 * in place.
 *
 * @author rwinsinger
 */
class Calculator2 extends CI_Model { 

  private $operand1;
  private $operand2;
  private $result;
  private $operator;
  private $operatorList = array('+' => '+',
                                '-' => '-',
                                '*' => '*',
                                '/' => '/');
  
  public function __construct() {
    parent::__construct();
  }

  /**
   * Sets the first operand from passed value.  
   * 
   * @param string $op
   */
  public function setoperand1($op) {
    $this->operand1 = $op;
  }

  /**
   * Gets the first operand from class variable
   */
  public function getoperand1() {
    return ($this->operand1);
  }
  
  /**
   * Sets the second operand from passed value.  
   * 
   * @param string $op
   */
  public function setoperand2($op) {
    $this->operand2 = $op;
  }
  
  /**
   * Gets the second operand from class variable
   */
  public function getoperand2() {
    return ($this->operand2);
  }
  
  /**
   * Sets the operator from passed value.  
   * 
   * @param string $op
   */
  public function setOperator($operator) {
    $this->operator = $operator;  
  }
  
  /**
   * Gets the operator from class variable
   */
  public function getOperator() {
    return ($this->operator);
  }
  
  /**
   * Gets the array containing the different operators 
   */
  public function getOperatorList() {
    return ($this->operatorList);
  }
  
  /**
   * Performs the addition of the two operand values. 
   */
  public function addNumbers() {
    $this->result = $this->operand1 + $this->operand2;
  }
  
  /**
   * Performs the substraction of the two operand values. 
   */
  public function subNumbers() {
    $this->result = $this->operand1 - $this->operand2;
  }
  
  /**
   * Performs the multiplication of the two operand values. 
   */
  public function multNumbers() {
    $this->result = $this->operand1 * $this->operand2;
  }
  
  /**
   * Performs the division of the two operand values. 
   */
  public function divNumbers() {
    $this->result = $this->operand1 / $this->operand2;
  }
  
  /**
   * Performs the calculation depending what the operator class variable has 
   * been set to.
   * 
   * @return boolean 
   */
  public function calculate() {

    switch($this->operator) {
      case '+': $this->addNumbers();
                break;
      case '-': $this->subNumbers();
                break;
      case '*': $this->multNumbers();
                break;
      case '/': $this->divNumbers();
                break;
      default : return (FALSE);
    }

    return (TRUE);
  }
  
  /**
   * Gets the result from class variable
   * 
   * @param string $op
   */
  public function getResult() {
    return ($this->result);
  }
}
?>
