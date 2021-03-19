<?php 
    include 'header.php';
?>


<div class="index_body">
        <div>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<h1> Dear ". $_SESSION['useruid']. ",</h1>";
                    }
                ?>
            
            <h1>You are welcome.</h1>
                
            <?php
                    if (isset($_SESSION["useruid"])) {
                        echo (" 
                            <div>
                                <p class='index_p'>We have just learnt how to make the sign up and login in page using one of the most powerful server side programming language, PHP. <br> Congratulations !.</p>
                            </div>
                        ");
                    } else {
                        echo (" 
                            <div>
                                <p class='index_p'>We just want to learn how to make the sign up and login in page using one of the most powerful server side programming language, PHP.</p>
                            </div>
                        ");
                    }
                ?>

                <!-- <div>
                    <p class="index_p">We just want to learn how to make the sign up and login in page using one of the most powerful server side programming language, PHP.</p>
                </div> -->
                <div>
                    <p class="index_p">Cheers !</p>
                </div>
        </div>
      
    </div>



<?php 
    include 'footer.php';
?>