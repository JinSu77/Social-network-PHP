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