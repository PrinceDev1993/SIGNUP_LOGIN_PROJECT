<?php 
    include 'header.php';
?>

<div class="center-container">
    <div class="signup-form">

            <div class="phpEcho">
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyinput") {
                            echo "<p class='red'>Please fill up all fields correctly!</p>";
                        } elseif ($_GET['error'] == "invaliduid") {
                            echo "<p class='red'>Please choose a valid username !</p>";
                        } elseif ($_GET['error'] == "invalidemail") {
                            echo "<p class='red'>Please choose a valid email address!</p>";
                        } elseif ($_GET['error'] == "passworddontmatch") {
                            echo "<p class='red'> Please retype the password accurately </p>";
                        } elseif ($_GET['error'] == "usernamealreadyexit") {
                            echo "<p class='red'> Please username already exist, choose a unique username. </p>";
                        } elseif ($_GET['error'] == "stmtFailed") {
                            echo "<p class='red'>Oops! Something went wrong, try again.</p>";
                        }
                    }
                ?>
            </div>
            <h1>Sign Up</h1>

            <div class="signup_centered">
                <form action="includes/signup.inc.php" method="post">
                    <div>
                        <input type="text" name="name" id="" placeholder="Enter full name...">
                    </div>
                
                    <div>
                        <input type="email" name="email" id="" placeholder="Enter email...">
                    </div>

                    <div>
                        <input type="text" name="uid" id="" placeholder="Username...">
                    </div>

                    <div>
                        <input type="password" name="pwd" id="" placeholder="Password...">
                    </div>

                    <div>
                        <input type="password" name="pwdrepeat" id="" placeholder="Confirm password...">
                    </div>
                
                    <div class="signup_btn">
                        <button type="submit" name="submit">Sign Up</button>
                    </div>
                </form>
            </div>
    </div>
</div>



   

<?php 
    include 'footer.php';
?>