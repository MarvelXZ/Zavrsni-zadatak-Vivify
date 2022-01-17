<?php
include 'header.php';
include 'db.php';

?>
<body>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php
               
                if (isset($_GET['id'])) {
                    $sql = "SELECT id, title, body, autor, create_at FROM posts WHERE id = {$_GET['id']}";
                    $singlePost = getData($connection, $sql);
                    $sql2 = "SELECT * FROM comments WHERE post_id= {$_GET['id']}";
                    $comments = getAllData($connection, $sql2);
              
            ?>

            <div class="blog-post">
                <a><h2 class="blog-post-title"><?php echo $singlePost['title'] ?></h2><a>
                    <p class="blog-post-meta"><?php echo $singlePost['create_at'] ?> by <?php echo($singlePost['autor']) ?></p>
                    <p><?php echo $singlePost['body'] ?></p>
                <?php include 'comments.php' ?>
            </div>
            <?php include 'sidebar.php'; ?>
        </div><!-- /.blog-post -->
            <?php
                } else {
                    echo('id nije prosledjen kroz $_GET');
                }
            ?>
    </div><!-- /.row -->
</main><!-- /.container -->
</body>
<?php
    include 'footer.php';
?>