import $ from 'jquery';

$('table').on('click','.close',function(){
    deleteLModo(this);
});

function deleteLModo(object)
{
    $.post('/suppress',{id: $(object).val()});
    $(object).closest('tr').fadeOut();
}
