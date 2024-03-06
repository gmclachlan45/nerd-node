<div class="sidebar">
    <div id="bestPost">
        <h2>
            Today's Best Post
        </h2>
        <?php
        include "../renderPosts.php";
        include "getBestPost.php";
        renderPost($bestPost);
        ?>
    </div>
    <div>
        <h2>
            The Rules of Nerd_Node
        </h2>
	    <ol>
		    <li> Stay on Topic - This site is about Computer Science and it's related material </li>
            <li> Respectful Communication - It's fine to disagree, but dont make it personal</li>
            <li> No Flamewars - No Python vs Rust or Apple vs Windows</li>
            <li> No Spamming - Repeated/unoriginal posts will be deleted</li>
            <li> No Shilling - This is not a place to sell your products </li>
            <li> Stay Safe - Don't share content that could be used to identify you </li>
            <li> No Illegal Content - Do not post anything that violates copyright or Canadian law.</li>
        </ol>
        <p>Failure to abide by these rules may result in the deletion of your posts and/or account.</p>
    </div>
</div>
