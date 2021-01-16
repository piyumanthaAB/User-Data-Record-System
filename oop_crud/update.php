<?php
include_once("./includes/header.php");
top();
navbar();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center "> Update Record </h1>
            <hr style="height:1px;color:black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="POST">
                <?php
                        require_once("./classes/Model.php");
                        $model = new Model();
                        $id = $_GET['id'];
                        
                        //$data= $model->update($id);
                        $row= $model->fetchSingle($id);

                        if(isset($_POST['update'])){
                            if($model->update($id)){
                                header ("location:records.php");
                            }
                            
                        }
                        
                        
                        

                    ?>
                <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" name="name" value=<?php echo "'".$row['_name']."'";  ?> class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email </label>
                    <input type="text" name="email" value=<?php echo "'".$row['_email']."'";  ?> class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Mobile No </label>
                    <input type="text" name="mobile" value=<?php echo "'".$row['_mobile']."'";  ?> class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Adddress </label>
                    <textarea name="address" cols="" value="" rows="3" id=""
                        class="form-control"><?php echo $row['_address'];  ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>