$(document).ready(function(){
    var url =  JSON.parse(localStorage.getItem("img"));
    $("#imgInfografia").attr("src",url);
    $("#imgvalue").val(url);
});