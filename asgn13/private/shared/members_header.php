<?php
  if(!isset($page_title)) { $page_title = 'Members Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Birds - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Birds Members Area</h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username; ?></li>
        <li><a href="<?php echo url_for('/members/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/members/logout.php'); ?>">Logout</a></li>
        <?php } ?>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
