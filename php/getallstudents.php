<?php 

    require_once('dbconnect.php');

    if(isset($_GET['action']) && $_GET['action'] == "getAllStudents"){

        try {
            $query = "SELECT * FROM students ORDER BY id ASC";

            $execute_query = $pdo->query($query);
            $result = $execute_query->fetchAll(PDO::FETCH_ASSOC);

            $message = [
                "status" => 200,
                "msg" => "Successfully retrieved all data",
                "data" => $result
            ];

            echo json_encode($message);

            exit();

        } catch (Exception $e) {
            $message = [
                "status" => 500,
                "msg" => "SERVER ERROR : ".$e,
            ];

            echo json_encode($message);

            exit();
        }
    }
    
    if(isset($_GET['action']) && $_GET['action'] == "getSelectedStudent"){

        $studentId = mysqli_real_escape_string($con,$_GET['studentID']);

        try {
            
            $query = "SELECT * FROM students WHERE id = $studentId";

            $execute_query = $pdo->query($query);
            $result = $execute_query->fetchAll(PDO::FETCH_ASSOC);

            $message = [
                "status" => 200,
                "msg" => "Successfully retrieved!",
                "data" => $result[0]
            ];

            echo json_encode($message);

            exit();

        } catch (Exception $e) {
            $message = [
                "status" => 500,
                "msg" => "SERVER ERROR : ".$e,
            ];

            echo json_encode($message);

            exit();
        }

    }
?>