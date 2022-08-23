<?php

    require_once('dbconnect.php');

    if(isset($_POST['action']) == 'removeStudent'){

        $studentId = mysqli_real_escape_string($con,$_POST['studentID']);

        try {
            
            $query = $pdo->prepare("DELETE FROM students WHERE id = :id");

            $pdo->beginTransaction();

            $query->execute([ 'id' => $studentId ]);

            $pdo->commit();

            $message = [
                "status" => 200,
                "msg" => "Student successfully deleted!"
            ];

            echo json_encode($message);

            exit();

        } catch (Exception $e) {
            if($pdo->inTransaction()){
                $pdo->rollback();

                $message = [
                    "status" => 500,
                    "msg" => "SERVER ERROR : ".$e
                ];

                throw $e;
    
                echo json_encode($message);
    
                exit();
            }
        }

    }

?>