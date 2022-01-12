<?php
include 'header.php';
include 'db.php';

?>
<body>
<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            
            <?php
                
                $sql = "SELECT id, title, body, autor, create_at FROM posts ORDER BY create_at DESC LIMIT 3";
                $statement = $connection->prepare($sql);
                $statement->execute();
                // // zelimo da se rezultat vrati kao asocijativni niz.
                // // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                // $statement->setFetchMode(PDO::FETCH_ASSOC);
                // // punimo promenjivu sa rezultatom upita
                // $posts = $statement->fetchAll();

                $posts = getAllData($connection, $sql);

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                // echo '<pre>';
                // var_dump($posts);
                // echo '</pre>';

            ?>
            <?php
                foreach ($posts as $post) {
            ?>
            <div class="blog-post">
                <h2><a class="blog-post-title" href="single-post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['create_at']) ?> by <a ><?php echo($post['autor']) ?></p>

                <p><?php echo($post['body']) ?></p>
            
            </div><!-- /.blog-post -->
            <?php
                }
            ?>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include 'sidebar.php'; ?>
    </div><!-- /.row -->

</main><!-- /.container -->
</body>
<?php
include 'footer.php';

?>