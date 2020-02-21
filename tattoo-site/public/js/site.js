$(document).ready(function () {
    $('#parte_corpo').change( function () {
        let parte = $('#parte_corpo').val()
        if (parte === 'Outra') {
            $('.outra_parte').removeAttr('hidden')
        } else {
            $('.outra_parte').attr('hidden',true)
        }
    })

    // .length verifica se o campo existe na página
    if($("input[name='telefone']").length) {
        if ($("input[name='telefone']").val().length > 10) {
            $("input[name='telefone']").mask('(00) 00000-0000')
        } else if ($("input[name='telefone']").val().length == 10) {
            $("input[name='telefone']").mask('(00) 0000-0000')
        }
    }
})
