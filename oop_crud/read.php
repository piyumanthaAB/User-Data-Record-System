<?php
include_once("./includes/header.php");
top();
navbar();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"> Single Record </h1>
            <hr style="1px;color:black;background-color:black;">
        </div>
        <div class="row ">
            <div class="col-lg-12 text-center justify-content-center mt-5">
                <table id="tableBody" class="table mx-auto">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Address</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("./classes/Model.php");
                        $model= new Model();
                        $id= $_GET['id'];
                        $row= $model->fetchSingle($id);
                        
                         
                    ?>
                        <tr>
                            <td><?php echo $row["id"] ;?></td>
                            <td><?php echo $row["_name"] ;?></td>
                            <td><?php echo $row["_email"] ;?></td>
                            <td><?php echo $row["_mobile"] ;?></td>
                            <td><?php echo $row["_address"] ;?></td>

                        </tr>


                    </tbody>
                </table>
            </div>
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