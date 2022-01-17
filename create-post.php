<?php
include 'header.php';
include 'db.php';
?>
<body>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php
                $sql = "SELECT * FROM autor ";
                $connect = mysqli_connect($servername, $username, $password, $dbname);
                $autori = mysqli_query($connect, $sql);
                $options = "";
                while($row2 = mysqli_fetch_array($autori))
                {
                    if ( $row2[3] === 'muski'){
                        $boja = 'blue';
                    } else {
                        $boja = 'pink';
                    }
                    $options = $options."<option style='color:$boja;'>$row2[1] $row2[2]</option>";
                }
                if(isset($_POST['submit']))
                {
                    $body = $_POST['body'];
                    $title = $_POST['title'];
                    $currentDate = date("Y-m-d H:i:s");
                    $autor = $_POST['autor'];
                        if(empty($body) || 
                            empty($title) || 
                            empty($autor)
                            )
                            {
                                echo("Nesto nije popunjeno");
                            } 
                            else {
                                $sql =  "INSERT INTO posts (title,body,autor,create_at) VALUES ('$title','$body','$autor','$currentDate')";
                                $statement = $connection->prepare($sql);
                                $statement->execute();
                    header("Location: ./index.php");
                }
            }
            ?>
            <div class="blog-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" action="create-post.php" method="POST" id="postsForma">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" placeholder="Naslov"/>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control bcontent" name="body" rows ="8" placeholder="Text post"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label for="autor">Odaberi autora :</label>
                                                <select class="form-control bcontent" name="autor">
                                                    <?php echo $options;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Postavi Post" class="btn btn-primary form-control" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div><!-- /.row -->
    <?php include 'sidebar.php'; ?>
</main><!-- /.container -->
</body>
<?php
    include 'footer.php';
?>