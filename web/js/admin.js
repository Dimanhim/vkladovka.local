$(document).ready(function(){
    $('.item-img').on('click', function() {
        $(this).find('.back').slideToggle();
    });
    $('.link-delete').on('click', function() {
        if(!confirm("Вы уверены, что хотите удалить?")) return false;
    })
});

