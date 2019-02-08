<?php 
    require('config/config.php');
    require('config/db.php');

    // Get post id
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = 'SELECT * FROM posts WHERE id = ' . $id;

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $post = mysqli_fetch_assoc($result);

    // Free result
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container" style="padding-top: 3rem">
        <h1><?php echo $post['title']; ?></h1>
        <div class="card card-body bg-light">
            <h5>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></h5>
            <p><?php echo $post['body']; ?></p>
        </div>
        <br>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>"
        class="btn btn-secondary">Edit</a>
    </div>
<?php include('inc/footer.php'); ?>