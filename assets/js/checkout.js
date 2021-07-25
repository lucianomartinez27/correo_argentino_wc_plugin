
jQuery(function ($) {

    check_shipping_method()

    $(document).on('change', '.shipping_method', check_shipping_method)


    $('#billing_postcode').on('change', hidde_billing_postcode)
    $('#shipping_postcode').on('change', hidde_shipping_postcode)



    $('#billing_state').on('change', function () {

        ajax_request('localities', create_locations_with_branches_options);
    })

    $('#shipping_state').on('change', function () {

        ajax_request('localities', create_locations_with_branches_options);
    })

    $('#location_branches').on('change', function () {

        ajax_request('branches', create_branch_options);

    })


})
function hidde_billing_postcode() {
    if (!jQuery('#ship-to-different-address-checkbox').is(':checked')) {
         hidde_branches()
    }
}

function hidde_shipping_postcode(){
    if (jQuery('#ship-to-different-address-checkbox').is(':checked')) {
        hidde_branches()
   }
}
function hidde_branches() {
    jQuery('#location_branches_field').hide();
    jQuery('#branches_field').hide();
    jQuery("#shipping_method_0_kelder_correo_argentino_sucursal").prop("checked", false);
}
function show_branches() {
    jQuery('#location_branches_field').show();
    jQuery('#branches_field').show();
}

function check_shipping_method() {
    ca_input = jQuery('#shipping_method_0_kelder_correo_argentino_sucursal')
    if (ca_input.is(':visible') && ca_input.is(':checked')) {
        show_branches();
    } else {
        hidde_branches();
    }

}


function get_state() {
    if (jQuery('#ship-to-different-address-checkbox').is(':checked')) {
        return jQuery('#shipping_state').val();
    } else {
        return jQuery('#billing_state').val();
    }
}



function create_branch_options(branches) {
    var branch_options = document.getElementById("branches");
    branch_options.innerHTML = '';
    add_prepend('branches')
    JSON.parse(branches).forEach(function (branch) {
        var tag = document.createElement("option");
        tag.value = branch['CODIGO_NIS'] + ': ' + branch['CALLE'] + ' ' + + branch['NUMERO'];
        var text = document.createTextNode(branch['CALLE'] + ' ' + branch['NUMERO']);
        tag.appendChild(text);
        branch_options.appendChild(tag);
    })


}

function create_locations_with_branches_options(data) {

    var locations_with_branch_options = document.getElementById("location_branches");
    locations_with_branch_options.innerHTML = '';
    add_prepend('location_branches')

    JSON.parse(data).forEach(function (branch) {

        var tag = document.createElement("option");
        tag.value = branch['LOCALIDAD']
        var text = document.createTextNode(branch['LOCALIDAD']);
        tag.appendChild(text);
        locations_with_branch_options.appendChild(tag);
    })




}


function add_prepend(id_element) {
    var element = document.getElementById(id_element);

    var tag = document.createElement("option");
    tag.value = 0
    tag.selected = 'selected';
    tag.appendChild(document.createTextNode('Seleccione  una sucursal'))
    element.appendChild(tag);
}


function ajax_request(thisaction, callback) {

    jQuery(function ($) {
        var jsonData = {};

        jsonData.action = thisaction;
        jsonData.province = get_state();
        jsonData.localitie = $('#location_branches').val();

        $.ajax({
            url: 'https://lucianomartinez.000webhostapp.com/api/branches.php',
            data: jsonData,
            type: 'POST',
            success: callback,
        });
        return;
    })

}
