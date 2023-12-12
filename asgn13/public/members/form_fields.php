<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($members)) {
  redirect_to(url_for('/members/index.php'));
}
?>

<table>
  <dl>
    <dt>First name</dt>
    <dd><input type="text" name="members[first_name]" value="<?php echo h($members->first_name); ?>" /></dd>
  </dl>

  <dl>
    <dt>Last name</dt>
    <dd><input type="text" name="members[last_name]" value="<?php echo h($members->last_name); ?>" /></dd>
  </dl>

  <dl>
    <dt>Email</dt>
    <dd><input type="text" name="members[email]" value="<?php echo h($members->email); ?>" /></dd>
  </dl>

  <dl>
    <dt>Username</dt>
    <dd><input type="text" name="members[username]" value="<?php echo h($members->username); ?>" /></dd>
  </dl>

  <dl>
    <dt>Password</dt>
    <dd><input type="password" name="members[password]" value="" /></dd>
  </dl>

  <dl>
    <dt>Confirm Password</dt>
    <dd><input type="password" name="members[confirm_password]" value="" /></dd>
  </dl>
</table>
