<?php
require_once 'includes/header.php';
?>
     <div class="loginWrapper">
            <h1>User Log In</h1>

            <form class="loginForm" action="action_page.php" method="post">
                <div class="container">
                    <input type="text" placeholder="Enter Email" name="uname" required>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <div class="frmBtn">
                        <button type="submit">Login</button>
                        <button type="button" class="cancelbtn">Sign Up</button>
                    </div>
                </div>

                <div class="misc">
                    <span class="psw"><a href="#">Forgot password?</a></span>
                </div>
            </form>

        </div>
 
<?php
require_once 'includes/footer.php';
?>