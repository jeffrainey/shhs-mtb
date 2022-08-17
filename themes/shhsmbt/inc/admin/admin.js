// window.onload = function tabs() {
//     let author = document.querySelectorAll(".author input");
//     let tabs = document.querySelectorAll(".cf-complex__tabs-index");
//
//     for (let i = 0; i < author.length; i++) {
//         tabs[i].innerHTML = author[i].value;
//     }
// }
// tabs();

const customColors = ['#0B8380', '#E61E49', '#1676CA', '#8C408E', '#FF7800'];

window.onload = function () {

    let editor = document.querySelector('#editor');
    if(editor){
        editor.addEventListener('click', function() {
            let selector = document.querySelectorAll('.mce-colorbutton-grid');

            selector.forEach(function(item) {
                item.parentElement.style.height = "unset";
                item.querySelectorAll('div').forEach(function(div) {
                    var title = div.getAttribute('title');
                    if( title !== 'Custom color') {
                        div.style.display = 'none';
                    }
                });
                item.querySelectorAll('div[title="Custom color"]').forEach((item, idx) => {
                    if (typeof customColors[idx] !== 'undefined') {
                        item.setAttribute('data-mce-color', customColors[idx]);
                        item.style.backgroundColor = customColors[idx];
                    }
                })
            })

        });
    }
}