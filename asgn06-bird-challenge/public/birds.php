<?php 
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
  include(SHARED_PATH . '/public_header.php');
?>
<link rel="stylesheet" href="stylesheets/public.css">
<div id="main">

  <div id="page">
  <h2>Bird inventory</h2>
  <p>This is a short list -- start your birding!</p>

    <table>
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
      </tr>

<?php

$parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
$bird_array = $parser->parse();

?>
    <?php foreach($bird_array as $args) { ?>
      <?php $bird = new Bird($args); ?>
    <tr>
      <td><?php echo h($bird->commonName); ?></td>
      <td><?php echo h($bird->habitat); ?></td>
      <td><?php echo h($bird->food); ?></td>
      <td><?php echo h($bird->nestPlacement); ?></td>
      <td><?php echo h($bird->behavior); ?></td>
      <td><?php echo h($bird->conservationId); ?></td>
      <td><?php echo h($bird->backyardTips); ?></td>
    </tr>
    <?php } ?>

    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
