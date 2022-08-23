import { getAllStudents } from './getallstudent.js'

$(document).ready(function(){
    $('#add-student-form').on('submit',function(e){
        e.preventDefault();

        const studentData = new FormData()

        // if check every input manualy withtout using required in form
        // console.log($("form#add-student-form input")); //put [type=(text,number etc)] if specific
        // document.querySelectorAll("form#add-student-form input")
        

        const name = $('#add-name').val();
        const contact = $('#add-contact').val();
        const address = $('#add-address').val();

        studentData.append('fullname',name);
        studentData.append('contact',contact);
        studentData.append('address',address);
        studentData.append('action','addNewStudent');

        $.ajax({
            method : "POST",
            url : './php/addstudent.php',
            data : studentData,
            cache: false,
            processData: false,
            contentType: false,
            success : function(response){

                getAllStudents()

                $('#add-student-modal').modal('hide');
                $('#add-student-form')[0].reset();

            } 
        });
    })
})