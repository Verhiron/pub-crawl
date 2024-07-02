$(document).ready(function() {

    const beerList = [];

    //select country
    $('#countries-add').on('change', function() {
        slideDownElement('city-add-container');
        var country = this.value;
        ajaxCall(JSON.stringify({'country': country}), '/city');
    });

    //select city
    $('#cities-add').on('change', function() {
        var city = this.value;

        if(city === 'other'){
            //show the other city input because we selected other
            slideDownElement('other-city-input-container');
            //show the other pub input because we selected other - pubs can't exist in none existent city yet
            slideDownElement('other-pub-input-container');

            $('#pub-add')
                .append($('<option>', {
                    value: 'other',
                    text: 'Other'
                }))
                .val('other');

            //hide the selectable pubs as they don't exist here
            slideUpElement('pub-input-container');
        }else{
            //hide the other city input because we selected an existing city
            slideUpElement('other-city-input-container');
            //reset the other input containers
            slideUpElement('other-pub-input-container');
            //show the selectable pubs
            slideDownElement('pub-input-container');

            ajaxCall(JSON.stringify({'city': city}), '/pubs');
        }

    });


    $('#pub-add').on('change', function() {
        var pub = this.value;

        if(pub === 'other'){
            slideDownElement('other-pub-input-container');
        }else{
            slideUpElement('other-pub-input-container');
            clearInput('city-other');
            clearInput('pub-other');
        }
        validateInput(pub);
    });

    $('#pub-other').on('input', function() {
        var pub = this.value;
        validateInput(pub);
    });



    // move onto the pub review section
    $('#to-pub-review-section').on('click', function() {
        slideUpElement('details-section');
        slideDownElement('pub-review-section');
        //update the heading text
        updateHeading("Pub Experience");
    });

    //back to general form section
    $('#back-general-section').on('click', function() {
        slideUpElement('pub-review-section');
        slideDownElement('details-section');
        //update the heading text
        updateHeading("Details");
    });

    //beer add section
    $('.to-beer-add-section').on('click', function() {
        slideUpElement('pub-review-section');
        slideDownElement('beer-add-section');
        //update the heading text
        updateHeading("Add Beer");
        ajaxCall('', '/beerList');
    });

    //back to general form section
    $('#back-pub-review-section').on('click', function() {
        slideUpElement('beer-add-section');
        slideDownElement('pub-review-section');
        //update the heading text
        updateHeading("Pub Experience");
    });



    //atmosphere rating
    $('.pub-atmosphere-rating-input').on('change', function() {
        var selectedValue = $(this).val();
        togglePubAdditionalComments('pub-atmosphere', selectedValue);
        validatePubInput();
    });

    $('.pub-aesthetic-rating-input').on('change', function() {
        var selectedValue = $(this).val();
        togglePubAdditionalComments('pub-aesthetic', selectedValue);
        validatePubInput();
    });

    $('.pub-beer-selection-rating-input').on('change', function() {
        var selectedValue = $(this).val();
        togglePubAdditionalComments('pub-beer-selection', selectedValue);
        validatePubInput();
    });

    $('.pub-furniture-rating-input').on('change', function() {
        var selectedValue = $(this).val();
        togglePubAdditionalComments('pub-furniture', selectedValue);
        validatePubInput();
    });

    $('.pub-toilet-rating-input').on('change', function() {
        var selectedValue = $(this).val();
        togglePubAdditionalComments('pub-toilet', selectedValue);
        validatePubInput();
    });

    $('#beer-add').on('change', function() {
        var beer = this.value;
        if(beer === 'other'){
            slideDownElement('other-beer-input');
        }else{
            slideUpElement('other-beer-input');
            $('#beer-other').val('');
        }
    });

    //adding beer
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

        slideUpElement('other-beer-input');
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

    const formContainer = $('#form-container');
    var currentBeerReviewForm = 1;
    var totalBeerReviewForm = 0;
    var beerListIndex = currentBeerReviewForm;

    // Initial toggle based on default selection for each form
    $('.beer-form').each(function() {
        toggleCorrectGlassSection($(this));
    });

    function toggleCorrectGlassSection(form) {
        const selectedValue = form.find('input[name="serving-type"]:checked').val();
        const correctGlassSection = form.find('.correct-glass-section');
        const correctGlassInputs = form.find('input[name="beer-review-correct-glass"]');
        if (selectedValue === 'draft') {
            correctGlassSection.slideDown();
        } else {
            correctGlassSection.slideUp();
            correctGlassInputs.prop('checked', false);
        }
    }

    //gets the index for the selected radio buttons on beer review form
    $(document).on('change', 'input[name="serving-type"]', function() {
        const form = $(this).closest('.beer-form');
        toggleCorrectGlassSection(form);
    });


    $('#generate-beer-forms').on('click', function() {
        if (beerList.length === 0) {
            formContainer.html('No beers available.');
            return;
        }

        //count the total amount of beers generated and update the variable
        totalBeerReviewForm = beerList.length;

        //hide the beer add table
        slideUpElement('beer-add-section');
        slideDownElement('beer-review-section');

        ajaxCall(JSON.stringify({'beerList': beerList}), '/getBeerReviewForms');
    });

    function updateBeerListIndex(currentBeerReviewForm){
        beerListIndex = currentBeerReviewForm - 1;
    }

    //beer review form
    $(document).on('click', '.next-beer-review-form', function(e) {
        e.preventDefault();

        const buttonText = $(this).text().trim();
        console.log(buttonText);

        const formData = $(`#beer-review-form-${currentBeerReviewForm}`).serializeArray();
        const beerData = {};

        // TODO: this is the individual beer review data
        formData.forEach(function(input) {
            beerData[input.name] = input.value;
        });

        updateBeerListIndex(currentBeerReviewForm)
        console.log(beerListIndex);
        beerList[beerListIndex].beer_data = beerData;

        if(buttonText === "Submit"){
            ajaxCall(JSON.stringify({'data': getSubmitParams()}), '/submitReview');
            // ajaxCall(JSON.stringify({'data': getSubmitParams()}), '/testBeer');
        }else{
            $('#beer-review-form-' + currentBeerReviewForm).hide();
            currentBeerReviewForm++;
            $('#beer-review-form-' + currentBeerReviewForm).show();
        }

        if (currentBeerReviewForm === totalBeerReviewForm) {
            $('.next-beer-review-form').html('Submit')
        }

    });

    $(document).on('click', '.previous-beer-review-form', function(e) {
        if(currentBeerReviewForm === 1){
            backToAddBeerSection();
        }else{
            $('#beer-review-form-' + currentBeerReviewForm).hide();
            currentBeerReviewForm--;
            $('#beer-review-form-' + currentBeerReviewForm).show();
        }

        if (currentBeerReviewForm !== totalBeerReviewForm) {
            $('.next-beer-review-form').html('Next')
        }

    });

    function backToAddBeerSection(){
        slideUpElement('beer-forms');
        slideDownElement('beer-add-section');
    }


    function getSubmitParams(){
        var jsonData = {
            general_details: {},
            pub_details: {},
            beer_details: beerList,
        };

        $.each($('#details-form').serializeArray(), function(index, field) {
            if (field.name.startsWith('detail-')) {
                jsonData.general_details[field.name.replace('detail-', '')] = field.value;
            }
        });

        $.each($('#pub-review-form').serializeArray(), function(index, field) {
            if (field.name.startsWith('pub-')) {
                jsonData.pub_details[field.name.replace('pub-', '')] = field.value;
            }
        });

        return jsonData;
    }



    //show params has global usage - depending on the page it will get the form data
    $('#show-params').click(function() {
        var jsonData = {
            general_details: {},
            pub_details: {},
            beer_details: beerList,
        };

        $.each($('#details-form').serializeArray(), function(index, field) {
            if (field.name.startsWith('detail-')) {
                jsonData.general_details[field.name.replace('detail-', '')] = field.value;
            }
        });

        $.each($('#pub-review-form').serializeArray(), function(index, field) {
            if (field.name.startsWith('pub-')) {
                jsonData.pub_details[field.name.replace('pub-', '')] = field.value;
            }
        });

        var jsonString = JSON.stringify(jsonData, null, 2);
        $('#params-view').html(jsonString);
    });

});



