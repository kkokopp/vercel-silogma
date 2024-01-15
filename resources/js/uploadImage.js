const uploadInput = document.getElementById('image');
const filenameLabel = document.getElementById('filename');
const imagePreview = document.getElementById('image-preview');
const img = document.getElementById('image-preview').querySelector('img');

// Check if the event listener has been added before
let isEventListenerAdded = false;
// console.log(isEventListenerAdded);
uploadInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  // console.log(file);

  if (file) {
    filenameLabel.textContent = file.name;

    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.innerHTML =
        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
      imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

      // Add event listener for image preview only once
      // isEventListenerAdded = true;
      if (!isEventListenerAdded) {
        // console.log(isEventListenerAdded);
        imagePreview.addEventListener('click', () => {
          uploadInput.click();
        });

        isEventListenerAdded = true;
      }
    };
    reader.readAsDataURL(file);
  } else {
    // console.log('no file');
    filenameLabel.textContent = '';
    imagePreview.innerHTML =
      `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
    imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

    // Remove the event listener when there's no image
    imagePreview.removeEventListener('click', () => {
      uploadInput.click();
    });

    isEventListenerAdded = true;
  }
});

uploadInput.addEventListener('click', (event) => {
  console.log('uploadInput clicked');
  event.stopPropagation();
});