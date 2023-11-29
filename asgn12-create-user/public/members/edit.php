<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$id = $_GET['id'];
$members = Members::find_by_id($id);
if($members == false) {
  redirect_to(url_for('/members/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['members'];
  $members->merge_attributes($args);
  $result = $members->save();

  if($result === true) {
    $session->message('The members was updated successfully.');
    redirect_to(url_for('/members/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Members'; ?>
<?php include(SHARED_PATH . '/members_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="members edit">
    <h1>Edit Members</h1>

    <?php echo display_errors($members->errors); ?>

    <form action="<?php echo url_for('/members/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Members" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/members_footer.php'); ?>
