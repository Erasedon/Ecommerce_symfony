/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
// import './bootstrap';


const buttons = document.getElementsByClassName("button_dropdown");
const dropdowns = document.getElementsByClassName('dropdown');

Array.from(buttons).forEach((element, index) => {
  
    element.addEventListener("click", function() {
        console.log(element,index)
            Array.from(dropdowns).forEach((dropdown, idx) => {
                if(idx != index) {
                   
                    dropdowns[idx].classList.add("hidden");
                    
                }else{
                    dropdowns[idx].classList.toggle("hidden");
                }
            })
        
          });
});

const slidesContainer = document.querySelector(".slides-container");
const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
const prevButton = document.querySelector(".prev");
const nextButton = document.querySelector(".next");

nextButton.addEventListener("click", () => {
	slidesContainer.scrollLeft += slideWidth * 2;
});

prevButton.addEventListener("click", () => {
	slidesContainer.scrollLeft -= slideWidth * 2;
});

const button_color= document.getElementsById("button-color");


button_color.addEventListener("click", () => {
    console.log(button_color)
    // aria.toggleAttribute("disabled");
    
});