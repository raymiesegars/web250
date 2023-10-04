<?php

class ParseCSV {

  //helps to store the delimiter character which we will use later to separate values in the CSV file 
  public static $delimiter = ',';
  private $filename;
  private $header;
  private $data=[];
  private $row_count = 0;

  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  //helps set the filename for the CSV file we want to parse, we can call this with a filename to check if the file exists and is readable. then if the file is valid it sets the filename to '$this->filename'
  public function file($filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  // checks the filename is set, then opens the file and reads each line and separates the values with the commas we set to the delimeter function earlier. It stores the parsed data in the data property and counts the number of rows which then gets returned as an array we can use.
  public function parse() {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
     	  $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
     	}
    }
    fclose($file);
    return $this->data;
  }

  //returns parsed data pretty simple.
  public function last_results() {
    return $this->data;
  }

  // returns the value of the number of rows in the parsed data which is stored in the value '$row_count'
  public function row_count() {
    return $this->row_count;
  }

  //a private method we can use to reset the internal state of the class object. 
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  }

}

?>
