document.querySelectorAll('.rupiah-input').forEach(input => {

    input.addEventListener('input', function () {

        let angka = this.value.replace(/\D/g, '');

        this.value = angka
            ? new Intl.NumberFormat('id-ID').format(angka)
            : '';
    });

});