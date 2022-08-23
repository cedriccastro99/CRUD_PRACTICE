<?php 

    require_once('dbconnect.php');

    if(isset($_POST['action']) == 'addNewStudent'){
        $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
        $contact = mysqli_real_escape_string($con,$_POST['contact']);
        $address = mysqli_real_escape_string($con,$_POST['address']);

        try{

            $query = $pdo->prepare("INSERT INTO students (fullname,contact,address) VALUES (:fullname,:contact,:address)");
            
            $pdo->beginTransaction();

            $query->execute([
                            "fullname" => $fullname,
                            "contact" => $contact,
                            "address" => $address
                            ]);

            $pdo->commit();

            $message = [
                'status' => 200,
                'msg' => "Student Added Successfully!" 
            ];

            echo json_encode($message);
            
            exit();

        }catch(Exception $e){
            
            if($pdo->inTransaction()){
                $pdo->rollback();
                $message = [
                    'status' => 500,
                    'msg' => "SERVER ERROR : ".$e 
                ];
                throw $e;

                echo json_encode($message);

                exit();
            }

        }
    }

?>