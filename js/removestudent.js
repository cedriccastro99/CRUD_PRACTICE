import { getAllStudents } from './getallstudent.js';

$(document).ready(function(){

    $(document).on('click','.rmv-student',function(){

        const studentID = $(this).attr('id');

        $.ajax({
            method : 'POST',
            url : './php/removestudent.php',
            data : { studentID, action : 'removeStudent' },
            success : function(response){
                const { status } = JSON.parse(response);

                if(status == 200){
                    getAllStudents();
                }
            }
        })

    })

})