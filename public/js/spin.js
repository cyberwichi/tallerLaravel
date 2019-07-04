window.onpageshow=function(){
    
    $('#spiner').fadeOut();
    $('body').removeClass('hidden');


};
window.onwaiting=function(){
    console.log("aqui 2");
    $('#spiner').fadeIn();
    $('body').addClass('hidden');
};


 $('a').click(function(){
    console.log("aqui 2");
    $('#spiner').fadeIn();
    $('body').addClass('hidden');
});
$('#submit').click(function(){
    console.log("aqui 2");
    $('#spiner').fadeIn();
    $('body').addClass('hidden'); 
});


