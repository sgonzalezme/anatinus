/**
 * Created by prada on 22/01/15.
 */

if (typeof(adminEnjobit) == "undefined"){
    adminEnjobit = {};
}

if (typeof(adminEnjobit.offer) == "undefined"){
    adminEnjobit.offer = {

    };
}

adminEnjobit.offer.init = function(){

    $('#_button-show-data-offer').on('click', function(){
        var hide = $('#_container-data-offer').attr('hidden');

        $('#_container-form-validate-offer').attr('hidden', true);
        $('#_container-form-no-validate-offer').attr('hidden', true);
        $('#_container-data-offer').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        $('#_button-validate-offer').removeClass('btn-success');
        $('#_button-validate-offer').addClass('btn-default');
        $('#_button-no-validate-offer').removeClass('btn-danger');
        $('#_button-no-validate-offer').addClass('btn-default');

    });

    $('#_button-validate-offer').on('click', function(){
        var hide = $('#_container-form-validate-offer').attr('hidden');

        $('#_container-form-no-validate-offer').attr('hidden', true);
        $('#_container-data-offer').attr('hidden', true);
        $('#_container-form-validate-offer').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-success');
        $('#_button-show-data-offer').removeClass('btn-primary');
        $('#_button-show-data-offer').addClass('btn-default');
        $('#_button-no-validate-offer').removeClass('btn-danger');
        $('#_button-no-validate-offer').addClass('btn-default');
    });

    $('#_button-no-validate-offer').on('click', function(){
        var hide = $('#_container-form-no-validate-offer').attr('hidden');

        $('#_container-form-validate-offer').attr('hidden', true);
        $('#_container-data-offer').attr('hidden', true);
        $('#_container-form-no-validate-offer').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-danger');
        $('#_button-show-data-offer').removeClass('btn-primary');
        $('#_button-show-data-offer').addClass('btn-default');
        $('#_button-validate-offer').removeClass('btn-success');
        $('#_button-validate-offer').addClass('btn-default');
    });
};

$(document).ready(function(){
    adminEnjobit.offer.init();
});