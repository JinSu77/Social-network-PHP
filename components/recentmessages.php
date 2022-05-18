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

        });
};
</script>
<?php
$getChannels = "SELECT * FROM chanel WHERE user-id = {$_SESSION['uid']}"
?>