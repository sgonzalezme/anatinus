/**
 * Created by prada on 22/01/15.
 */

if (typeof(adminEnjobit) == "undefined"){
    adminEnjobit = {};
}

if (typeof(adminEnjobit.demand) == "undefined"){
    adminEnjobit.categories = {
    };
}

adminEnjobit.categories.init = function(){
    $('._select-subcategory').prop('disabled', true);
    $('._select-tag').prop('disabled', true);

    $("._select-category").on('change', function(e){
        $('._select-subcategory').prop("disabled", true);
        $('._select-tag').prop("disabled", true);

        var category = $(this).val();
        adminEnjobit.categories.requestSubcategories(category);
    });

    $("._select-subcategory").on('change', function(e){
        $('._select-tag').prop("disabled", true);

        var subcategory = $(this).val();
        adminEnjobit.categories.requestTags(subcategory);
    });

    $("#_button-add-subcategory").on('click', function(e){
        var subcategory = $('._select-subcategory').val();
        if (subcategory != '-1') {
            adminEnjobit.categories.appendClasificationSubcategory();
        }
    });

    $("#_button-add-tag").on('click', function(e){
        var tag = $('._select-tag').val();
        if (tag != '-1') {
            adminEnjobit.categories.appendClasificationTag();
        }
    });

    $("#_form-categories").on('submit', function(e){
        adminEnjobit.categories.prepareClasificationsToSend();
    });

    adminEnjobit.categories.updateDelete();
};

adminEnjobit.categories.requestSubcategories = function(category){
    $.ajax({
        type: 'POST',
        context: this,
        url: '/categories/request_subcategories',
        dataType: 'json',
        data: {"category" : category},
        success: function(response){
            adminEnjobit.categories.fillInputSubcategories(response);
        },
        error: function(){

        }
    });

    return false;
}

adminEnjobit.categories.fillInputSubcategories = function(subcategories){

    $('._select-subcategory').empty();

    var currentOption = $('<option>').attr({
        value: -1
    }).appendTo('._select-subcategory');
    $(currentOption).append('Seleccione subcategoría');

    for(var i in subcategories['data']){
        var currentSubcategory = subcategories['data'][i];
        currentOption = $('<option>').attr({
            value: currentSubcategory['subcategory']
        }).appendTo('._select-subcategory');
        $(currentOption).append(currentSubcategory['subcategory']);
    }
    $('._select-subcategory').prop("disabled", false);

}


adminEnjobit.categories.requestTags = function(subcategory){
    $.ajax({
        type: 'POST',
        context: this,
        url: '/categories/request_tags',
        dataType: 'json',
        data: {"subcategory" : subcategory},
        success: function(response){
            adminEnjobit.categories.fillInputTags(response);
        },
        error: function(){

        }
    });

    return false;
}

adminEnjobit.categories.fillInputTags = function(tags){

    $('._select-tag').empty();

    var currentOption = $('<option>').attr({
        value: -1
    }).appendTo('._select-tag');
    $(currentOption).append('Seleccione tag');

    for(var i in tags['data']){
        var currentTag = tags['data'][i];
        currentOption = $('<option>').attr({
            value: currentTag['tag']
        }).appendTo('._select-tag');
        $(currentOption).append(currentTag['tag']);
    }
    $('._select-tag').prop("disabled", false);

}

adminEnjobit.categories.appendClasificationSubcategory = function(){

    var category = $('._select-category').val();
    var subcategory = $('._select-subcategory').val();

    var html = '';

    html += '<div style="margin-bottom: 15px;">';
        if(category != '-1') {
            html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-default _category-button">'+category+'</button>';
        }
        if(subcategory != '-1') {
            html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-info _subcategory-button">'+subcategory+'</button>';
        }
        html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-danger _delete-clasification">Eliminar</button>';
    html += '</div>';

    $('#_container-clasifications-selected').append(html);
    adminEnjobit.categories.updateDelete();

}

adminEnjobit.categories.appendClasificationTag = function(){

    var category = $('._select-category').val();
    var subcategory = $('._select-subcategory').val();
    var tag = $('._select-tag').val();

    var html = '';

    html += '<div style="margin-bottom: 15px;">';
            if(category != '-1') {
                html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-default _category-button">'+category+'</button>';
            }
            if(subcategory != '-1') {
                html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-info _subcategory-button">'+subcategory+'</button>';
            }
            if(tag != '-1') {
                html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-warning _tag-button">'+tag+'</button>';
            }
            html += '<button type="button" style="margin-bottom: 5px; margin-left: 5px;" class="btn btn-danger _delete-clasification">Eliminar</button>';
    html += '</div>';

    $('#_container-clasifications-selected').append(html);
    adminEnjobit.categories.updateDelete();
}

adminEnjobit.categories.updateDelete = function () {
    $('._delete-clasification').on('click', function() {
        var parent = $(this).parent();
        $(parent).remove();
    });
}

adminEnjobit.categories.prepareClasificationsToSend = function () {
    var objectReturn = new Array();
    $('#_container-clasifications-selected').find("div").each(function(){

        var currentClasification = {};
        var category = $(this).find('._category-button').html();
        var subcategory = $(this).find('._subcategory-button').html();
        var tag = $(this).find('._tag-button').html();

        currentClasification['category'] = category;
        currentClasification['subcategory'] = subcategory;
        currentClasification['tag'] = tag;
        objectReturn.push(currentClasification);
    });

    $('#_data-categories').prop('value', JSON.stringify(objectReturn));
}

$(document).ready(function(){
    adminEnjobit.categories.init();
});