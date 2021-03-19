<?php 
    include 'header.php';
?>

    <div class="center-container">
        <div class="signup-form">

            <div class="phpEcho">
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "none") {
                            echo "<p class='green'>Signup succesful! Please login...</p>";
                        } elseif ($_GET['error'] == "emptyinput") {
                            echo "<p class='red'>Please fill up all fields correctly!</p>";
                        } elseif ($_GET['error'] == "incorrectpwd") {
                            echo "<p class='red'>Incorrect user password!</p>";
                        }  elseif ($_GET['error'] == "wronglogin") {
                            echo "<p class='red'>Incorrect username!</p>";
                        }
                    }
                ?>  
            </div>
            <h1>Log In</h1>

            <div class="signup_centered">
                <form action="includes/login.inc.php" method="post">
                    <div>
                        <input type="text" name="uid" id="" placeholder="Username/Email...">
                    </div>

                    <div>
                        <input type="password" name="pwd" id="" placeholder="Password...">
                    </div>
                
                    <div class="signup_btn">
                        <button type="submit" name="submit">Log In</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>





<?php 
    include 'footer.php';
?>