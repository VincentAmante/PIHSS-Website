// DRAG AND DROP CODE FOR MULTIPLE FILES
// Code largely attributed from: https://codepen.io/joezimjs/pen/yPWQbd 

let dropArea = document.getElementById("drop-area");
const filesId = "fileElem";

// Prevent default drag behaviors
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
});

// Highlight drop area when item is dragged over it
['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
});

['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
});

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false);

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  console.log('dropped');
  let dt = e.dataTransfer
  let files = [...dt.files];
  let newList = new DataTransfer();
  let existingFiles = [...document.getElementById("fileElem").files];

  files.forEach(file => {
    existingFiles.push(file);
  });
  existingFiles.forEach(file => {
    newList.items.add(file);
  })
  let newListFiles = newList.files;
  console.log('NewListFiles: ' + newListFiles);
  document.getElementById("fileElem").files = newListFiles;
  handleFiles(files);
}

// let uploadProgress = []
// let progressBar = document.getElementById('progress-bar')

// function initializeProgress(numFiles) {
//   progressBar.value = 0
//   uploadProgress = []

//   for(let i = numFiles; i > 0; i--) {
//     uploadProgress.push(0)
//   }
// }

// function updateProgress(fileNumber, percent) {
//   uploadProgress[fileNumber] = percent
//   let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
//   progressBar.value = total
// }

let counter = 0;
function handleFiles(files) {
  console.log(files);
  files = [...files]
  // initializeProgress(files.length);

  files.forEach(file => {
    previewFile(file, counter);
    counter++;
  });
}

function deleteFile(filesId, fileIndex){
  filesElement = [...document.getElementById(filesId).files];
  filesElement.splice(fileIndex, 1);

  // Removes file from file Input
  let newList = new DataTransfer();
  filesElement.forEach(file => {
    newList.items.add(new File([file], file["name"]))
  });
  let newListFiles = newList.files;
  document.getElementById(filesId).files = newListFiles;

  counter = 0;

  // Re-renders list
  document.getElementById('gallery').innerHTML = "";
  handleFiles(document.getElementById(filesId).files);
}

function previewFile(file, index=0) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img');
    let div = document.createElement('div');

    div.className = "img-preview-container";
    div.id = "img-preview-" + index;
    img.src = reader.result;
    
    div.appendChild(img);
    div.setAttribute('onclick', 'deleteFile("' + filesId + '", ' + index + ')');

    document.getElementById('gallery').appendChild(div)
  }
}

// Code to reset image previews
var form = document.querySelector("form");
form.onreset = () => {
  document.getElementById('gallery').innerHTML = "";
}