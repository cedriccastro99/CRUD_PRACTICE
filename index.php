<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/getallstudent.js" type="module"></script>
    <script src="./js/addstudent.js" type="module"></script>
    <script src="./js/removestudent.js" type="module"></script>
    <script src="./js/editstudent.js" type="module"></script>

    <title>CRUD PRACTICE</title>
</head>
<body>
    <div class="card mx-5 my-5">
        <div class="card-header">
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#add-student-modal">Add Student</button>
        </div>
        <div class="card-body">
            <h3 class="text-center">List of all students</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="col-1">ID</th>
                        <th class="col-3">NAME</th>
                        <th class="col-2">CONTACT</th>
                        <th class="col-4">ADDRESS</th>
                        <th class="col-2">ACTION</th>
                    </tr>
                </thead>
                <tbody id="student-table" class="text-center">
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL  -->
    <div class="modal fade" tabindex="-1" id="add-student-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-student-form">
                    
                    <div class="modal-body">

                        <h5 class="text-center">ADD NEW STUDENT</h5>
                    
                        <input type="text" name="add-name" id="add-name" class="form-control my-3" placeholder="Fullname" required>
                        <input type="text" name="add-contact" id="add-contact" class="form-control mb-3" placeholder="Contact Number" required>
                        <input type="text" name="add-address" id="add-address" class="form-control mb-3" placeholder="Address" required>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="edit-student-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-student-form">
                    
                    <div class="modal-body">

                        <h5 class="text-center">EDIT STUDENT</h5>
                    
                        <input type="text" name="edit-name" id="edit-name" class="form-control my-3" placeholder="Fullname" required>
                        <input type="text" name="edit-contact" id="edit-contact" class="form-control mb-3" placeholder="Contact Number" required>
                        <input type="text" name="edit-address" id="edit-address" class="form-control mb-3" placeholder="Address" required>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>