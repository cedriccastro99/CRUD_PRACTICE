import { getSelectedStudent,getAllStudents } from './getallstudent.js';

class Student{
    constructor({id,fullname,contact,address}){
        this.id = id;
        this.fullname = fullname;
        this.contact = contact;
        this.address = address;
    }

    editStudent(id,fullname,contact,address){
        $.ajax({
            method : "POST",
            url : './php/editstudent.php',
            data : { 
                id,
                fullname,
                contact,
                address,
                action : 'editSelectedStudent'
            },
            success : function(response){
                const { status } = JSON.parse(response);
                if(status == 200){

                    $("#edit-student-modal").modal('hide');
                    $('#edit-student-form')[0].reset();
                    getAllStudents()
                
                }else{
                    $("#edit-student-modal").modal('hide');
                    $('#edit-student-form')[0].reset();
                }
            }
        })
    }
}

$(document).ready(function(){

    let student = {};

    $(document).on('click','.edit-student',function(){
        const studentId = $(this).attr('id');

        getSelectedStudent(studentId).then((response)=>{
            const { data,msg,status } = JSON.parse(response);

            student = new Student(data);

            $("#edit-name").val(student.fullname)
            $("#edit-contact").val(student.contact)
            $("#edit-address").val(student.address)

        })
    })

    $('#edit-student-form').on('submit',function(e){
        e.preventDefault();

        const fullname = $("#edit-name").val();
        const contact = $("#edit-contact").val();
        const address = $("#edit-address").val();

        student.editStudent(student.id,fullname,contact,address);

    })
})