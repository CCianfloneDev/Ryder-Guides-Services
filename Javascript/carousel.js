const carouselContainer = document.querySelector(".carousel-container");
const carouselIndicators = document.querySelector(".carousel-indicators");

let slideIndex = 0;
let intervalId = null;

function startSlideshow() {
  intervalId = setInterval(() => {
    showSlides((slideIndex += 1));
  }, 3000);
}

function stopSlideshow() {
  clearInterval(intervalId);
}

// Fetch the JSON file
fetch("Javascript/images.json")
  .then((response) => response.json())
  .then((data) => {
    // Loop through the data and create the carousel slides and indicators
    data.images.forEach((item, index) => {
      const slide = document.createElement("div");
      slide.classList.add("carousel-slide");
      slide.innerHTML = `<img src="${item.path}" alt="${item.caption}" class="slide-image">`;
      carouselContainer.appendChild(slide);
      
      const indicator = document.createElement("button");
      indicator.classList.add("carousel-indicator");
      indicator.setAttribute("data-index", index);
      indicator.addEventListener("click", () => {
        showSlides(index);
      });
      carouselIndicators.appendChild(indicator);
    });

    // Set the first slide to active
    showSlides(slideIndex);
    startSlideshow();
  });

// Function to show the slides
function showSlides(n) {
    var slides = document.querySelectorAll(".carousel-slide");
    var indicators = document.querySelectorAll(".carousel-indicator");
    var totalSlides = slides.length;
  
    // Reset the index if it's greater than the total number of slides
    if (n >= totalSlides) {
      slideIndex = 0;
      n = 0;
    }
  
    // Reset the index if it's less than 0
    if (n < 0) {
      slideIndex = totalSlides - 1;
      n = totalSlides - 1;
    }
  
    // Hide all the slides and set opacity to 0
    for (let i = 0; i < totalSlides; i++) {
      slides[i].style.display = "none";
      slides[i].style.opacity = 0;
    }
  
    // Remove the active class from all the indicators
    for (let i = 0; i < indicators.length; i++) {
      indicators[i].classList.remove("active");
    }
  
    // Show the active slide and set opacity to 1 with fade effect
    slides[n].style.display = "block";
    let opacity = 0;
    const fadeInterval = setInterval(() => {
      if (opacity < 1) {
        opacity += 0.1;
        slides[n].style.opacity = opacity;
      } else {
        clearInterval(fadeInterval);
      }
    }, 50);
  
    // Set the active class to the current indicator
    indicators[n].classList.add("active");
  }

  
  

// Stop the slideshow when the user hovers over the carousel
carouselIndicators.addEventListener("mouseover", () => {
  stopSlideshow();
});

// Start the slideshow again when the user leaves the carousel
carouselIndicators.addEventListener("mouseout", () => {
  startSlideshow();
});

