 //Preview an image before it is uploaded
 function loadFile(file) {
    if (file && file.files[0]) {
        let preview = document.getElementById('image');
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result)
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file.files[0]);
    }
}