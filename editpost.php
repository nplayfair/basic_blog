<?php 
    require('config/config.php');
    require('config/db.php');

    // Check for submit
    if (isset($_POST['submit'])) {
        // Get form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

        $query = "UPDATE posts SET 
                    title='$title',
                    author='$author',
                    body='$body'
                WHERE id = {$update_id}";

        if (mysqli_query($conn, $query)) {
            // Success
            header('Location: '.ROOT_URL);
        } else {
            // Failure
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

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
        <h1>Edit Post</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title"
                value="<?php echo $post['title']; ?>">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" name="author"
                value="<?php echo $post['author']; ?>">
            </div>
            <div class="form-group">
                <label>Title</label>
                <textarea class="form-control" name="body"><?php echo $post['body']; ?></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?>