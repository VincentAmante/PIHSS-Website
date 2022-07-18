/**
 * PURPOSE: Handler for uploading multiple images, with a preview
 * 
 *    - Code largely attributed from: https://codepen.io/joezimjs/pen/yPWQbd 
 *    - Contains heavy modification from source
 */

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

/**
 * Handles dropping a file into the drop area
 *    This will modify the file input, adding the new file to the element's fileList
 * 
 * @param {*} e element being dropped 
 */
function handleDrop(e) {
  let dt = e.dataTransfer
  let files = [...dt.files];
  let newList = new DataTransfer();
  let existingFiles = [...document.getElementById(filesId).files];

  files.forEach(file => {
    existingFiles.push(file);
  });
  existingFiles.forEach(file => {
    newList.items.add(file);
  })
  let newListFiles = newList.files;
  document.getElementById(filesId).files = newListFiles;
  handleFiles(files);
}

let counter = 0; // For giving id to images (to handle deletion)
function handleFiles(files) {

  files = [...files]
  files.forEach(file => {
    previewFile(file, counter);
    counter++;
  });
}

/**
 * Removes a file from a given input[type='file']'s fileList
 * 
 * @param {*} filesId - id of input containing the files
 * @param {*} fileIndex - index of the image in the list
 */
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

  // Resets counter to regenerate ids
  counter = 0;

  // Re-renders list
  document.getElementById('gallery').innerHTML = "";
  handleFiles(document.getElementById(filesId).files);
}

/**
 * Adds a preview for a file in a provided gallery
 * 
 * @param {*} file - file to be displayed
 * @param {*} index - index to be given to file
 */
function previewFile(file, index=0) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {

    // Creates new div with an img element inside
    let img = document.createElement('img');
    let div = document.createElement('div');

    div.className = "img-preview-container";
    div.id = "img-preview-" + index;
    img.src = reader.result;
    
    div.appendChild(img);
    div.setAttribute('onclick', 'deleteFile("' + filesId + '", ' + index + ')');

    // Appends to preview gallery
    document.getElementById('gallery').appendChild(div)
  }
}

// Code to reset image previews
var form = document.querySelector("form");
form.onreset = () => {
  document.getElementById('gallery').innerHTML = "";
}