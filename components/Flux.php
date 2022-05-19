<?php include_once("./includes/Post.inc.php"); ?>

<section class="CreatePost">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        PostMaPhoto();
    }
    ?>
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="top">
            <?php echo $_COOKIE["imgsrc"] ?>
            <input type="text" name="post" id="createpostinput" placeholder="What's happenning ?">
        </div>
        <div class="bottom">
            <input type="file" name="createpostImg" id="createpostImg" placeholder="Image">
            <button type="submit" value="post">Send post</button>
            <div style="width:400px; background-color: red">

            </div>
        </div>
    </form>
</section>
<span class="Flux" id="flux">
    <div class="all-posts" id="allPost">
    </div>
</span>