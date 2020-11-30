<?php
require_once 'includes/dbconfig.inc.php';
require_once 'includes/db-class.inc.php';
require_once 'includes/header.php';
session_start();

if (isset($_SESSION['CustID'])) {
    header("Location: action_page1.php");
}
?>
<main>
        <div class="signupWrapper">
            <form class="indexForm" action="action_page.php" method="post">
                <div class="frmBtn">
                    <button type="submit">Login</button>
                    <button type="submit">Sign Up</button>
                </div>
                <input type="text" placeholder="SEARCH BOX FOR Paintings" name="pSearch">
            </form>
            <span id="imgCred">Photos by <a href="https://unsplash.com/@deuxdoom?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Eric Park</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        </div>
    </main>

<?php
require_once 'includes/footer.php';
?>