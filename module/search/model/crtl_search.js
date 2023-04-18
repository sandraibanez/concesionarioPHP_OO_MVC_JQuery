
function load_brands() {
    console.log('hola');
    ajaxPromise('module/search/crtl/crtl_search.php?op=search_brand', 'POST', 'JSON')
        .then(function (data) {
            console.log(data);
            
            $('<option>Brand</option>').attr('selected', true).attr('disabled', true).appendTo('.search_brand')
            for (row in data) {
                $('<option value="' + data[row].name_brand + '">' + data[row].name_brand + '</option>').appendTo('.search_brand')
            }
           
        }).catch(function () {
            window.location.href = "index.php?page=exception&op=503&error=fail_load_brands&type=503";
        });
}

function load_category(brand) {
    // console.log(brand);
    
    console.log('hola2');
    $('.search_category').empty();
    if (brand == undefined) {
        ajaxPromise('module/search/crtl/crtl_search.php?op=search_category_null', 'POST', 'JSON')
            .then(function (data) {
                console.log(data);
                $('<option>Category</option>').attr('selected', true).attr('disabled', true).appendTo('.search_category')
                for (row in data) {
                    $('<option value="' + data[row].name_cat + '">' + data[row].name_cat + '</option>').appendTo('.search_category')
                }
            }).catch(function () {
                window.location.href = "index.php?page=exception&op=503&error=fail_load_category&type=503";
            });
    }
    else {
        console.log('hola3');
        console.log(brand);
        ajaxPromise('module/search/crtl/crtl_search.php?op=search_category', 'POST', 'JSON', brand)
            .then(function (data) {
                console.log(data);
                $('<option>Category</option>').attr('selected', true).attr('disabled', true).appendTo('.search_category')
                for (row in data) {
                    $('<option value="' + data[row].name_cat + '">' + data[row].name_cat + '</option>').appendTo('.search_category')
                }
            }).catch(function () {
                //  window.location.href = "index.php?module=exception&op=503&error=fail_loas_category_2&type=503";
            });
     }
 }

function launch_search() {
    load_brands();
    load_category();
    // $('.search_category').change(function () {
    //   console.log(this.value);
    // });
     $(document).on('change', '.search_brand', function () {
        // console.log('hola_change');
        let brand = $(this).val();
        
        console.log(brand);
        
        if (brand === 0) {
            load_category();
        } else {
            load_category({ brand });
        }
       
    });
}

function autocomplete() {
   
    $("#autocom").on("keyup", function () {
        console.log('hola_auto');
        // console.log(category);
         let sdata = { complete: $(this).val() };
        // console.log(sdata);
        if (($('.search_brand').val() != 0)) {
            sdata.brand = $('.search_brand').val();
            if (($('.search_brand').val() != 0) && ($('.search_category').val() != 0)) {
                sdata.category = $('.search_category').val();
            }
        }
        if (($('.search_brand').val() == undefined) && ($('.search_category').val() != 0)) {
            sdata.category = $('.search_category').val();
        }
        // console.log(sdata.brand);
        // console.log(sdata);
          ajaxPromise('module/search/crtl/crtl_search.php?op=autocomplete', 'POST', 'JSON', sdata)
             .then(function (data) {
                // console.log({sdata});
                 console.log(data);
                $('#searchAuto').empty();
                $('#searchAuto').fadeIn(10000000);
                for (row in data) {
                    $('<div></div>').appendTo('#search_auto').html(data[row].city).attr({ 'class': 'searchElement', 'id': data[row].city });
                }
                $(document).on('click', '.searchElement', function () {
                    $('#autocom').val(this.getAttribute('id'));
                    $('#search_auto').fadeOut(1000);
                });
                $(document).on('click scroll', function (event) {
                    if (event.target.id !== 'autocom') {
                        $('#search_auto').fadeOut(1000);
                    }
                });
             }).catch(function () {
                 $('#search_auto').fadeOut(500);
             });
     });
}

function button_search() {
    $('#search-btn').on('click', function () {
     
        var filters_search = [];
        if ($('.search_brand').val() != undefined) {
            filters_search.push({ "brand": [$('.search_brand').val()] })
            if ($('.search_category').val() != undefined) {
                filters_search.push({ "category": [$('.search_category').val()] })
            }
            if ($('#autocom').val() != undefined) {
                filters_search.push({ "city": [$('#autocom').val()] })
            }
        } 
        else if ($('.search_brand').val() == undefined) {
            if ($('.search_category').val() != undefined) {
                filters_search.push({ "category": [$('.search_category').val()] })
            }
            if ($('#autocom').val() != undefined) {
                filters_search.push({ "city": [$('#autocom').val()] })
             }
        }
        // console.log(search);
        localStorage.removeItem('filters_search');
        localStorage.removeItem('filter');
        localStorage.removeItem('filter_type');
        localStorage.removeItem('filter_category');
        localStorage.removeItem('filter_model');
        localStorage.removeItem('category_filter');
        localStorage.removeItem('brand_filter');
        localStorage.removeItem('motor_filter');
        localStorage.removeItem('detalle_coche');
        if (filters_search.length != 0) {
            localStorage.setItem('filters_search', JSON.stringify(filters_search));
        }
       
            window.location.href = ' index.php?page=ctrl_shop&op=list ';
        
    });
}

$(document).ready(function () {
    launch_search();
    autocomplete();
    button_search();
});