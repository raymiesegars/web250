<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/stmemberss/index.php'));
}
$id = $_GET['id'];
$members = Members::find_by_id($id);
if($members == false) {
  redirect_to(url_for('/staff/members/index.php'));
}

if(is_post_request()) {

  // Delete members
  $result = $members->delete();
  $session->message('The members was deleted successfully.');
  redirect_to(url_for('members/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Members'; ?>
<?php include(SHARED_PATH . '/members_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to List</a>

  <div class="members delete">
    <h1>Delete Members</h1>
    <p>Are you sure you want to delete this members?</p>
    <p class="item"><?php echo h($members->full_name()); ?></p>

    <form action="<?php echo url_for('members/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Members" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/members_footer.php'); ?>
