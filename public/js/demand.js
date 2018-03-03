/**
 * Created by prada on 22/01/15.
 */

if (typeof(adminEnjobit) == "undefined"){
    adminEnjobit = {};
}

if (typeof(adminEnjobit.demand) == "undefined"){
    adminEnjobit.demand = {

    };
}

adminEnjobit.demand.init = function(){
    $('#_button-show-data-demand').on('click', function(){
        var hide = $('#_container-data-demand').attr('hidden');

        $('#_container-form-validate-demand').attr('hidden', true);
        $('#_container-form-no-validate-demand').attr('hidden', true);
        $('#_container-data-demand').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-primary');
        $('#_button-validate-demand').removeClass('btn-success');
        $('#_button-validate-demand').addClass('btn-default');
        $('#_button-no-validate-demand').removeClass('btn-danger');
        $('#_button-no-validate-demand').addClass('btn-default');

    });

    $('#_button-validate-demand').on('click', function(){
        var hide = $('#_container-form-validate-demand').attr('hidden');

        $('#_container-form-no-validate-demand').attr('hidden', true);
        $('#_container-data-demand').attr('hidden', true);
        $('#_container-form-validate-demand').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-success');
        $('#_button-show-data-demand').removeClass('btn-primary');
        $('#_button-show-data-demand').addClass('btn-default');
        $('#_button-no-validate-demand').removeClass('btn-danger');
        $('#_button-no-validate-demand').addClass('btn-default');
    });

    $('#_button-no-validate-demand').on('click', function(){
        var hide = $('#_container-form-no-validate-demand').attr('hidden');

        $('#_container-form-validate-demand').attr('hidden', true);
        $('#_container-data-demand').attr('hidden', true);
        $('#_container-form-no-validate-demand').attr('hidden', !hide);

        $(this).removeClass('btn-default');
        $(this).addClass('btn-danger');
        $('#_button-show-data-demand').removeClass('btn-primary');
        $('#_button-show-data-demand').addClass('btn-default');
        $('#_button-validate-demand').removeClass('btn-success');
        $('#_button-validate-demand').addClass('btn-default');
    });
};

$(document).ready(function(){
    adminEnjobit.demand.init();
});