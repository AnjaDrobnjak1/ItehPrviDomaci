$(function () {
    dodajTenisera();
    $('#tabela-teniseri').DataTable();
    obrisiTenisera();
});

function dodajTenisera() {

    $(document).on('click', '#sacuvaj_tenisera_dugme', function () {

        var ime = $('#ime').val();
        var prezime = $('#prezime').val();
        var pozicija = $('#pozicija').val();
        var osvojeni_turniri = $('#osvojeni_turniri').val();
        var drzava = $('#drzava').val();

        $.ajax({
            url: 'noviTeniser.php',
            method: 'post',
            data: { ime: ime, prezime: prezime, pozicija: pozicija, osvojeni_turniri: osvojeni_turniri, drzava: drzava },

            success: function (data) {
                $('#tabela-teniseri-tbody').html(data);
            }
        })
    })
}


function obrisiTenisera() {

    $(document).on('click', '#dugme_obrisi', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'obrisiTenisera.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#tabela-teniseri-tbody').html(data);
            }
        })
    })

}