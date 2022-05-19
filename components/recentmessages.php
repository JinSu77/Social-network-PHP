<?php
require_once "./includes/friends.inc.php";
?>
<section class="RecentMessages">
    <input type="search" name="" id="searchChannel" onkeydown="searchUser()">
    <div class="content">
    </div>
    <div id="discussionlist" class="recent-messages-list">
    </div>
</section>
<script>
const searchUser = (searchInput) => {
    let input = document.getElementById("searchChannel").value;
    let data = new FormData();
    data.append("search", input);
    fetch("./includes/search.inc.php", {
            method: "POST",
            body: data,
        })
        .then((resp) => resp.text())
        .then((json) => {
            let list = document.getElementById("discussionlist");
            list.innerHTML = "";
            let data = JSON.parse(json);
            let usercard = document.createElement("span");
            usercard.classList.add("user-card");
            usercard.innerText = data.username;
            list.appendChild(usercard);
            <?php $friends->ShowChanel();  ?>
        });
};
const searchchanel = () => {
    fetch("./includes/fetchMessage.inc.php", {
            method: "GET",
        })
        .then((resp)=> resp.text())
        .then((json) => {
            let data = JSON.parse(json);
            data.forEach(chanel => {
                let chanel = document.createElement("div");
                chanel.classList.add("main-chanel");
                chanel.id = chanel.id;

                let chanelHeader =  document.createElement("div");
                chanelHeader.classList.add("header");

                let chanelDOM = document.createElement("div");
                chanelDOM.classList.add("name-date-post");
                chanelDOM.innerText = chanel.name;
            });
        })
}
</script>