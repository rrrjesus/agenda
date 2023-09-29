function downloadimg() {
    var node = document.getElementById('down-img');
    var nome = document.getElementById('nomeass').innerText;

    domtoimage.toJpeg(node)
        .then(function (dataUrl) {
            window.saveAs(dataUrl, nome + ".jpg");
            // var img = new Image(400, 185);
            // img.src = dataUrl;
            // img.onload = (e) => {
            // const canvas = document.createElement('canvas');
            // canvas.width = 320;
            // canvas.height = 150;
            // canvas.width = 369;
            // canvas.height = 160;
            // const ctx = canvas.getContext('2d');
            // ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

            // canvas.toBlob((blob) => {
            // window.saveAs(blob, nome + ".jpg");
            // }, "image/jpeg", 0.95);
            // }
        }).catch(function (error) {
        console.error('oops, something went wrong!', error);
    });
}