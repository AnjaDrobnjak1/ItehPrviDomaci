$(function () {
    dodajTenisera();
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