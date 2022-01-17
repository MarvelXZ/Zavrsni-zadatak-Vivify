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

    if(isset($_POST['submit2']))
    {
        $post_id=$_GET('id');
        $title = $_POST['text'];
        $currentDate = date("Y-m-d H:i:s");
        $autor = $_POST['autor'];
            if(empty($body) || 
            empty($title) || 
            empty($autor)
            )
            {
            echo("Nesto nije popunjeno");
            } 
        else 
        {
            $sql3 =  "INSERT INTO comments (Author, text, post_id) VALUES ('$autor','$title','$post_id')";
            $statement = $connection->prepare($sql3);
            $statement->execute();
            
        header("Location: ./index.php");
        }
    }
?>


<hr>
<h6>Komentari</h6>
    <div class="d-flex flex-column comment-section">
        <div class="bg-white p-2">
            <ul>
                <?php foreach($comments as $comment) { ?>
                    <div class="mt-2"><hr>
                        <li class="comment-text"><strong><?php echo($comment['text']) ?></strong> by <?php echo($comment['Author']) ?></li>
                    </div>
                <?php } ?> 
            </ul>
        </div>
        <form role="form" action="comments.php" method="POST" id="postsForma">

        <div class="bg-light p-2">
            <div class="d-flex flex-row align-items-start"><textarea name="text" class="form-control ml-1 shadow-none textarea"></textarea></div>
                <label for="autor">Odaberi autora :</label>
                    <select class="form-control bcontent" name="autor">
                        <?php echo $options;?>
                    </select>
            </div>
            <div class="mt-2 text-right ml-1">
                <button class="btn btn-primary btn-sm shadow-none" type="button" name="submit2">Post comment</button>
            </div>
        </div>
        </form>
    </div>


