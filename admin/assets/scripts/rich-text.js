const quillEditorId = '.ql-editor';

// Creates Rich Text Editor (Quill.js)
const quill = new Quill('#editor-container', {
    modules: {
      toolbar: [
        ['bold', 'italic'],
        ['link', 'blockquote', 'code-block'],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ]
    },
    placeholder: 'Write your thoughts here!',
    theme: 'snow'
  });
  
// Handler for Submitting forms
var form = document.querySelector('form');
form.onsubmit = () => {
    // Saves the input delta, this is for re-editing the content
    let inputDelta = document.querySelector('input[name=input-delta]');
    inputDelta.value = JSON.stringify(quill.getContents());

    let parser = new DOMParser();

    // Saves the input html, this is for displaying the content
    let quillContent = parser.parseFromString(document.querySelector(quillEditorId).innerHTML);
    let inputHtml = document.querySelector('input[name=input-html]');
    inputHtml.value = quillContent;

    form.submit();
};

const setQuill = (content) => {
  let quillContent = document.querySelector(quillEditorId);
  quillContent.innerHTML = content;
}

form.onreset = () => {

}