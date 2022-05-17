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
<span class="Flux" id="flux">
    <div class="all-posts" id="allPost">
    </div>
</span>
<script>
const allPost = document.getElementById("allPost")
setInterval(
    fetch("./includes/fetchPost.inc.php", {
        method: "GET",
    })
    .then((resp) => resp.text()).then((json) => {
        let data = JSON.parse(json)
        console.log(data);
        data.forEach(post => {
            let postContainer = document.createElement("div")
            postContainer.classList.add("main-post")
            let postHeader = document.createElement("div")
            postHeader.classList.add("header-post")
            postContainer.appendChild(postHeader)

            let profilePost = document.createElement("div")
            profilePost.classList.add("profil-post")
            postHeader.appendChild(profilePost)

            let userDOM = document.createElement("div")
            userDOM.classList.add("name-date-post")
            userDOM.innerText = post.username
            profilePost.appendChild(userDOM)

            let contentPost = document.createElement("div")
            contentPost.classList.add("content-post")
            contentPost.innerText = post.post_text
            let date = document.createElement("span")
            date.classList.add("date")
            date.innerText = post.post_date

            let PostImg = document.createElement("img")
            PostImg.classList.add("postImg")
            PostImg.src = post.post_img
            contentPost.appendChild(PostImg)

            contentPost.appendChild(date)
            postContainer.appendChild(contentPost)
            allPost.appendChild(postContainer)
        });
    }), 1000
)
</script>