// Get the input and image elements
const fileInput = document.getElementById('my-file-input');
const imagePreview = document.getElementById('my-image');

// Listen for the file input change event
fileInput.addEventListener('change', function(event) {
  // Get the selected file
  const selectedFile = event.target.files[0];

  // Read the selected file as a URL
  const reader = new FileReader();
  reader.onload = function(event) {
    // Set the image preview source
    imagePreview.src = event.target.result;
  };
  reader.readAsDataURL(selectedFile);
});

/***************************************** */

function setReadOnly() {
    var elements = document.getElementsByClassName("input-item");
    var btn_img = document.getElementById('my-file-input');
  btn_img.style.zIndex = "-100";

    for (var i = 0; i < elements.length; i++) {
      elements[i].readOnly = true;
      elements[i].style.border = "unset";
    }
}
setReadOnly();
function removeReadOnly() {
  
  var btn_img = document.getElementById('my-file-input');
  btn_img.style.zIndex = "1";

    var elements = document.getElementsByClassName("input-item");
  
    for (var i = 0; i < elements.length; i++) {
      elements[i].readOnly = false;
  
      elements[i].style.border = "1px solid black";
    }
}
  





