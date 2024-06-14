$(document).ready(function() {

    const beerList = [];

    $('#countries-add').on('change', function() {
        clearOthers();
        var country = this.value;
        ajaxCall(JSON.stringify({'country': country}), '/city');
    });

    $('#cities-add').on('change', function() {
        var city = this.value;
        if(city === 'other'){
            $('#other-city-input').slideDown(500);
            $('#other-pub-input').slideDown(500);
            $('#other-beer-input').slideDown(500);
            $('#pub-input').slideUp(500);
            $('#beer-table tbody').empty();
        }else {
            ajaxCall(JSON.stringify({'city': city}), '/pubs');
            clearOthers();
            $('#pub-input').slideDown(500);
        }
    });

    $('#pub-add').on('change', function() {
        var pub = this.value;
        if(pub === 'other'){
            $('#other-pub-input').slideDown(500);
            $('#beer-add-container').slideDown(500);
            clearBeerSelect();
        }else{
            $('#beer-add-container').slideDown(500);
            clearOthers(1);
        }

        ajaxCall('', '/beerList');

    });

    $('#beer-add').on('change', function() {
        var beer = this.value;
        if(beer === 'other'){
            $('#other-beer-input').slideDown(500);
        }else{
            $('#other-beer-input').slideUp(500);
            $('#beer-other').val('');
        }
    });

    $('#back-1').on('click', function() {
        $('#pub-review-section').slideUp(500);
        $('#details-section').slideDown(500);
        $('#add-review-header').html('Add Review - Details');
    });


    $('#add-beer-btn').on('click', function() {
        let beerAdd = $('#beer-add');
        let beerValue = beerAdd.val();
        let beerName = beerAdd.find('option:selected').text();
        let beerOther = $('#beer-other');
        //TODO: do error checks - currently can add nothing
        if (beerValue === 'other') {
            beerName = beerOther.val();
        }

        var beerData = {
            'beer_id': beerValue,
            'beer_name': beerName
        };

        beerList.push(beerData);
        updateBeerTable();

        $('#other-beer-input').slideUp(500);
        beerOther.val('');
        beerAdd.prop('selectedIndex', 0);
    });


    function updateBeerTable() {
        // Clear existing table rows
        $('#beer-table tbody').empty();

        if(beerList.length > 0){
            $('#generate-beer-forms').show();
        }else{
            $('#generate-beer-forms').hide();
        }

        // Iterate over the beerList array and add rows to the table
        $.each(beerList, function(index, beerData) {
            var newRow = $('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">');
            newRow.append($('<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">').text(beerData.beer_name));
            newRow.append($('<td class="px-6 py-4">').html('<a href="#" class="remove-beer font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>'));

            newRow.find('.remove-beer').on('click', function(e) {
                e.preventDefault();
                beerList.splice(index, 1);
                updateBeerTable();
            });

            $('#beer-table tbody').append(newRow);
        });
    }

    let currentFormIndex = 0;
    let currentBeerName = '';
    function createForm(item, index) {
        return `
            <form class="dynamic-form" id="form-${index}" style="display: none;">
                <label for="beer-${index}">${item.beer_name}</label>
                <input type="text" id="beer-${index}" name="beer-${index}">
                <button type="submit">Submit</button>
            </form>
        `;
    }

    const formContainer = $('#form-container');


    function updateForms() {
        formContainer.empty();
        beerList.forEach((item, index) => {
            const formHtml = createForm(item, index);
            formContainer.append(formHtml);
        });

        if (beerList.length > 0) {
            currentBeerName = beerList[currentFormIndex].beer_name; // Set the initial beer name
            $(`#form-${currentFormIndex}`).show();
            $('#back-beer').slideDown(500);
            $('#next-beer').slideDown(500);
            $('#add-review-header').html('Beer Review - ' + currentBeerName);
        }
    }

    $('#generate-beer-forms').on('click', function() {
        if (beerList.length === 0) {
            formContainer.html('No beers available.');
            return;
        }
        formContainer.show();
        $('#beer-navigation').slideDown(500);
        // $('.dynamic-form').hide();
        $('#generate-beer-forms').hide();
        $('#details-section').slideUp(500);
        $('#pub-review-section').slideUp(500);

        // Reset form index and generate forms
        currentFormIndex = 0;
        updateForms();
    });


    // Event listener for the Next button
    $('#next-beer').on('click', function() {

        if (beerList.length === 0) return;

        const formData = $(`#form-${currentFormIndex}`).serializeArray(); // Get form data
        const beerData = {};

        // TODO: this is the individual beer review data
        formData.forEach(function(input) {
            beerData[input.name] = input.value;
        });

        // Update beer data in the list
        beerList[currentFormIndex].beer_data = beerData;

        if(currentFormIndex === beerList.length -1 ){
            $(`#form-${currentFormIndex}`).hide();
            $('#details-section').slideUp(500);
            $('#pub-review-section').slideDown(500);
            $('#add-review-header').html('Pub Review');
            $('#next-beer').hide();
        }else{
            $(`#form-${currentFormIndex}`).hide();
            currentFormIndex = (currentFormIndex + 1) % beerList.length;
            currentBeerName = beerList[currentFormIndex].beer_name;
            $(`#form-${currentFormIndex}`).show();

            $('#add-review-header').html('Beer Review - ' + currentBeerName);
        }

    });


    $('#back-beer').on('click', function() {


        $(`#form-${currentFormIndex}`).hide();

        //TODO: fix this


        if(currentFormIndex === 0) {
            currentFormIndex = 0;
            currentBeerName = '';
            $('#add-review-header').html('Add Review - Details');
            $('#beer-navigation').slideUp(500);
            $('#generate-beer-forms').show();
            $('#details-section').slideDown(500);
        }else{
            if(currentFormIndex === beerList.length -1 ){
                $('#pub-review-section').slideUp(500);
                $('#next-beer').show();
                currentBeerName = beerList[currentFormIndex].beer_name;
                $('#add-review-header').html('Beer Review - ' + currentBeerName);
                $(`#form-${currentFormIndex}`).show();
                currentFormIndex = (currentFormIndex - 1) % beerList.length;
            }else{
                currentFormIndex = (currentFormIndex - 1) % beerList.length;
                currentBeerName = beerList[currentFormIndex].beer_name;
                $('#add-review-header').html('Beer Review - ' + currentBeerName);
                $(`#form-${currentFormIndex}`).show();
            }

        }

    });

    //show params has global usage - depending on the page it will get the form data
    $('#show-params').click(function() {
        // Convert serialized data into JSON object and log it
        var jsonData = {
            details: {},
            beers: beerList
        };

        $.each($('#add-review-form').serializeArray(), function(index, field) {
            if (field.name.startsWith('detail-')) {
                jsonData.details[field.name.replace('detail-', '')] = field.value;
            }
        });

// else if (field.name.startsWith('address_')) {
//         jsonData.address[field.name.replace('address_', '')] = field.value;
//     }

        var jsonString = JSON.stringify(jsonData, null, 2);
        $('#params-view').html(jsonString);
    });


});

