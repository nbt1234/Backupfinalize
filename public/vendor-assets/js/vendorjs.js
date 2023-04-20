$(function() {
    $("#data-table").DataTable({
        paging: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true
    });
});

bsCustomFileInput.init();

$(".admin-toastr").trigger("click");

function toastr_success(msg) {
    toastr.success(msg);
}

function toastr_danger(msg) {
    toastr.error(msg);
}

function confirm_box_status(status, id, url, _this, msg) {
    if (confirm("Do you really want to change status ?")) {
        let curr_status = $(_this)
            .children()
            .text();
        $(_this)
            .children()
            .text("Waiting...");
        let csrf = $("input[name='_token']").val();
        $.ajax({
            url: base_url + url,
            type: "POST",
            data: { status: status, id: id, _token: csrf },
            success: $.proxy(function(res) {
                if (res == "success") {
                    if (status == "active") {
                        $(_this).parent().html('<a class="text-success" onclick="confirm_box_status(\'inactive\',' + id + ",'" + url + "',this,'" + msg + "')\"><strong>Active</strong></a>");
                    }
                    if (status == "inactive") {
                        $(_this).parent().html('<a class="text-danger" onclick="confirm_box_status(\'active\',' + id + ",'" + url + "',this,'" + msg + "')\"><strong>Inactive</strong></a>");
                    }
                    toastr_success(msg + " status has changed successfully");
                } else if (res == "error") {
                    toastr_danger("Error occured in changing status");
                    $(_this).children().text(curr_status);
                }
            }, this)
        });
    }
}

function confirm_box_delete(id, url) {
    if (confirm("Do you really want to delete this data ?")) {
        window.location.href = base_url + url + "/" + id;
    }
}

$(".select2").select2();


$(".select2bs4").select2({
    theme: "bootstrap4"
});

$(function() {
    $(".textarea").summernote();
});

$("input[data-bootstrap-switch]").each(function() {
    $(this).bootstrapSwitch("state", $(this).prop("checked"));
});

// ADD PRODUCT IMAGE
var add_product_img_count = 1;

$("body").on("click", ".add-product-ven-img", function() {
    $(this).parent().parent().parent().append(`<div class="row product-img-block${add_product_img_count}"> <div class="col-md-10"> <div class="form-group"> <div class="input-group"> <div class="custom-file"> <input type="file" name="img${add_product_img_count}" class="custom-file-input" id="img${add_product_img_count}"> <label class="custom-file-label" for="img${add_product_img_count}">Choose file</label> </div> </div> </div> </div> <div class="col-md-2"> <button type="button" class="btn remove-product-img-ven btn-block btn-danger" data-id="${add_product_img_count}"><i class="fas fa-minus-circle"></i> </button> </div> </div>`);
    add_product_img_count++;
});

$("body").on("click", ".remove-product-img-ven", function() {
    var id = $(this).data("id");
    $(".product-img-block" + id).remove();
});

// PRODUCT VARIATION
var add_product_attr = 1;

$("body").on("change", "select[name=product_type]", function() {
    if ($("#product_type").val() == 1) {
        var option = $('#attr_option').html();
        $(".attribute-section").removeClass("hidden");
        $('.attribute-section').append(`<div class="product-variable-section col-12"><label>Product Type</label><div class="row product-variable-0"><div class="col-md-4 col-sm-12"><div class="form-group mb-0"><select class="form-control attr-add-product" name="product_attr[0]">` + option + `</select></div></div><div class="col-md-6"><div class="form-group"><div class="select2-primary"><select name="attr_val[0][]"class="select2 attr_val" data-placeholder="Enter values" style="width:100%;" multiple="multiple"></select></div></div></div><div class="col-md-2 col-sm-3 mb-3 mt-0"><button type="button" class="btn add-product-ven-attr btn-block btn-warning"><i class="fas fa-plus-circle"></i></button></div></div></div><div class="col-2 mx-auto"><button id="generate-table" class="btn btn-block btn-primary">Generate</button></div>`);
        $(".attr-add-product").select2({ tags: true });
        $(".attr_val").select2({ tags: true });
    } else {
        add_product_attr = 1;
        $(".attribute-section").addClass("hidden");
        $(".attribute-section").html('');
    }
});

// $(document).ready(function() {
//     var option = $('#attr_option').html();
//     $(".attribute-section").removeClass("hidden");
//     $('.attribute-section').append(`<div class="product-variable-section col-12"><label>Product Type</label><div class="row product-variable-0"><div class="col-md-4 col-sm-12"><div class="form-group"><select class="form-control attr-add-product" name="product_attr[]">` + option + `</select></div></div><div class="col-md-6"><div class="form-group"><input type="text" name="attr_val[]"class="form-control attr_val" placeholder="Enter values Comma(,) separated" value=""></div></div><div class="col-md-2 col-sm-3 mb-3 mt-0"><button type="button" class="btn add-product-ven-attr btn-block btn-warning"><i class="fas fa-plus-circle"></i></button></div></div></div><div class="col-2 mx-auto"><button id="generate-table" class="btn btn-block btn-primary">Generate</button></div>`);
// });



