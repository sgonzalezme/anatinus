/**
 * Created by prada on 22/01/15.
 */

if (typeof(adminEnjobit) == "undefined"){
    adminEnjobit = {};
}

if (typeof(adminEnjobit.message) == "undefined"){
    adminEnjobit.message = {

    };
}

adminEnjobit.message.init = function(){

    $('#_button-show-data-message').on('click', function(){
        var hide = $('#_container-data-message').attr('hidden');

        $('#_container-form-validate-message').attr('hidden', true);
        $('#_container-form-no-validate-message').attr('hidden', true);
        $('#_container-data-message').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        $('#_button-validate-message').removeClass('btn-success');
        $('#_button-validate-message').addClass('btn-default');
        $('#_button-no-validate-message').removeClass('btn-danger');
        $('#_button-no-validate-message').addClass('btn-default');

    });

    $('#_button-validate-message').on('click', function(){
        var hide = $('#_container-form-validate-message').attr('hidden');

        $('#_container-form-no-validate-message').attr('hidden', true);
        $('#_container-data-message').attr('hidden', true);
        $('#_container-form-validate-message').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-success');
        $('#_button-show-data-message').removeClass('btn-primary');
        $('#_button-show-data-message').addClass('btn-default');
        $('#_button-no-validate-message').removeClass('btn-danger');
        $('#_button-no-validate-message').addClass('btn-default');
    });

    $('#_button-no-validate-message').on('click', function(){
        var hide = $('#_container-form-no-validate-message').attr('hidden');

        $('#_container-form-validate-message').attr('hidden', true);
        $('#_container-data-message').attr('hidden', true);
        $('#_container-form-no-validate-message').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-danger');
        $('#_button-show-data-message').removeClass('btn-primary');
        $('#_button-show-data-message').addClass('btn-default');
        $('#_button-validate-message').removeClass('btn-success');
        $('#_button-validate-message').addClass('btn-default');
    });
};

$(document).ready(function(){
    adminEnjobit.message.init();
});