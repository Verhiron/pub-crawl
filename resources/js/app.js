import './bootstrap';
import 'flowbite';

var csrfToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {

    $('#countries').on('change', function() {
        console.log(this.value);
        var country = this.value;
        ajaxCall(JSON.stringify({'country': country}), '/city', csrfToken);
        ajaxCall(JSON.stringify({'country': country}), '/beers', csrfToken);
    });

    $('#cities').on('change', function() {
        var city = this.value;
        ajaxCall(JSON.stringify({'city': city}), '/pubs', csrfToken);
        ajaxCall(JSON.stringify({'city': city}), '/beers', csrfToken);
    });

    $('#pubs').on('change', function() {
        var pub = this.value;
        ajaxCall(JSON.stringify({'pub': pub}), '/beers', csrfToken);
    });

    $('#clear-search').on('click', function() {
        clearSearch(csrfToken);
    });

    getBeers(csrfToken);

});

$(document).on('click', '.filter-back-country', function (){
    clearCitySelect();
    $('#cities').val('0');
    var country = $(this).attr("data-countryId");
    ajaxCall(JSON.stringify({'country': country}), '/beers', csrfToken);
});

$(document).on('click', '.filter-back-city', function (){
    var city = $(this).attr("data-cityId");
    ajaxCall(JSON.stringify({'city': city}), '/beers', csrfToken);
});

$(document).on('click', '.filter-back-pub', function (){
    var pub = $(this).attr("data-pubId");
    ajaxCall(JSON.stringify({'pub': pub}), '/beers', csrfToken);
});

$(document).on('click', '.filter-back-all', function (){
    clearSearch(csrfToken);
});

function clearSearch(csrfToken){
    clearCitySelect();
    $('#countries').val('0');
    $('#cities').val('0');
    getBeers(csrfToken);
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
    ajaxCall('', '/beers', csrfToken);
}


//make a ajax call to the backend to get data
function ajaxCall(data, url, csrfToken){

    var params = {
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        url: url,
        data: data,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
        }
    }

    postRequest(params);

}

function postRequest(params){
    $.post(params, function (response){
        responseAction(response);
    },);
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
