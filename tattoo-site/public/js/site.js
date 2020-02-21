$(document).ready(function () {
    $('#parte_corpo').change( function () {
        let parte = $('#parte_corpo').val()
        if (parte === 'Outra') {
            $('.outra_parte').removeAttr('hidden')
        } else {
            $('.outra_parte').attr('hidden',true)
        }
    })
})
