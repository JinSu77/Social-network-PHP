<?php include_once("./includes/Post.inc.php"); ?>

<section class="CreatePost">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        PostMaPhoto();
    }
    ?>
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="top">
            <?php afficherMonImageDeProfil($id) ?>
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
<section class="Flux">
    <div class="all-posts" id="allPost">
        <div class="main-post">
            <div class="header-post">
                <div class="profile-post">
                    <a class="picture-post" href="/search?query=%40{{this.name}}">&nbsp;</a>
                    <div class="name-date-post">
                        <?= $_SESSION["useruid"] ?>
                        <a href="/search?query=%40{{this.name}}" class="name-post"></a>
                    </div>
                    <?= $teest["post_img"]; ?>

                </div>
            </div>
            <div class="content-post">
                <?= $teest["post_text"]; ?>
                <div class="date-post"><?= $teest["post_date"] ?></div>
            </div>
            <div class="bottom-post">
                <div class="like-post">👍</div>
                <div class="comment-post">💬</div>
            </div>
        </div>
    </div>
</section>