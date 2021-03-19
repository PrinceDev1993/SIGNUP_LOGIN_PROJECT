<?php 
    include 'header.php';
?>

<div class="container">
        <div class="wrapper">
            <div class="form_container">
               
                <form action="" method="post">
                    <div class="form_inputs">
                        
                        <div>
                            <label for="">Full Name</label>
                            <input type="text" name="Fname" id="" >
                        </div>

                        <div>
                            <label for="">Email Address</label>
                            <input type="text" name="Email" id="">
                        </div>

                        <div>
                            <label for="">Message</label>
                            <textarea name="message" id="" cols="30" rows="10" value=""><?php echo (isset($_POST['message'])) ? $message: ''; ?></textarea>
                        </div>
                    </div>

                    <div class="sub_btn">
                        <button name="submit" type="submit">Click to Submit</button>
                        <p> </p>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
    
<?php 
    include 'footer.php';
?>