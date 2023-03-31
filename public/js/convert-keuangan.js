var keuangan = document.getElementById("finance").innerHTML;
if (keuangan) {
    function convertRupiah(nominal) {
        const numb = nominal;
        const format = numb.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
        return rupiah;
    }
    
    document.getElementById("finance").innerHTML = convertRupiah(keuangan);
}

