$(document).ready(function(){
    $('.form_content').css('display','none');
    
    $('.newadminbtn').click(function(){
        $('#showFormAdmin').toggle('slow',function(){
            $('#btn_new').toggle('slow');
        });
    });
})
