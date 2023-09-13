<?php 

class MagicCard {

  protected $manaType;
  protected $convertedManaCost;
  protected $is_creature = false;
  protected $is_instant = false;
  protected $is_equipment = false;
  protected $whatTheCardDoes;
  protected $name;
  protected $rarity;

  public function __construct($name, $rarity, $convertedManaCost) {
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
  }
    
  public function cardDescription() {
    return "Name: {$this->name}, Rarity: {$this->rarity}, Mana Cost: {$this->convertedManaCost}";
  }
}

class CreatureCard extends MagicCard {
  protected $power;
  protected $toughness;

  public function __construct($name, $rarity, $convertedManaCost, $power, $toughness) {
    $this->power = $power;
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
    $this->toughness = $toughness;
  }
  public function cardDescription() {
    return "Name: {$this->name}<br /> Rarity: {$this->rarity}<br /> Mana Cost: {$this->convertedManaCost}<br /> Power: {$this->power}<br /> Toughness: {$this->toughness}";
  }
}

class Instant extends MagicCard {

  protected $effect;

  public function __construct($name, $rarity, $convertedManaCost, $effect) {
    $this->name = $name;
    $this->rarity = $rarity;
    $this->manaCost = $convertedManaCost;
    $this->effect = $effect;
  }

  public function cardDescription() {
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
