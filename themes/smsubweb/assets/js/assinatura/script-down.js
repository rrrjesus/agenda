function downloadimg() {
    var node = document.getElementById('card-download');
    var nome = document.getElementById('asnome').innerText;

    domtoimage.toJpeg(node)
        .then(function (dataUrl) {
            window.saveAs(dataUrl, nome + ".jpg");
        }).catch(function (error) {
        console.error('oops, something went wrong!', error);
    });
}