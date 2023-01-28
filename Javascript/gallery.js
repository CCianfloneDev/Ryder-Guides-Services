// Fetch the JSON file
fetch('Javascript/images.json')
.then(response => response.json())
.then(data => {
  // Get the container element
  const container = document.getElementById('gallery');

  // Loop through the images in the JSON data
  data.images.forEach(image => {
    // Create an image element
    const img = document.createElement('img');
    img.src = image.path;
    img.alt = image.caption;
    img.classList.add('img-fluid');

    // Create a caption element
    const caption = document.createElement('p');
    caption.innerText = image.caption;

    // Create a div element to hold the image and caption
    const div = document.createElement('div');
    div.appendChild(img);
    div.appendChild(caption);
    div.classList.add('col-md-4');

    // Add the div to the container
    container.appendChild(div);

    });
});
