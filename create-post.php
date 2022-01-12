<?php
include 'header.php';
include 'db.php';
?>
<body>
<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php
                if(isset($_POST['submit'])) {
                    $body = $_POST['body'];
                    $title = $_POST['title'];
                    $currentDate = date("Y-m-d h:i");
                    $autor = $_POST['autor'];
                if(empty($body) || 
                empty($title) || 
                empty($autor)
                ) {
                    echo("Nesto nije popunjeno");
                    
                } else {
                    $sql =  "INSERT INTO posts (title,body,autor,create_at) VALUES ('$title','$body','$autor','$currentDate')";
                    $statement = $connection->prepare($sql);
                    $statement->execute();

                    header("Location: ./index.php");

                }
        }
    ?>


            ?>

            <div class="blog-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Blog Title"/>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control bcontent" name="body" placeholder="Blog Body"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="autor" placeholder="Autor"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="objavi post" class="btn btn-primary form-control" />
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <?php
                // } else {
                //     echo('id nije prosledjen kroz $_GET');
                // }
            ?>
        </div><!-- /.row -->
    <?php include 'sidebar.php'; ?>
</main><!-- /.container -->
</body>
<?php
    include 'footer.php';
?>