function displayCurrentImages(currentFiles, currentGallery, path){
    for (let i = 0; i < currentFiles.length; i++){
        let img = document.createElement('img');
        let div = document.createElement('div');
        
        div.className = "img-preview-container";
        console.log(currentFiles[i]['name']);
        img.src = '../' + path + currentFiles[i]['name'];
        div.setAttribute('id', 'img-container-' + i);
        div.appendChild(img);
        div.setAttribute('onclick', 'deleteEntry(' + i + ')');
        
        currentGallery.appendChild(div)
    }
}

function deleteEntry(i){
    let deleteInput = document.createElement('input');
    deleteInput.setAttribute('type', 'hidden');
    deleteInput.setAttribute('value', currentFiles[i]['name']);
    deleteInput.setAttribute('name', 'deletion-entries[]');

    document.getElementById('admin-form').appendChild(deleteInput);
    document.getElementById('img-container-' + i).remove();
}