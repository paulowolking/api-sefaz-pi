$(window).on('load', function () {
    $('#preloader').fadeOut(700, function () {
        $(this).remove();
    });

    // $('.selectpicker').selectpicker();
    $(".cpf").mask("999.999.999-99", {autoclear: true});
    $(".cnpj").mask("99.999.999/9999-99", {autoclear: true});
    $(".telefone_fixo").mask("(99) 9999-9999", {autoclear: true});
    $(".celular").mask("(99)9 9999-9999", {autoclear: true});
    $(".cep").mask("99999-999", {autoclear: true});
    $(".data").mask("99/99/9999", {autoclear: true});
    $(".mascara_moeda").mask('#.##0,00', {reverse: true});
    $(".data-sefaz").mask("9999/99", {autoclear: true});

    $('.select-multiple').select2();
});
