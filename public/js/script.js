// Navbar Mobile Hamburger Menu
$(function () {
    'use strict'
  
    $('[data-toggle="offcanvas"]').on('click', function () {
      $('.offcanvas-collapse').toggleClass('open')
    })
  })



// JQuery Upload Image Preview
function readURL(input) {
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#imagePreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

// Read Preview Upload
$("#imgInp").change(function () {
    readURL(this);
});


// Get Class File-Name Uploaded
const fileInput = document.querySelector('#file-js-example input[type=file]');
fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
    }
}

// SCROLL to ID
$("a[href^='#']").click(function (e) {
    e.preventDefault();

    var position = $($(this).attr("href")).offset().top;
    $("body, html").animate({
        scrollTop: position
    } /* speed */);
});
