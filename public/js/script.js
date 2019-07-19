$(document).ready(function () {
    if ($('#non').is(":checked")) {
        $('#rue').hide();
        $('#ville').show();
    } else if ($('#oui').is(":checked")) {
        $('#ville').hide();
        $('#rue').show();
    } else {
        $('#rue').hide();
        $('#ville').hide();
    }

    $('input:radio[name="info"]').change(function () {
        if ($(this).val() === 'oui') {
            $('#ville').hide();
            $('#rue').show();
        } else {
            $('#ville').show();
            $('#rue').hide();
        }
    });

    $("#rue_nom").autocomplete({
        source: "search.php",
        minLength: 1,
    });
    $("#ville_nom").autocomplete({
        source: "search2.php",
        minLength: 1,
    });
});