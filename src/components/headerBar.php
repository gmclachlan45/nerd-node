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
            /Home
        </h1>
        <div class="spacer">
        </div>
        <div class="buttonBox">
            <button id="newPost">Make Post</button>
            <?php
            if(isset($_SESSION["sessionId"]) ) {
                echo "<button id='home' onclick='location.href = \"nerd?username=".$_SESSION["sessionUsername"]."\";' >".
                     $_SESSION["sessionUsername"]
                    ."</button>";
                echo "<button id='logout' onclick='location.href = \"logout.php\";' >
                      Log out
                  </button>";
            } else {
                echo "<button id='login' onclick='location.href = \"login\";' >
                      Login/Register
                  </button>";
            }
            ?>
        </div>
    </div>
</html>
