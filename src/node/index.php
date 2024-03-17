<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <title>
            Nerd Node
	    </title>
	    <link rel="stylesheet" href="../public/css/reset.css">
	    <link rel="stylesheet" href="../public/css/home.css">
        <link rel="stylesheet" href="../public/font/hack.css">
        <?php include "../../config.php"; ?>
        <?php
        $post_id = 25;
        $title = "Best pos am i crazy";
        $author = "Geber";
        $content = "First of all, he graduated from Harvard Law School and works at a law firm. Like him, I am also seeking a law degree, but Im at Cornell now. He hates that I'm graduating soon and he thinks the entire foundation of legal rule and the sanctity of law will be tarnished once I become a lawyer. To quote him directly, me being in law school is like \"a chimp with a machine gun. During our family Thanksgiving dinner today, he threw a tantrum in front of my family because he wanted to be the only lawyer. He wants to be the pride of the family. \"Cornell University, for Christ's sake?\" He yelled at me as I asked my mom to pass the mashed potatoes. What a joke. I worked my ass off to get where I am! And you take these shortcuts and you think suddenly you're my peer?\" I used to work in the mail room in his law firm. He said he was proud of me then and wishes I never turned my life around. Every day, I think about dropping out and going back to my old job just to make him happy…";
        $popularity = 25747255;
        ?>
    </head>
    <body>
	    <header>
            <div>
	            <h1>
		            Nerd_Node
	            </h1>
                <div id="life">
                </div>
            </div>
            <div class="navbar">
                <h1>
	                /Node -- <?php echo strlen($title) >12 ? trim(substr($title, 0, 12)).'...' : $title; ?>
                </h1>
                <div class="spacer">
                </div>
                <div class="buttonBox">
		            <button id="newPost">Insert(node)</button>
		            <button id="login" onclick="location.href = 'register';">Login(self)</button>
                </div>
        </header>

        <main>
            <div class="center">
            <div class="original post">
                <h3>
                    <?php echo $title;?>
                </h3>
                <p>
                    <?php echo $author; ?>
                </p>
                <p>
                    <?php echo $content; ?>
                </p>
                <div class="interactionBar">
                    <div> &uarr; </div>
                    <div> <?php echo number_format($popularity); ?> </div>
                    <div> &darr; </div>

                    <div class="spacer"> </div>
                    <div> Report this user </div>
                </div>
            </div>
            </div>
            <?php include "../components/sidebar.php" ?>
	    </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>
