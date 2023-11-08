<?php
class Bird {

  // ----- START OF ACTIVE RECORD CODE ------
  static protected $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM birds";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM birds ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  /*
  Use the wnc-birds.csv file to create the properties
  Make all of the properties public.
  */
  public $common_name;
  public $habitat;
  public $food;
  public $conservation_id;
  public $backyard_tips;
  
  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */

  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];
  

  /*
  - Create a public __contruct that accepts a list of $args[]
    - Use the Null coalescing operator
    - Create a default value of 1 for conservation_id
  */
  
  public function __construct($args=[]) {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? 1;
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }


  /*
  Create a public method called conservation(). This method should mimic the
  public function condition() from the bicycle.class.php file
  */
  public function conservation() {
    if($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }

}

?>
