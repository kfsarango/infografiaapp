$(document).ready(function(){
    if ($('#username').val() == '') {
        $('.form_content').css('display','none');
    } else {
        $('.form_content').css('display','block');
    }
    
    $('.newadminbtn').click(function(){
        $('#showFormAdmin').toggle('slow',function(){
            $('#btn_new').toggle('slow');
        });
    });
})
