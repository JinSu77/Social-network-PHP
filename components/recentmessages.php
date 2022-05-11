<section class="RecentMessages">
    <input type="search" name="" id="searchuser">
    <div class="content">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['useruid']}");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
        </div>
    </div>
    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
    </header>
    <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
    </div>
    <div id="discussionlist" class="recent-messages-list">

    </div>
</section>
<script>
    userMessages.forEach((msg) => {
        const recentMessages = document.getElementById("discussionlist");
        const username = msg["user"];
        const latestmessage = msg["latestmessage"];
        const read = msg["read"];

        let messageContainer = document.createElement("div");
        messageContainer.classList.add("message-box");
        messageContainer.classList.add(`read-${read}`);

        let usernamehtml = document.createElement("span");
        usernamehtml.classList.add("username");
        usernamehtml.textContent = username;

        let latestmessagehtml = document.createElement("p");
        latestmessagehtml.classList.add("latest-message");
        latestmessagehtml.textContent = latestmessage.substr(0, 25) + "...";

        let pfp = document.createElement("div");
        pfp.classList.add("userpfp");
        messageContainer.append(pfp);
        messageContainer.append(usernamehtml);
        messageContainer.append(latestmessagehtml);
        recentMessages.append(messageContainer);
    });
</script>