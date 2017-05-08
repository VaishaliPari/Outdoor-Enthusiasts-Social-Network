<html>
<style>
.topnav {
    background-color: #000000;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #ffffff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #dd002e;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #dd002e;
    color: #white;
}


.search {
padding: 14px 16px;

margin-right: 5px;
}

</style>
<form action="search.php" method="post">
<div class="topnav" id="myTopnav">

  <a href="feed.php"> Feed </a>
  <a href="post.php">Posts</a>
  <a href="friends.php"> Friends </a>
  <a href = "messages.php"> Messages </a>
<a href ="profile.php"> My Profile </a>

  <a href="Logout.php">Logout</a>
  <div class = "search"> <input type="text" name="search" placeholder="Search"><input type="submit" value="search" name="searchsubmit"></div>
</div> </form>
</html>