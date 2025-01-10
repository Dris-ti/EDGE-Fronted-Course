let searchbtn = document.querySelector(".nav-search-icon");
let searchtxt = document.querySelector(".nav-search-input-txt");
let nav = document.querySelector(".nav");
let searchOn = false;

searchbtn.addEventListener("click", () => {
    if(searchOn === true)
        {
            searchOn = false;
            searchtxt.style.borderBottom = "2px solid #09AAF4";
        }
        else{
            searchOn = true;
            searchtxt.style.borderBottom = "none";
        }
})
 

window.addEventListener("scroll", () => {
    if(window.scrollY === 0)
    {
        nav.style.background = "#062241";
    }
    else
    {
        nav.style.background = "#09AAF4";
    }
})




// ++++++++++++++++++++++++ ADMIN PAGE +++++++++++++++++++++++++++

let tabs = document.querySelectorAll(".div-tabs button");
let tab_contents = document.querySelectorAll(".div-tab-contents .TAB");

console.log(tabs[6]);

showTab(0);

function showTab(idx){
    tabs.forEach(function(node){
        node.style.background = "";
    });
    tabs[idx].style.background = "#062241";

    tab_contents.forEach(function(node){
        node.style.display = "none";
    });
    tab_contents[idx].style.display = "block";
}


// ++++++++++++++++++++++++ End of ADMIN PAGE ++++++++++++++++++++++++++



