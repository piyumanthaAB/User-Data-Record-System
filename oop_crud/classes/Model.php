<?php

Class Model{
    private $server="localhost";
    private $username="root";
    private $password="admin";
    private $dbname="oop_crud";
    private $con;
    

    public function __construct(){
        try {
            $this->con = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        } catch (Exception $e) {
            echo "Connection Failed! ".$e->getMessage();
        }
    }

    public function insert(){
        if(isset($_POST['submit'])){
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])  ){
                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address']) ){
                    
                    $name= $_POST['name'];
                    $email= $_POST['email'];
                    $mobile= $_POST['mobile'];
                    $address= $_POST['address'];

                    // $stmt= $this->con->prepare("INSERT INTO records(_name,_email,_mobile,_address) VALUES(?,?,?,?)");
                    // $stmt->bind_param("ssss",$name,$email,$mobile,$address);
                    
                    $sql = "INSERT INTO records (_name,_email,_mobile,_address) VALUES ('$name','$email','$mobile','$address')";
                    try {
                        // $stmt->execute();
                        
                        $this->con->query($sql);
                        header ("location:records.php");
                    } catch (Exception $e) {
                        echo "Table data writing error" .$e->getMessage(); 
                    }
                    // $stmt->close();
                }else{
                    echo "<script>alert('Empty Fields !')</script>";
                }
            }   
        }
        $this->con->close();
    }

    function fetch(){
        $sql = "SELECT * FROM records";
        try {
            $result = $this->con->query($sql);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    echo '
                        <tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["_name"].'</td>
                            <td>'.$row["_email"].'</td>
                            <td>'.$row["_mobile"].'</td>
                            <td>'.$row["_address"].'</td>
                            <td>
                                <a href="read.php?id='.$row["id"].'"class="badge badge-primary">Read </a> |
                                <a href="update.php?id='.$row["id"].'" class="badge badge-success">Update </a> |
                                <a href="delete.php?id='.$row["id"].'" class="badge badge-danger">Delete </a> 
                            </td>

                        </tr>
                    ';
                }
            }
        } catch (Exception $e) {
            echo "error in fetching data !" .$e->getMessage();
        }
        $this->con->close();
    }

    function delete($id){
        $sql = "DELETE FROM records WHERE id='$id'";
        try {
            $this->con->query($sql);
            return 1;
        } catch (Exception $e) {
           echo "Error while deleting the record ! ".$e->getMessage();
           return 0;
        }
        $this->con->close();
    }

    function fetchSingle($id){
        $sql= "SELECT * FROM records WHERE id=$id";
        
        try {
            $result= $this->con->query($sql);
            $row = $result->fetch_assoc();
            if($row){
                // echo '
                //         <tr>
                //             <td>'.$row["id"].'</td>
                //             <td>'.$row["_name"].'</td>
                //             <td>'.$row["_email"].'</td>
                //             <td>'.$row["_mobile"].'</td>
                //             <td>'.$row["_address"].'</td>
                            
                //         </tr>
                //     ';
                    return $row;
            }else{
                echo "no records in row";
            }
        } catch (Exception $e) {
            echo "Error in finding single  record! ".$e->getMessage();
        }
        $this->con->close();
    }

    function update($id){
        $updateId= $id;
        $name= $_POST['name'];
        $email= $_POST['email'];
        $mobile= $_POST['mobile'];
        $address= $_POST['address'];

        $sql= "UPDATE records SET _name='$name',_email='$email',_mobile='$mobile',_address='$address' WHERE id=$id";

        try {
            $this->con->query($sql);
            return 1;
        } catch (Exception $e ) {
            echo "Error in updating record !".$this->con->getMessage();
            return 0;
        }

        //echo "data passed: $id, $name,$email,$mobile,$address_update";
    }
    
}

?>