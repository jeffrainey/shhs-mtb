
function sero_init() {
    sero_nav();
}

function sero_nav() {
    let navButton   = document.getElementById('navbtn');
    let htmlWrapper = document.getElementsByTagName('html');
    let menuVisible = false;

    navButton.addEventListener('click', function() {
        htmlWrapper[0].classList.toggle('nav-trigger');

        let mobileMenu = document.getElementsByClassName("menu-mobile")[0];
        let mobileAltNav = mobileMenu.getElementsByClassName("mobile-alt-nav")[0];

        if ( menuVisible ){
            mobileAltNav.style.display = "none";
            menuVisible = false;
        }
        else {
            mobileAltNav.style.display = "block";
            menuVisible = true;
        }
    });

    let menu    = document.getElementById("primary-menu");
    let parents = menu.getElementsByClassName("menu-item-has-children");

    let listParents = [];

    for ( let i = 0; i < parents.length; i++ ){
        let subMenu = parents[i].getElementsByClassName("sub-menu")[0];
        subMenu.style.display = "none";
        listParents.push({
            parent: parents[i],
            child: subMenu,
            collapsed: true,
        });

        parents[i].addEventListener('click', toggleMenus);
    }

    function toggleMenus(){
        if ( event.clientY >= this.getBoundingClientRect().top && event.clientY <= this.getBoundingClientRect().bottom){
            event.stopPropagation();


            let currentEntry;

            for ( let i = 0; i < listParents.length; i++ ) {
                if (listParents[i].parent === this){
                    currentEntry = listParents[i];
                }
            }

            if ( currentEntry.collapsed ) {
                currentEntry.child.style.display = "block";
                this.classList.add("menu-item-expanded");
                currentEntry.collapsed = false;
            } else {
                currentEntry.child.style.display = "none";
                this.classList.remove("menu-item-expanded");
                currentEntry.collapsed = true;
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function(event) {
    sero_init();
});

let blogSidebar = document.getElementsByTagName('aside')[0];

if ( blogSidebar ) {
    let button = document.querySelectorAll('.mobile-button-section .light-button')[0];
    let closeButton = document.querySelectorAll('.mobile-button-section .light-button .btn')[0];

    button.addEventListener('click', function(){
        blogSidebar.classList.toggle('is-selected');
        closeButton.classList.toggle('light-btn');
        if ( closeButton.classList.contains('light-btn') ) {
            closeButton.innerHTML = "Filters"
        }
        else {
            closeButton.innerHTML = "Close"
        }
    });
}

