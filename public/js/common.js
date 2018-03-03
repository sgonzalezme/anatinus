/**
 * Created by prada on 22/01/15.
 */

if (typeof(adminEnjobit) == "undefined"){
    adminEnjobit = {};
}

adminEnjobit.init = function(){

    $('#dataTablesListDocuments').DataTable({
        responsive: true
    });
    $.notify.addStyle('happyblue', {
        html: "<div><span data-notify-text/></div>"
    });

    $('.dropdown-toggle').on('click', function(){
        var html = '<li>';
            html += '<a href="#">';
                html += '<div>';
                    html += '<strong>John Smith</strong>';
                        html += '<span class="pull-right text-muted">';
                            html += '<em>Yesterday</em>';
                        html += '</span>';
                html += '</div>';
                html += '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>';
            html += '</a>';
        html += '</li>';
        $('.dropdown-messages').append(html);
    });
};

adminEnjobit.getCurrentNotifications = function(){
    var demands = $("#_badge-demands").html();
    var offers = $("#_badge-offers").html();
    var messages = $("#_badge-messages").html();

    var data = {
        "demands"   : demands,
        "offers"    : offers,
        "messages"  : messages
    }

    adminEnjobit.requestNotifications(data);
}

adminEnjobit.requestNotifications = function(dataPost){
    $.ajax({
        type: 'POST',
        context: this,
        url: '/common/request_notifications',
        dataType: 'json',
        data: dataPost,
        success: function(response){
            var notifDemands = response["data"]["demands"];
            $("#_badge-demands").empty();
            $("#_badge-demands").append(notifDemands);

            var notifOffers = response["data"]["offers"];
            $("#_badge-offers").empty();
            $("#_badge-offers").append(notifOffers);

            var notifMessages = response["data"]["messages"];
            $("#_badge-messages").empty();
            $("#_badge-messages").append(notifMessages);

            if(response["data"]["notifSoundDemands"]){
                $.notify('Tienes nuevas validaciones de demandas', {
                    style: 'happyblue',
                    className: 'superblue'
                });
                $.playSound('../public/sound/iphone');
            }

            if(response["data"]["notifSoundOffers"]){
                $.notify('Tienes nuevas validaciones de ofertas', {
                    style: 'happyblue',
                    className: 'superblue'
                });
                $.playSound('../public/sound/iphone');
            }

            if(response["data"]["notifSoundMessages"]){
                $.notify('Tienes nuevas validaciones de mensajes', {
                    style: 'happyblue',
                    className: 'superblue'
                });
                $.playSound('../public/sound/iphone');
            }
        },
        error: function(){

        }
    });

    return false;
}

$(document).ready(function(){
    adminEnjobit.init();
    window.setInterval(function() {
        adminEnjobit.getCurrentNotifications();
    }, 10000);
});