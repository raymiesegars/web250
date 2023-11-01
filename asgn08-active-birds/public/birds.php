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
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
      </tr>

<?php

$birds = Bird::find_all();

?>
    <?php foreach($birds as $bird) { ?>
    <tr>
      <td><?php echo h($bird->common_name); ?></td>
      <td><?php echo h($bird->habitat); ?></td>
      <td><?php echo h($bird->food); ?></td>
      <td><?php echo h($bird->conservation_id); ?></td>
      <td><?php echo h($bird->backyard_tips); ?></td>
    </tr>
    <?php } ?>

    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
