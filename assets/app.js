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
                    switch (index) {
                        case idx = 0:
                                idx = 0;
                            dropdowns[idx].classList.toggle("hidden");
                            break;
                        case idx = 1:
                            idx = 1;
                        dropdowns[idx].classList.toggle("hidden");
                        break;
                      
                    }
                    
                }
            })
        
          });
});

