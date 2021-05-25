<?php require_once("db_controller.php");

    function create_data($nama, $message){
        
        $response = "";

        $conn = connect();

        $query = $conn->prepare("INSERT INTO feedback_user (nama, message) VALUES (?, ?)");
        $query->bind_param("ss", $nama, $message);

        $result = $query->execute() or die(mysqli_error($conn));

        if($result){
            $response = "Feedback telah berhasil ditambahkan!";
        }else{
            $response = "Feedback gagal untuk ditambahkan!";
        }

        $query->close();
        close_conn($conn);

        return $response;
    
    }

    function read_data(){
        $all_data = array();
        $conn = connect();

        $query = $conn->query("SELECT * FROM feedback_user") or die(mysqli_error($conn));

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $data["nama"] = $row["nama"];
                $data["message"] = $row["message"];
                array_push($all_data, $data);
            }
        }else{
            echo "No feedback found!";
        }
        
        $query->close();
        close_conn($conn);
        
        return $all_data;
    }

    function delete_data($id){
        $response = "";
        $conn = connect();
        
        $query = $conn->prepare("DELETE FROM feedback_user WHERE id = ?");
        $query->bind_param("i", $id);
        
        if($query->num_rows > 0){
            $result = $query->execute() or die(mysqli_error($conn));
            if($result){
                $response = "Data telah berhasil terhapus!";
            }else{
                $response =  "Data gagal terhapus!";
            }
        }
        
        $query->close();
        close_conn($conn);
        
        return $response;
    }


?>