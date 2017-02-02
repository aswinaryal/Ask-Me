/**
 * Created by Ashwin on 19/11/2016.
 */


ID_NUM = 0;
function change_id(id_num) {
    $('#dataModal').modal("hide");
    ID_NUM = id_num;


}



$(document).ready(function () {
   $('#insert').click(function (event) {

       event.preventDefault();
       var message = $('#post').val();

       if(message == ''){
           $('#error_message').html("Please provide your question content").stop(true).hide().fadeIn(300).fadeOut(3000);
       }else{
           $('#error_message').html('');
           $.ajax({
               url: "insert.php",
               method: "POST",
               data: $('#insert_form').serialize(),
               success: function (data) {

                   if(data == "unsuccess") {
                       $('#error_message').html("This question has been asked already").stop(true).hide().fadeIn(300).fadeOut(4500);
                       $('#insert_form')[0].reset();
                   }


                   else{

                       $('#insert_form')[0].reset();
                       displayData(data);
                       $('#add_data_Modal').modal('hide');
                   }






               }

           });
       }

   });








    //script for view question button //
    $('.view_data').click(function(){
        var post_id = $(this).attr("id");

        $.ajax({
            url:"select.php",
            method:"post",
            data:{post_id:post_id},
            success:function(data){
                $('#post_detail').html(data);
                $('#dataModal').modal("show");
            }
        });

    });



    //script for Answer button //

 $('#answer_form').on('submit',function(event) {
        event.preventDefault();

     var message = $('#post').val();
        if($('#post_reply').val() =='' ){
            $('#error_message_reply').html("Above field is required").stop(true).hide().fadeIn(300).fadeOut(3000);

        }else{

            var post_id = ID_NUM;

            var replied_text = $('#post_reply').val();

            $.ajax({
                url:"answer.php",
                method:"POST",
                data:{qsn_id:post_id,response:replied_text},
                success:function(data){


                    if(data == "unsuccess") {
                        $('#error_message_reply').html("You cannot reply to your own question").stop(true).hide().fadeIn(300).fadeOut(4500);
                        $('#answer_form')[0].reset();
                    }
                    if(data == "duplicate"){
                        $('#error_message_reply').html("Duplicate replies are not allowed").stop(true).hide().fadeIn(300).fadeOut(4500);
                        $('#answer_form')[0].reset();
                    }
                    else{
                        $('#answer_form')[0].reset();
                        $('#answer_data_Modal').modal('hide');

                    }







                }

            });
        }
    });


$('hidden').onload(function () {

})

     $('#singleReplyModal').modal('toggle');

     $("#singleReplyModal").load('specific.php',function () {
     $("#singleReplyModal").addClass('loader');
     $("#singleReplyModal").removeClass('loader');
     });

});













