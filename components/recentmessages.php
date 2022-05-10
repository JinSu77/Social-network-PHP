<section class="RecentMessages">
    <input type="search" name="" id="searchuser">
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