$(document).ready(function() {

    getBeers();

    $('.city-selection').on('click', function() {
        let $this = $(this);

        // console.log($this);

        if($this.hasClass('selected')){

            $this.removeClass('selected');
            getBeers();

        }else{

            $('li.city-selection').removeClass('selected');
            $this.addClass('selected');

            var city_id = $this.data('city-id');
            getBeers(city_id);
            getPubs(city_id);

        }

    });


    $(document).on('input', '.citySearch', function (e){

        let cities = $(".city-selection").filter("[data-city-name]");
        let input = $(this);
        let value = input.val().trim().toLowerCase();

        cities.each(function (){
            let city = $(this);
            let city_name = city.attr("data-city-name");

            if(city.hasClass("selected")) return true;
            !city_name.toLowerCase().includes(value) ? city.addClass('hidden') : city.removeClass('hidden');
        });

    });

    //reset the search
    $('.clearSearch').on('click', function() {
        $('.citySearch').val('');
        $(".city-selection").removeClass('hidden');
    });



});

function getBeers(city = null){

    if(city !== null){

        ajaxCall(JSON.stringify({'city': city}), '/beers');

    }else{

        var pathArray = window.location.pathname.split('/');
        var country = pathArray[pathArray.length - 1];

        ajaxCall(JSON.stringify({'country': country}), '/beers');
    }

}

function getPubs(city = null){
    if(city !== null){
        ajaxCall(JSON.stringify({'city': city}), '/filterPubs');
    }
}




//make a ajax call to the backend to get data
function ajaxCall(data, url){

    var params = {
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        url: url,
        data: data,
        dataType: "json",
    }

    postRequest(params);

}

function postRequest(params){
    $.post(params, function (response){
        responseAction(response);
    });
}

function responseAction(response){
    console.log(response.action);

    switch (response.action){
        case 'beers-action':
            $('.beer-list-view').html(response.data.html);
        break;
        case 'pubs-action':
            $('.pubList').html(response.data.html);
        break;
    }
    // console.log(response.data.params[0].city_name);
    // $('.city_name_show').removeClass('hidden');
    // $('.city_heading').html(response[0].city_name);
}
