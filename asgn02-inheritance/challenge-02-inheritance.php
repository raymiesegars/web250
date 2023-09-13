<?php 

class MagicCard {

  var $manaType;
  var $convertedManaCost;
  var $is_creature = false;
  var $is_instant = false;
  var $is_equipment = false;
  var $whatTheCardDoes;
  var $name;
  var $rarity;

  function __construct($name, $rarity, $convertedManaCost) {
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
  }
    
  function cardDescription() {
    return "Name: {$this->name}, Rarity: {$this->rarity}, Mana Cost: {$this->convertedManaCost}";
  }
}

class CreatureCard extends MagicCard {
  var $power;
  var $toughness;

  function __construct($name, $rarity, $convertedManaCost, $power, $toughness) {
    $this->power = $power;
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
    $this->toughness = $toughness;
  }
  function cardDescription() {
    return "Name: {$this->name}<br /> Rarity: {$this->rarity}<br /> Mana Cost: {$this->convertedManaCost}<br /> Power: {$this->power}<br /> Toughness: {$this->toughness}";
  }
}

class Instant extends MagicCard {

  var $effect;

  function __construct($name, $rarity, $convertedManaCost, $effect) {
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
    $this->effect = $effect;
  }

  function cardDescription() {
    return "Name: {$this->name}<br /> Rarity: {$this->rarity}<br /> Mana Cost: {$this->convertedManaCost}<br /> SpellEffect: {$this->effect}";
  }
}

$creatureCard = new CreatureCard("Llanowar Elves", "Common", "1", 2, 2);
$instant = new Instant("Lightning Bolt", "Common", "1", "Deal 3 damage to target creature or player.");

echo $creatureCard->cardDescription() . PHP_EOL;
echo '<br />';
echo '<br />';
echo $instant->cardDescription() . PHP_EOL;

?>
