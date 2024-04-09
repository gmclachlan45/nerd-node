<?php
include_once "../../config.php";
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Nerd Node
        </title>
        <link rel="stylesheet" href="../public/css/reset.css">
        <link rel="stylesheet" href="../public/css/home.css">
        <link rel="stylesheet" href="../public/font/hack.css">
    </head>
    <body>
        <header>

            <?php
            $url = "/BANNED/";
            include "../components/headerBar.php";
            ?>
        </header>

        <main>
            <div class="center banned">
                <p>Dear user,</p>
                <p>
                We regret to inform you that your account has been banned due to repeated violations of our community guidelines and terms of service. This decision was made after careful review and consideration of your actions on the platform.
                </p><p>
                We take the enforcement of our rules very seriously in order to maintain a safe and respectful environment for all users. Unfortunately, your recent conduct has been found to be in breach of these guidelines, leading to the necessary action of banning your account.
                </p>

            </div>

            <?php include "../components/sidebar.php"; ?>
            </div>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
