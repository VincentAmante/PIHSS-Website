function displayCurrentImages(currentFiles, currentGallery){
    for (let i = 0; i < currentFiles.length; i++){
        let img = document.createElement('img');
        let div = document.createElement('div');
        
        div.className = "img-preview-container";
        img.src = '../' + currentFiles[i]['path'];
        div.setAttribute('id', 'img-container-' + i);
        div.appendChild(img);
        div.setAttribute('onclick', 'deleteEntry(' + i + ')');
        
        currentGallery.appendChild(div)
    }
}

function deleteEntry(i){
    let deleteInput = document.createElement('input');
    deleteInput.setAttribute('type', 'hidden');
    deleteInput.setAttribute('value', currentFiles[i]['path']);
    deleteInput.setAttribute('name', 'deletion-entries[]');

    document.getElementById('admin-form').appendChild(deleteInput);
    document.getElementById('img-container-' + i).remove();
}