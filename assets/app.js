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
// import './slider';
 
const slidesContainer = document.querySelector(".slides-container");
if(slidesContainer != null){

    const slideWidth = slidesContainer.querySelector(".slide").clientWidth;
    
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");
    
    nextButton.addEventListener("click", () => {
        slidesContainer.scrollLeft += slideWidth * 2;
    });
    
    prevButton.addEventListener("click", () => {
        slidesContainer.scrollLeft -= slideWidth * 2;
    });
}
    
    // const button_color= document.getElementsById("button-color");
    
    
    // button_color.addEventListener("click", () => {
    //     console.log(button_color)
    //     // aria.toggleAttribute("disabled");
        
    // });

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

const searchForm = document.querySelector('form[name="search"]');
const searchTerm = document.getElementById('search_searchTerm');
const searchResults = document.getElementById('search-results');

searchForm.addEventListener('submit', function (event) {
    event.preventDefault();
    // const url = new URL(window.location);

    
    var formData = new FormData(this);
    var params = new URLSearchParams(formData).toString();
    //  url.searchParams.set("search",(formData).toString());
    console.log(params);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "/allarticles/search?" + params, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var view = '<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">'+xhr.responseText+'</div>';
            // console.log("53", data);
            // var data = JSON.parse(xhr.responseText);
            const newUrl = window.location.pathname + '?'+params;
            history.pushState({}, '', newUrl);
            displayResults(view); // Appel à la fonction qui affiche les résultats
            console.log(newUrl);
        }
    };
    xhr.send();
});

function displayResults(view) {
    // var resultsHtml = '';
    // results.forEach(function(result) {
    //     // Ajoutez ici le code pour afficher chaque résultat
    //     resultsHtml += '<div>' + result + '</div>';
    // });
   
    searchResults.innerHTML = view;
    
}


// const searchForm = document.querySelector('form[name="search"]');
// const searchTerm = document.getElementById('search_searchTerm');

// searchForm.addEventListener('submit', function (event) {
//     event.preventDefault();
//     console.log(searchTerm.value);

//     var formData = new FormData(this);
   
//     var params = new URLSearchParams(formData).toString();
//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', "/allarticles/search?" + params, true);
//     xhr.setRequestHeader('Content-Type', 'application/json');
//     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//             var data = JSON.parse(xhr.responseText);
//             var searchResults = document.getElementById('search-results');
//             searchResults.innerHTML = '';
//             data.results.forEach(function(result) {
//                 var resultDiv = document.createElement('div');
//                 resultDiv.innerHTML = result;
//                 searchResults.appendChild(resultDiv);
//                 console.log(result);
//             });
//         }
//     };
//     xhr.send();
// });




// searchForm.addEventListener("submit", function(e){e.preventDefault();
// console.log("test")})

// Récupérer la référence à la case à cocher.
const checkbox = document.getElementsByClassName("filter-cat-0");
Array.from(checkbox).forEach((element, index) => {
    // console.log(element,index);
    element.addEventListener("click", function() {
    // Créer une nouvelle instance de XMLHttpRequest
    
        var params = element.value.toString();
        console.log(params);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "/allarticles/checkbox?checkbox=" + params, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var view = '<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">'+xhr.responseText+'</div>';
                // console.log("53", data);
                // var data = JSON.parse(xhr.responseText);
                displayResultsCheckbox(view); // Appel à la fonction qui affiche les résultats
                const newUrl = window.location.pathname + '?'+params;
            history.pushState({}, '', newUrl);
            }
        };
        xhr.send();
    })
})
function displayResultsCheckbox(view) {
    // var resultsHtml = '';
    // results.forEach(function(result) {
    //     // Ajoutez ici le code pour afficher chaque résultat
    //     resultsHtml += '<div>' + result + '</div>';
    // });
    searchResults.innerHTML = view;
    
}

const checkboxtaille = document.getElementsByClassName("filter-size-0");
Array.from(checkboxtaille).forEach((element, index) => {
    // console.log(element,index);
    element.addEventListener("click", function() {
    // Créer une nouvelle instance de XMLHttpRequest
    
        var params = element.value.toString();
        console.log(params);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "/allarticles/checkboxt?taille=" + params, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var view = '<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">'+xhr.responseText+'</div>';
                // console.log("53", data);
                // var data = JSON.parse(xhr.responseText);
                displayResultsTaille(view); // Appel à la fonction qui affiche les résultats
               
            }
        };
        xhr.send();
    })
})
function displayResultsTaille(view) {
    // var resultsHtml = '';
    // results.forEach(function(result) {
    //     // Ajoutez ici le code pour afficher chaque résultat
    //     resultsHtml += '<div>' + result + '</div>';
    // });
    searchResults.innerHTML = view;
    
}
// Définir une fonction pour gérer le clic sur la case à cocher
// checkbox.addEventListener("click", function() {
       
//     // Créer une nouvelle instance de XMLHttpRequest
//         var formData = new FormData(this);
//         var params = new URLSearchParams(formData).toString();
//         var xhr = new XMLHttpRequest();
//         xhr.open('GET', "/allarticles/search?" + params, true);
//         xhr.setRequestHeader('Content-Type', 'application/json');
//         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//                 var view = '<div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">'+xhr.responseText+'</div>';
//                 // console.log("53", data);
//                 // var data = JSON.parse(xhr.responseText);
//                 displayResults(view); // Appel à la fonction qui affiche les résultats
               
//             }
//         };
//         xhr.send();
//     });
    

    
    
   