// for modal
$(document).on('click', '.openModal', function() {
    var size = $(this).attr('size');
    var url = $(this).attr('href');
    var header = $(this).attr("header");
    header = header ? header : '';
    $('#modal-'+size).find(".header-text").text(header);
    $('#modal-'+size+'-loader').show();
    $('#modal-'+size).modal('show').find('#modal-'+size+'-body')
    .html("").load(url, function() {
        $('#modal-'+size+'-loader').hide();
    });
    return false;
});

$(document).ready(function() {
    $("#full-loader").fadeOut();
});

function readURL(input, elem) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      elem.attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
// doesn't work if input type="number" is specified
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

// doesn't work if input type="number" is specified
$(".numberonly").inputFilter(function(value) {
    return /^\d*$/.test(value);
});
// doesn't work if input type="number" is specified
$(".percentage").inputFilter(function(value) {
    return /^[1-9]?[0-9]?\.?\d?\d?$|^100/.test(value);
});

var snacktime;

function toast(msg) {
    var x = $("#snackbar");
    x.removeClass("show");
    x.addClass("show");
    x.html(msg);
    clearTimeout(snacktime);
    snacktime = setTimeout(function() {
        x.removeClass("show");
    }, 4000);
}

// Common for image change, image input change display also change
function readURL(input, elem) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        elem.attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

$(document).ready(function () {
    // Change classes and text for Prev, Next, and Pagination items
    $('.pagination li').addClass('page-item');
    $('.pagination li a').addClass('page-link');
    $('.pagination li.disabled').addClass('page-link');
});