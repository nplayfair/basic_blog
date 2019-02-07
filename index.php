<?php 
    require('config/config.php');
    require('config/db.php');

    $query = 'SELECT * FROM posts';

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

?>
<?php include('inc/header.php'); ?>
    <div class="container" style="padding-top: 3rem">
        <h1>Blog Posts</h1>
        <?php foreach($posts as $post) : ?>
            <div class="card card-body bg-light">
                <h4><?php echo $post['title']; ?></h4>
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a href="post.php?id=<?php echo $post['id']; ?>">Read more...</a>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
<?php include('inc/footer.php'); ?>