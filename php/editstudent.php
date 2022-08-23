<?php

    require_once('dbconnect.php');

    if(isset($_POST['action']) && $_POST['action'] == 'editSelectedStudent'){

        $id = mysqli_real_escape_string($con,$_POST['id']);
        $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
        $contact = mysqli_real_escape_string($con,$_POST['contact']);
        $address = mysqli_real_escape_string($con,$_POST['address']);

        try {
            
            $query = $pdo->prepare("UPDATE students SET fullname = :fullname , contact = :contact , address = :address WHERE id = :id");

            $pdo->beginTransaction();

            $query->execute([
                'fullname' => $fullname,
                'contact' => $contact,
                'address' => $address,
                'id' => $id
            ]);

            $pdo->commit();

            $message = [
                'status' => 200,
                'msg' => "Student successfully edited!"
            ];

            echo json_encode($message);

            exit();

        } catch (Exception $e) {
            if($pdo->inTransaction()){
                $pdo->rollback();

                $message = [
                    'status' => 500,
                    'msg' => "SERVER ERROR : ".$e
                ];

                throw $e;
                
                echo json_decode($message);
                

                exit();
            }
        }

    }


?>