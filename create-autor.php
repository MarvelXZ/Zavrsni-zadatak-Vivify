<?php
include 'header.php';
include 'db.php';
?>
<body>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php
                if(isset($_POST['submit']))
                {
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $pol = $_POST['pol'];
                    $currentDate = date("Y-m-d H:i:s");
                        if(empty($ime) || 
                            empty($prezime) || 
                            empty($pol)
                            )
                            {
                                echo("Nesto nije popunjeno");
                            } 
                            else {
                                $sqlAut =  "INSERT INTO autor (ime,prezime,pol,created_at) VALUES ('$ime','$prezime','$pol','$currentDate')";
                                $statement = $connection->prepare($sqlAut);
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
                                        <form role="form" action="create-autor.php" method="POST" id="autorForma">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="ime" placeholder="Ime"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="prezime" placeholder="Prezime"/>
                                            </div>
                                            
                                            <div class="form-check">
                                                <input type="radio" name="pol" id="muskiPol" value="muski">
                                                <label for="flexRadioDefault1">Musko</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="pol" id="zenskiPol" value="zenski">
                                                <label for="flexRadioDefault2">Zensko</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Napravi Autora" class="btn btn-primary form-control" />
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