//makes sure that the user rates the entire thing as they can't progress without it
function validatePubInput(){
    var isAtmosphereSet = $('input[name="pub-atmosphere-rating"]:checked').length > 0;
    var isAestheticSet = $('input[name="pub-aesthetic-rating"]:checked').length > 0;
    var isBeerSelectionSet = $('input[name="pub-beer-selection-rating"]:checked').length > 0;
    var isFurnitureSet = $('input[name="pub-furniture-rating"]:checked').length > 0;
    var isToiletSet = $('input[name="pub-toilet-rating"]:checked').length > 0;

    if (isAtmosphereSet && isAestheticSet && isBeerSelectionSet && isFurnitureSet && isToiletSet) {
        //show the beer review button
        //TODO: might need to change from ID to class if wanting progress buttons at the top and bottom
        slideDownClass('to-beer-add-section');
    }
}


function togglePubAdditionalComments(sectionId, rating){
    var commentsSection = $('#' + sectionId + '-comments');

    if (rating >= 0) {
        commentsSection.slideDown(300);
    }

}

function validateInput(pubValue) {

    var isValid = false;

    if (pubValue && pubValue !== '0') {
        if (pubValue === 'other') {

            var otherPubValue = $('#pub-other').val();
            if (otherPubValue.length > 0) {
                isValid = true;
            }

        } else {
            isValid = true;
        }
    }

    if (isValid) {
        $('#to-pub-review-section').show();
    } else {
        $('#to-pub-review-section').hide();
    }
}

function updateHeading(headingValue){
    if(headingValue.length > 0){
        $('#add-review-header').html('Add Review - ' + headingValue);
    }
}

//show hidden elements
function slideDownElement(elementId) {
    $(`#${elementId}`).slideDown(500);
}

//show hidden class
function slideDownClass(classId) {
    $(`.${classId}`).slideDown(500);
}

//hide elements
function slideUpElement(elementId) {
    $(`#${elementId}`).slideUp(500);
}

//dynamic clear select box
function clearSelect(elementId, defaultText) {
    var selectBox = $(`#${elementId}`);
    selectBox.empty().append(`<option selected value="0" disabled="disabled">${defaultText}</option>`);
}

//dynamic function to clear input fields
function clearInput(elementId) {
    $(`#${elementId}`).val('');
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

    switch (response.action){
        case 'city-action':

            clearSelect('cities-add', 'Choose a City');

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

            clearSelect('pub-add', 'Choose a Pub');

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
            clearSelect('beer-add', 'Choose a Beer');

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
        case 'beer-reviews-action':
            console.log(response.data);
            $('#form-container').html(response.data.html);
        break;
        case 'submitted-review-action':
            console.log(response.data);
        break;
    }


}


