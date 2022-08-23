export function getAllStudents(){
    $.ajax({
        method : "GET",
        url : './php/getallstudents.php',
        data : { action : 'getAllStudents'},
        success : function(response){
            const data = JSON.parse(response);

            const { data:students,status,msg } = data;

            const tableBody = $('#student-table').empty();
            
            $.each(students,function(index,student){
                const row = `
                    <tr>
                        <td>${student.id}</td>
                        <td>${student.fullname}</td>
                        <td>${student.contact}</td>
                        <td>${student.address}</td>
                        <td>
                            <button id="${student.id}" class="edit-student btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-student-modal">Edit</button>
                            <button id="${student.id}" class="rmv-student btn btn-danger">Remove</button>
                        </td>
                    </tr>
                `;

                tableBody.append(row);
            })
        }
    })
}

export async function getSelectedStudent(studentId){

    let res = await $.ajax({
        method : "GET",
        url : './php/getallstudents.php',
        data : { studentID : studentId, action : 'getSelectedStudent'},
    });

    return res;
}

$(document).ready(function(){

    getAllStudents();

})