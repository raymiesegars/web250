<?php

class Bird {
  
  public static $instance_count = 0;
  public static $egg_num = 0;

  var $habitat;
  var $food;
  var $nesting = "tree";
  var $conservation;
  var $song = "chirp";
  var $flying = "yes";

  function can_fly() {
    $flying_string = $this->flying == "yes" ? "bird can fly" : "cannot fly and is stuck on the ground";
    return $flying_string;
  }

  public static function create() {
    self::$instance_count++;
    return new self();
  }
}

class YellowBelliedFlyCatcher extends Bird {
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";

    public static $egg_num = "3-4, sometimes 5";
}

echo "Bird instances: " . Bird::$instance_count . "\n";
echo "YellowBelliedFlyCatcher instances: " . YellowBelliedFlyCatcher::$instance_count . "\n";
echo "Kiwi instances: " . Kiwi::$instance_count . "\n";

$newBird = Bird::create();
$newFlyCatcher = YellowBelliedFlyCatcher::create();
$newKiwi = Kiwi::create();

echo "Bird instances: " . Bird::$instance_count . "\n";
echo "YellowBelliedFlyCatcher instances: " . YellowBelliedFlyCatcher::$instance_count . "\n";
echo "Kiwi instances: " . Kiwi::$instance_count . "\n";
?>