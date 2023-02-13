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

const url = new URL(window.location); 

const searchForm = document.querySelector('form[name="search"]');
const searchTerm = document.getElementById('search_searchTerm');
if(searchTerm === undefined){

    console.log(searchTerm.value);
    searchForm.addEventListener('submit', function (event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "{{ path('app_allarticles')}}", true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            var searchResults = document.getElementById('search-results');
            searchResults.innerHTML = '';
            data.results.forEach(function(result) {
                var resultDiv = document.createElement('div');
                resultDiv.innerHTML = result;
                searchResults.appendChild(resultDiv);
                
                console.log(result);
            });
        }
    };
    xhr.send(formData);
});
}

    
    const slidesContainer = document.querySelector(".slides-container");
    const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
    if(slideWidth != null){

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
    }