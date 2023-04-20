
$(function() {
    $('#data-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

bsCustomFileInput.init();

$(".admin-toastr").trigger('click');


function toastr_success(msg) {
    toastr.success(msg)
}

function toastr_danger(msg) {
    toastr.error(msg)
}

function confirm_box_status(status, id, url, _this, msg) {
    if (confirm("Do you really want to change status ?")) {
        let curr_status = $(_this).children().text()
        $(_this).children().text('Waiting...')
        let csrf = $("input[name='_token']").val()
        $.ajax({
            url: base_url + url,
            type: "POST",
            data: { status: status, id: id,_token:csrf },
            success: $.proxy(function(res) {
                if (res == 'success') {
                    if (status == 'active') {
                        $(_this).parent().html('<a class="text-success" onclick="confirm_box_status(\'inactive\',' + id + ',\'' + url + '\',this,\'' + msg + '\')"><strong>Active</strong></a>');
                    }
                    if (status == 'inactive') {
                        $(_this).parent().html('<a class="text-danger" onclick="confirm_box_status(\'active\',' + id + ',\'' + url + '\',this,\'' + msg + '\')"><strong>Inactive</strong></a>');
                    }
                    toastr_success(msg + ' status has changed successfully')
                } else if (res == 'error') {
                    toastr_danger('Error occured in changing status')
                    $(_this).children().text(curr_status)
                }
            }, this)
        });
    }
}

function confirm_box_delete(id, url) {
    if (confirm("Do you really want to delete this data ?")) {
        window.location.href = base_url + url + '/' + id;
    }
}

$('.select2').select2()

$('.select2bs4').select2({
    theme: 'bootstrap4'
})

$(function() {
    $('.textarea').summernote()
})

$("input[data-bootstrap-switch]").each(function() {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
});

// BLOG SECTION

var blog_img_count = 1
$('body').on('click','.add-blog-img',function(){
  $(this).parent().before(`<div class="row blog-img-block${blog_img_count}"> <div class="col-md-10"> <div class="form-group"> <div class="input-group"> <div class="custom-file"> <input type="file" name="imgs${blog_img_count}" class="custom-file-input" id="imgs${blog_img_count}"> <label class="custom-file-label" for="imgs${blog_img_count}">Choose file</label> </div> </div> </div> </div> <div class="col-md-2"> <button type="button" class="btn remove-blog-img btn-block btn-danger" data-id="${blog_img_count}"><i class="fas fa-trash"></i> Remove </button> </div> </div>`);
  blog_img_count++;
})

$('body').on('click','.remove-blog-img',function(){
  var id = $(this).data('id')
  $(this).parent().parent().remove();
})

function blog_img_delete(id, key,url) {
  if (confirm("Do you really want to delete this image ?")) {
    window.location.href = base_url + url + '/' + id+ '/' + key;
  }
}

// BANNER
function banner_img_delete(id, key,url) {
    if (confirm("Do you really want to delete this image ?")) {
      window.location.href = base_url + url + '/' + id+ '/' + key;
    }
}
var banner_img_count=1;
$('body').on('click','.add-banner-img',function(){
    $(this).parent().before(`<div class="row banner-img-block${banner_img_count}"> <div class="col-md-10"> <div class="form-group"> <div class="input-group"> <div class="custom-file"> <input type="file" name="imgs${banner_img_count}" class="custom-file-input" id="imgs${banner_img_count}"> <label class="custom-file-label" for="imgs${banner_img_count}">Choose file</label> </div> </div> </div> </div> <div class="col-md-2"> <button type="button" class="btn remove-banner-img btn-block btn-danger" data-id="${banner_img_count}"><i class="fas fa-trash"></i> Remove </button> </div> </div>`);
    banner_img_count++;
})
$('body').on('click','.remove-banner-img',function(){
    var id = $(this).data('id')
    $(this).parent().parent().remove();
  })



// $('body').on('change','.order-status',function(){})
