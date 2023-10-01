let pagesmenucontainer = document.querySelector(".pages-menu-container");
let isShow = true;

function showHideUser(e) {

    if (isShow) {
        pagesmenucontainer.style.display = "block";
        isShow = false;
    } else {
        pagesmenucontainer.style.display = "none";
        isShow = true;
    }

}





function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }


// function img_pathUrl(input){
//         $('#url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
//     }





// add movie page
$(document).ready(function() {
            $('input[class="upload-movie-input"]').change(function(e) {
                var geekss = e.target.files[0].name;
                $(".upload-movie-heading").text('Movie Trailer : ' + geekss );
 
            });
        });


$(document).ready(function() {
            $('input[class="upload-trailer-input"]').change(function(e) {
                var geekss = e.target.files[0].name;
                $(".upload-movie-heading-trailer").text('Full Movie : ' + geekss );
 
            });
        });


$(document).ready(function() {
            $('input[class="upload-upcoming-trailer"]').change(function(e) {
                var geekss = e.target.files[0].name;
                $(".upload-movie-heading").text('Movie Trailer : ' + geekss );
 
            });
        });