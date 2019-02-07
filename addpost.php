<?php 
    require('config/config.php');
    require('config/db.php');

    // Check for submit
    if (isset($_POST['submit'])) {
        // Get form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);

        $query = "INSERT INTO posts(title, author, body) VALUES ('$title', '$author', '$body')";

        if (mysqli_query($conn, $query)) {
            // Success
            header('Location: '.ROOT_URL);
        } else {
            // Failure
            echo 'ERROR: '. mysqli_error($conn);
        }
    }


?>
<?php include('inc/header.php'); ?>
    <div class="container" style="padding-top: 3rem">
        <h1>Add Post</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" name="author">
            </div>
            <div class="form-group">
                <label>Title</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?>