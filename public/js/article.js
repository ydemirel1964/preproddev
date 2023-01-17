/*$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault();
    var $this = $(this);
    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        location.reload();
    });
});*/

$(document).ready(function ()
{ $(".class-span").each(function(i){
     var len=$(this).text().trim().length;
     if(len>100)
     {
         $(this).text($(this).text().substr(0,100)+ '...');
     }
 });
});
