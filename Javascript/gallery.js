document.addEventListener('DOMContentLoaded', () => {
  // Get the data from the images.json file
  fetch('Javascript/images.json')
    .then(response => response.json())
    .then(data => {
      // Get the container element where the images will be added
      const container = document.getElementById('gallery');

      // Loop through the data and create image elements
      data.images.forEach(image => {
        // Create an image element
        const img = document.createElement('img');
        img.src = image.path;
        img.alt = image.caption;
        img.classList.add("grid-item")

        // Append the image to the container
        container.appendChild(img);
      });
    });
});
