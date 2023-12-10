 //Preview an image before it is uploaded
 function loadFile(file) {
    if (file && file.files[0]) {
        let preview = document.getElementById('image');
        let removeButton = document.getElementById('removeImage');
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result)
            preview.classList.remove('hidden');
            removeButton.classList.remove('hidden');
        }
        reader.readAsDataURL(file.files[0]);
    }
}

//Remove image
function removePreview(){
    let preview = document.getElementById('image');
    let removeButton = document.getElementById('removeImage');
    preview.src=""
    preview.classList.add('hidden');
    removeButton.classList.add('hidden');
    
    document.getElementById('dropzone-file').value="";
}
