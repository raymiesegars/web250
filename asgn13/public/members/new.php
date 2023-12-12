<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['members'];
  $members = new Members($args);
  $result = $members->save();

  if($result === true) {
    $new_id = $members->id;
    $session->message('The members was created successfully.');
    redirect_to(url_for('/members/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $members = new Members;
}

?>

<?php $page_title = 'Create Members'; ?>
<?php include(SHARED_PATH . '/members_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="members new">
    <h1>Create Members</h1>
    <?php echo url_for('/members/new.php'); ?>
    <?php echo display_errors($members->errors); ?>

    <form action=<?php echo "process_user_creation.php";?> method="post">

    <?php include('form_fields.php'); ?>

    <div class="g-recaptcha"            data-sitekey="6LcXRyEpAAAAAPeu17nDQFEywiw7J0Ml5RJeegV_">
    </div>
    <input type="submit" value="submit">
    </form>
    <script src="https://www.google.com/recaptcha/api.js"></script>
      
  </div>

</div>
  

<?php include(SHARED_PATH . '/members_footer.php'); ?>