$("body").on("click", ".add-product-ven-attr", function() {
    var option = $('#attr_option').html();
    var html = `<div class="row product-variable-${add_product_attr}"> <div class="col-md-4 col-sm-12"> <div class="form-group mb-0">
    <select class="form-control attr-add-product" name="product_attr[${add_product_attr}]">` + option + `</select></div></div><div class="col-md-6"><div class="form-group"><div class="select2-primary"><select name="attr_val[${add_product_attr}][]"class="select2 attr_val" data-placeholder="Enter values" style="width:100%;" multiple="multiple"></select></div></div></div><div class="col-md-2 col-sm-3 mb-3 mt-0"> <button type="button" class="btn remove-product-attr-ven btn-block btn-danger" data-id="${add_product_attr}"><i class="fas fa-minus-circle"></i> </button> </div> </div>`;
    $(this).parent().parent().parent().append(html);
    add_product_attr++;
    $(".attr-add-product").select2({ tags: true });
    $(".attr_val").select2({ tags: true });
});
// $("body").on("click", ".remove-product-attr-ven", function() {
//     var id = $(this).data("id");
//     $(".product-variable-" + id).remove();
// });
$("body").on("click", ".remove-product-attr-ven", function () {
    var id = $(this).data("id");
    var fieldname = $(".select-add-attr-product-"+id).val();
    $(".product-variable-" + id).remove();
    $("." + fieldname + "-div").remove();
});

function onlyUnique(value, index, self) {
    if (value != '' || value != null)
        return self.indexOf(value) === index;
}
var vairant_count = 0;
$('body').on('click', '#generate-table', function (e) {
    e.preventDefault();
    let attr_name = [];
    let attr_val = [];
    $('.product-variable-section .attr-add-product').each(function (i) {
        attr_name.push($(this).val());
        attr_val.push($('.product-variable-section .attr_val').eq(i).val())
    })

    attr_name = attr_name.filter(onlyUnique)
    $('.product-variation-data').html('');

    $('.product-variation-data').append(`<div class="row product-variation-block${vairant_count}"></div>`)

    for (let i = 0; i < attr_val.length; i++) {
        let attr_vals = attr_val[i];
        // let attr_vals = attr_val[i].split(',');
        // console.log(attr_vals)

        var html = `<div class="col variant-block ${attr_name[i]}-div"><div class="form-group"><select class="product_drop form-control ${attr_name[i].toLowerCase()}" name="product_attr_drop[]"><option>Select ${attr_name[i]}</option></select></div></div>`;


        $('.product-variation-data .product-variation-block' + vairant_count).last().append(html);

        for (let j = 0; j < attr_vals.length; j++) {
            console.log(attr_vals[j])
            let options;
            if (attr_vals[j].trim() != '') {
                options = new Option(attr_vals[j].trim(), attr_vals[j].trim());
            }

            $('.' + attr_name[i].toLowerCase()).append(options);

        }
    }

    $('.product-variation-block' + vairant_count).append(`<div class="col"> <div class="form-group"> <input type="text" name="mrp_price[]" class="form-control" placeholder="Enter Regular price"> </div> </div> <div class="col"> <div class="form-group"> <input type="text" name="sell_price[]" class="form-control" placeholder="Enter Sales price"> </div> </div> <div class="col"> <div class="form-group"> <input type="text" name="stocks[]" class="form-control" placeholder="Enter Stock"> </div> </div> <div class="col"> <button type="button" class="btn btn-block btn-warning add-more-variant"> <i class="fas fa-plus-circle"></i> </button> </div>`);

    // $(".product_drop").select2();

})

var variant_block_count = 1;
$('body').on('click', '.add-more-variant', function (e) {
    let html = $('.product-variation-block0').clone().find("input:text").val("").end()
        .appendTo('.product-variation-block0:last');


    $(html).find('.add-more-variant').parent().after(`<div class="col"> <button type="button" class="btn remove-product-variant btn-block btn-danger" data-id="${variant_block_count}"> <i class="fas fa-minus-circle"></i> </button> </div>`);
    $(html).find('.add-more-variant').parent().remove();

    // console.log(html)

    $('.product-variation-data').last().append(html);


    $('.product-variation-block0').last().addClass('product-variation-block' + variant_block_count).removeClass('product-variation-block0');
    variant_block_count++;
});

