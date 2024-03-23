<!DOCTYPE html>
<html lang="en">
    <div>
        <h1>
            Nerd_Node
        </h1>
        <div id="life">
        </div>
    </div>
    <div class="navbar">
        <h1>
            <?php echo $url ?? '/HOME'; ?>
        </h1>
        <div class="spacer">
        </div>
        <div class="buttonBox">
            <button id="newPost" onclick='location.href = "<?php echo SITEROOT."?newPost=true" ?>";'>Make Post</button>
            <?php
            if(isset($_SESSION["sessionId"]) ) {
                echo "<button id='home' onclick='location.href = \"".SITEROOT."nerd?username=".$_SESSION["sessionUsername"]."\";' >".
                     $_SESSION["sessionUsername"]
                    ."</button>";
                echo "<button id='logout' onclick='location.href = \"".SITEROOT."logout.php\";' >
                      Log out
                  </button>";
            } else {
                echo "<button id='login' onclick='location.href = \"".SITEROOT."login\";' >
                      Login/Register
                  </button>";
            }
            ?>
        </div>
    </div>
</html>
