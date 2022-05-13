<section class="RecentMessages">
    <input type="search" name="" id="searchuser" onchange="searchUser()" onkeydown="searchUser()">
    <div class="content">
    </div>
    <div id="discussionlist" class="recent-messages-list">

    </div>
</section>
<script>
    const searchUser = (searchInput) => {
        let input = document.getElementById("searchuser").value
        let data = new FormData();
        data.append("search", input);
        fetch("./includes/search.inc.php", {
                method: "POST",
                body: data,
            })
            .then((resp) => resp.text())
            .then((json) => {
                console.log(json);
            });
    };
</script>
<?php
$getChannels = "SELECT * FROM chanel WHERE user-id = {$_SESSION['uid']}"
?>