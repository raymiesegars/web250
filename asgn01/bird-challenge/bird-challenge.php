<?php

class Bird {

  var $commonName;
  var $food = "bugs";
  var $nestPlacement = "tree";
  var $conservationLevel;

  function songs() {
  }

  function canFly() {
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, spiders';
$bird1->nestPlacement = 'Ground';
$bird1->conservationLevel = 'Low';

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'roadsides, and railroad rights-of-wafields and on the edges';
$bird2->conservationLevel = 'Low';


echo $bird1->commonName ."<br />";
echo "Food: " . $bird1->food . "<br />";
echo "Builds it's nest: " . $bird1->nestPlacement . "<br />";
echo "Conservation Level: " . $bird1->conservationLevel . "<br />";
echo "Birds song: " . $bird1->songs() . "whatwhat! <br />";
echo $bird1->canFly() . "This bird can Fly <br />";
echo "<br />";
echo $bird2->commonName ."<br />";
echo "Food: " . $bird2->food . "<br />";
echo "Builds it's nest: " . $bird2->nestPlacement . "<br />";
echo "Conservation Level: " . $bird2->conservationLevel . "<br />";
echo "Birds song: " . $bird2->songs() . "drink-your-tea! <br />";
echo $bird2->canFly() . "This bird can Fly <br />";

?>
