// // $(document).ready(function() {
// //     $('#headerVideoLink').magnificPopup({
// //         type:'inline',
// //         midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
// //     });
// // });
// $(document).ready(function () {
//     $('#videoLink')
//         .magnificPopup({
//             type:'inline',
//             midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
//         });
// });
//
//
//
$(document).ready(function(){
    $('form input').change(function () {
        $('form p').text(this.files.length + " file(s) selected");
    });
});

// posts page


