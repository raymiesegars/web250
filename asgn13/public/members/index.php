<?php require_once('../../private/initialize.php'); ?>


<?php

// Find all members
$members = Members::find_all();

?>
<?php $page_title = 'Members'; ?>
<?php include(SHARED_PATH . '/members_header.php'); ?>

<div id="content">
  <div class="members listing">
    <h1>Members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/members/new.php'); ?>">Add Members</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($members as $members) { ?>
        <tr>
          <td><?php echo h($members->id); ?></td>
          <td><?php echo h($members->first_name); ?></td>
          <td><?php echo h($members->last_name); ?></td>
          <td><?php echo h($members->email); ?></td>
          <td><?php echo h($members->username); ?></td>
          <td><a class="action" href="<?php echo url_for('/members/show.php?id=' . h(u($members->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/members/edit.php?id=' . h(u($members->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/members/delete.php?id=' . h(u($members->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/members_footer.php'); ?>
