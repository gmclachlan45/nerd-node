<?php function renderPost($post) {

    $commentText = $post['commentCount'] ? "Leave a comment (".$post['commentCount'].")" : "Be the first to comment";
    echo "<div class=\"post\">
    <h3>
            <a href='/node?title=".$post['sku']."'>".$post['title']."</a>
    </h3>
    <p>
            <a href='/nerd?title=".$post['author']."'>".$post['author']."</a>
    </p>
    <p>".$post['content']."
    </p>
    <div class='interactionBar'>
        <div> &uarr; </div>
        <div>".$post['likes']." </div>
        <div> &darr; </div>
        <div>
            <a href='/node?title=".$post['sku']."'>".$commentText."</a>
        </div>
        <div class='spacer'> </div>
        <div>
            <a href='/report'> Report user</a>
        </div>
    </div>
</div>";
}
?>
