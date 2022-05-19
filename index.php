<?php
require_once "./components/header.php" ?>

<div class="welcome-page">
    <?php
    if (isset($_SESSION["useruid"])) {
        @require "./pages/Landing.php";
    } else {
        @require "./Login.php";
    }
    ?>
</div>
<script>
const allPost = document.getElementById("allPost");
const fetchPost = () => {
    fetch("./includes/fetchPost.inc.php", {
            method: "GET",
        })
        .then((resp) => resp.text())
        .then((json) => {
            let data = JSON.parse(json);
            console.log(data);
            data.forEach((post) => {
                let postContainer = document.createElement("div");
                postContainer.classList.add("main-post");

                let postHeader = document.createElement("div");
                postHeader.classList.add("header-post");

                let profilePost = document.createElement("div");
                profilePost.classList.add("profil-post");

                let userDOM = document.createElement("div");
                userDOM.classList.add("name-date-post");
                userDOM.innerText = post.username;

                let contentPost = document.createElement("div");
                contentPost.classList.add("content-post");
                contentPost.innerText = post.post_text;
                let date = document.createElement("span");
                date.classList.add("date");
                date.innerText = post.post_date;

                if (post.post_img !== null) {
                    let PostImg = document.createElement("img");
                    PostImg.classList.add("postImg");
                    PostImg.src = post.post_img;
                    postHeader.appendChild(PostImg);
                }

                postContainer.appendChild(postHeader);
                postHeader.appendChild(profilePost);
                profilePost.appendChild(userDOM);
                contentPost.appendChild(date);
                postContainer.appendChild(contentPost);
                allPost.appendChild(postContainer);
            });
        });
};
setInterval(fetchPost(), 1000)
//Compte le nombre d'amis
fetch("./includes/getUserFriends.inc.php", {
        method: "GET",
    })
    .then((resp) => resp.text())
    .then((res) => {
        document.getElementById("friends").innerText = res;
    })
const toggleModal = () => {
    document.getElementById("modal").classList.toggle("visible")
}
</script>
</body>

</html>