//clearing inputs
function clearCitySelect(){
    var selectBox = $('#cities-add');
    selectBox.empty().append('<option selected value="0" disabled="disabled">Choose a City</option>');
}

function clearPubSelect(){
    var selectBox = $('#pub-add');
    selectBox.empty().append('<option selected value="0" disabled="disabled">Choose a Pub</option>');
}

function clearBeerSelect(){
    var selectBox = $('#beer-add');
    selectBox.empty().append('<option selected value="0" disabled="disabled">Choose a Beer</option>');
}

function clearOthers(type = 0){
    //hides the relevant fields
    switch (type) {
        case 1:
            $('#other-city-input').slideUp(500);
            $('#other-pub-input').slideUp(500);
            $('#city-other').val('');
            $('#pub-other').val('');
            break;
        case 0:
            $('#other-city-input').slideUp(500);
            $('#other-pub-input').slideUp(500);
            $('#pub-input').slideUp(500);
            $('#city-other').val('');
            $('#pub-other').val('');
            $('#beer-other').val('');
            break;
    }

}

//Ajax calls
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
    console.log(response);

    switch (response.action){
        case 'city-action':

            clearCitySelect();
            //show the city select input
            $('#city-add-input').slideDown();

            if(response.data.params.length > 0){
                var cities = response.data.params;
                $.each(cities, function(index, city) {
                    $('#cities-add').append($('<option>', {
                        value: city.city_id,
                        text: city.city_name
                    }));
                });
            }

            $('#cities-add').append($('<option>', {
                value: 'other',
                text: 'Other'
            }));

            break;

        case 'pubs-action':
            clearPubSelect();
            if(response.data.params.length > 0) {
                var pubs = response.data.params;
                $.each(pubs, function (index, pub) {
                    $('#pub-add').append($('<option>', {
                        value: pub.pub_id,
                        text: pub.pub_name
                    }));
                });
            }

            $('#pub-add').append($('<option>', {
                value: 'other',
                text: 'Other'
            }));
            break;

        case 'beers-action':
            clearBeerSelect();
            if(response.data.params.length > 0) {
                var beers = response.data.params;
                $.each(beers, function (index, beer) {
                    $('#beer-add').append($('<option>', {
                        value: beer.beer_id,
                        text: beer.beer_name
                    }));
                });
            }
            $('#beer-add').append($('<option>', {
                value: 'other',
                text: 'Other'
            }));
            break;

    }
}
