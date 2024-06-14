$(document).ready(function() {

    $('#countries').on('change', function() {
        console.log(this.value);
        var country = this.value;
        ajaxCall(JSON.stringify({'country': country}), '/city');
        ajaxCall(JSON.stringify({'country': country}), '/beers');
    });

    $('#cities').on('change', function() {
        var city = this.value;
        ajaxCall(JSON.stringify({'city': city}), '/pubs');
        ajaxCall(JSON.stringify({'city': city}), '/beers');
    });

    $('#pubs').on('change', function() {
        var pub = this.value;
        ajaxCall(JSON.stringify({'pub': pub}), '/beers');
    });

    $('#clear-search').on('click', function() {
        clearSearch();
    });

    $('#countries-add').on('click', function(){
        if(this.value === "other"){
            console.log("its other");
        }
    })

    getBeers();

});

$(document).on('click', '.filter-back-country', function (){
    clearCitySelect();
    $('#cities').val('0');
    var country = $(this).attr("data-countryId");
    ajaxCall(JSON.stringify({'country': country}), '/beers');
});

$(document).on('click', '.filter-back-city', function (){
    var city = $(this).attr("data-cityId");
    ajaxCall(JSON.stringify({'city': city}), '/beers');
});

$(document).on('click', '.filter-back-pub', function (){
    var pub = $(this).attr("data-pubId");
    ajaxCall(JSON.stringify({'pub': pub}), '/beers');
});

$(document).on('click', '.filter-back-all', function (){
    clearSearch();
});

function clearSearch(){
    clearCitySelect();
    $('#countries').val('0');
    $('#cities').val('0');
    getBeers();
}

function clearCitySelect(){
    var selectBox = $('#cities');
    selectBox.empty().append('<option selected value="0" disabled="disabled">Choose a city</option>');
}

function clearPubSelect(){
    var selectBox = $('#pubs');
    selectBox.empty().append('<option selected value="0" disabled="disabled">Choose a pub</option>');
}

function getBeers(csrfToken){
    // ajaxCall(JSON.stringify({'country': 1}), '/beers', csrfToken);
    // ajaxCall(JSON.stringify({'city': 1}), '/beers', csrfToken);
    ajaxCall('', '/beers');
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
        case 'city-action':

            clearCitySelect();

            if(response.data.params.length > 0){
                var cities = response.data.params;
                $.each(cities, function(index, city) {
                    $('#cities').append($('<option>', {
                        value: city.city_id,
                        text: city.city_name
                    }));
                });
            }
            break;
        case 'beers-action':
            $('.beer-list-view').html(response.data.html);
            break;
        case 'pubs-action':
            clearPubSelect();
            if(response.data.params.length > 0) {
                var pubs = response.data.params;
                $.each(pubs, function (index, pub) {
                    $('#pubs').append($('<option>', {
                        value: pub.pub_id,
                        text: pub.pub_name
                    }));
                });
            }
            break;
    }
    // console.log(response.data.params[0].city_name);
    // $('.city_name_show').removeClass('hidden');
    // $('.city_heading').html(response[0].city_name);
}
