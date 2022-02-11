<?php
   require APPROOT . '/views/includes/head.php';
?>


<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<?php
    if(isset($_SESSION['account']) && $_SESSION['account'] == 'author'):
        header('location:' . URLROOT . '/pages/index');
    elseif (!$_SESSION['account'] == 'admin' && !$_SESSION['account'] == 'author') :
        header('location:' . URLROOT . '/index');
    endif;
?>

<div class="container">
    <div class="wrapper-login">
        <h2>Register</h2>
            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/users/register"
                >
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="Email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

            <select name="account" id="account">
                <option disabled selected>Account type:</option>
                <option value="admin">Admin</option>
                <option value="author">Author</option>
            </select>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>


<?php
   require APPROOT . '/views/includes/footer.php';
?>