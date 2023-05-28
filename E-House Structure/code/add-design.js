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
