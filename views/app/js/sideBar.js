$(document).ready(function(){

   $(document).on('click','.sidebar-menu li .treeview-menu a',function(e){
    e.preventDefault();
       var url = $(this).attr('href').split("?view=")[1];
       var url_formated = 'index.php?view='+url;
        $.post(url_formated,function(data){
            $('.contenido_html').html(data);
            location.hash=url;
        });
   });


});