$("body").on("click", ".remove-product-variant", function () {
    var id = $(this).data("id");
    $(".product-variation-block" + id).remove();
});


// $('body').on('click', '#generate-table', function(e) {
//     e.preventDefault();
//     let csrf = $("input[name='_token']").val()
//     let data = $('.attribute-section :input').serialize();
//     $.ajax({
//         url: base_url + "vendor/attr-combination",
//         type: "POST",
//         data: { data: data, _token: csrf },
//         success: function(data) {
//             $('.attribute-section').find('table').remove();
//             $('.attribute-section').append(data);
//         }
//     });
// })

// PRODUCT VARIATION

$("body").on("change", ".product-categories", function() {
    let csrf = $("input[name='_token']").val()
        // $(".subcategory-section").remove()
    let cat_id = $('.product-categories option:selected').val();
    $.ajax({
        url: base_url + "vendor/get-product-subcategory",
        type: "POST",
        data: { cat_id: cat_id, _token: csrf },
        success: function(response) {
            if (response.trim() != 'error') {
                let res = JSON.parse(response)
                    // console.log(res)
                    // $('.category-section').after(`<div class="col-md-6 subcategory-section"> <div class="form-group"> <label>Sub Category</label> <div class="select2-primary"> <select class="select2 subcategories" name="subcate[]" multiple="multiple" data-placeholder="Select sub category" style="width:100%;"><option value=''> Select sub category</option> </select> </div> </div> </div>`)

                $(res).each(function(i) {
                    var newOption = new Option(res[i].subcate_name, res[i].subcat_id, false, false);
                    $('.subcategories').append(newOption).trigger('change');

                    // $('.subcategories').append(`<option value=''> ${i}</option>`);
                });
                console.clear()
                $(".select2").select2();
            }
        }
    });
});
// $("body").on("change", 'select.attr-add-product', function() {
$("body").on("change", 'select[name^="product_attr"]', function() {
    if(!$(this).hasClass('attr-add-product'))
        return
    let csrf = $("input[name='_token']").val()
    let attr_id = $(this).find('option:selected').data('id');
    let index=$(this).attr('name').match(/\d+/);
    if(attr_id==''||attr_id==null){
        // alert("Plesae select correct value")
        return;
    }
    $.ajax({
        url: base_url + "vendor/get-attribute-values",
        type: "POST",
        data: { attr_id: attr_id, _token: csrf },
        success: function(response) {
            if (response.trim() != 'error') {
                let res = JSON.parse(response)
                $(`select[name="attr_val[${index}][]"]`).html('');
                $(res).each(function(i) {
                    var newOption = new Option(res[i].attr_value, res[i].attr_value, false, false);
                    $(`select[name="attr_val[${index}][]"]`).append(newOption).trigger('change');
                });
            }
        }
    });
});

/////////////////////// PRODUCT PAGE VALIDATION//////////////////////////

$('body').on('click', '#add-product input', function() {
    $(this).removeClass('is-invalid');
    $(this).next('.error').remove();
})
$('body').on('change', '#add-product select', function() {
    $(this).next().children().children().css("border-color", "");
    $(this).parent().nextAll('.form-valid-error').remove();
})
$('body').on('submit', '#add-product', function() {
    $('input').each(function(index) {
        $(this).nextAll('.error').remove();
        $(this).removeClass('is-invalid');
        if ($(this).val() == null || $(this).val() == '') {
            $(this).addClass('is-invalid')
            let name = $(this).attr('name');
            if (name != undefined) {
                var html = '<span class="error invalid-feedback">Please enter a ' + name + '</span>';
                $(this).after(html);
            }
        }
    });
    $('select').each(function(index) {
        $(this).parent().nextAll('.form-valid-error').remove();
        // alert($(this).attr('name')+$(this).val())
        if ($(this).val() == null || $(this).val() == '') {
            let name = $(this).attr('name');
            switch (name){
                case 'tag[]':
                    name="Tag";break;
                case 'subcate[]':
                    name="Subcate";break;
                case 'cat_ids':
                    name="Category";break;
                case(name.match(/^product_attr[[]{1}[0-9]+[\]]{1}$/) ? true : false):
                    name="Attribute value";break;
                case(name.match(/^attr_val[[]{1}[0-9]+[\]]{1}[[]{1}[\]]{1}$/) ? true : false):
                    name="Attribute";break;
                case(name=='product_attr[1]' ? true : false):
                    alert("success");
                    break;
            }
            var html = '<span class="form-valid-error">Please select ' + name + '</span>';
            $(this).parent().after(html);
            $(this).next().children().children().css("border-color", "#dc3545");
        }
    });
    if ($('body').find('.form-valid-error,.error,.is-invalid')) {
        // alert()
        return false;
    }
});
