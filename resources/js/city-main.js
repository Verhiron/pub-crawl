$(document).ready(function() {
    let $desktopSearchInput = $('.pub-search-desktop');
    let $desktopApplyButton = $('.apply-button');

    let $mobileSearchInput = $('.pub-search-mobile');

    let $ratingSelectDesktop = $('.pub-overall-rating-select-desktop');
    let $ratingSelectMobile = $('.pub-overall-rating-select-mobile');

    let $citySelectionDesktop = $('.city-selection-desktop');
    let $citySelectionMobile = $('.city-selection-mobile');


    function toggleApplyButton(){
        if($desktopSearchInput.val().length > 0){
            $desktopApplyButton.removeClass('hidden');
        }else{
            $desktopApplyButton.addClass('hidden');
        }
    }

    function updateUrlParams(key, value) {

        let urlParams = new URLSearchParams(window.location.search);

        if ((key === 'rating' && value === 'any') || value === '') {
            urlParams.delete(key);
        } else {
            urlParams.set(key, encodeURIComponent(value));
        }

        if (key !== 'page') {
            urlParams.set('page', '1');
        }

        if (urlParams.get('page') === '1') {
            urlParams.delete('page');
        }

        if(key === 'city' && value === null){
            urlParams.delete('city');
        }

        let newUrl = `${window.location.pathname}?${urlParams.toString()}`;
        window.history.replaceState(null, null, newUrl);
        return true;
    }


    $citySelectionDesktop.on('change', function() {
        let $this = $(this);

        // Get the city_id from the select box
        let cityId = $this.val();
        updateUrlParams('city', cityId);

        window.location.reload();
    });


    $desktopSearchInput.on('input', function() {
        let urlParams = new URLSearchParams(window.location.search);
        let pub = urlParams.get('pub');

        if(pub){
            if(urlParams.get('pub').length > 0){
                $desktopApplyButton.removeClass('hidden');
            }
        }else{
            toggleApplyButton();
        }

    });

    $desktopSearchInput.on('keydown', function(event) {
        if (event.keyCode === 13 && $desktopSearchInput.val().length > 0) {
            event.preventDefault();
            $desktopApplyButton.click();
        }
    });


    //desktop search button
    $desktopApplyButton.on('click', function (){
        let desktopSearchQuery = $desktopSearchInput.val();
        updateUrlParams('pub', desktopSearchQuery);
        window.location.reload();
    });

    $ratingSelectDesktop.on('change', function () {
        let $this = $(this);

        // Uncheck all other checkboxes except the "Any" checkbox
        $ratingSelectDesktop.not($this).prop('checked', false);

        // Check if the "Any" checkbox is selected or not
        if ($('.pub-overall-rating-select-desktop:checked').length === 0) {
            $('#overall-rating-checkbox-any-desktop').prop('checked', true);
        }

        // Determine the value to send with the request
        let checkedValue = $('#overall-rating-checkbox-any-desktop').is(':checked') ? 'any' : $this.val();

        // Function to update URL parameters (make sure to define this function)
        updateUrlParams('rating', checkedValue);

        // Optionally, reload the page or update the content
        window.location.reload();
    });


    $ratingSelectMobile.on('change', function () {
        let $this = $(this);

        $ratingSelectMobile.not($this).prop('checked', false);

        if ($('.pub-overall-rating-select-mobile:checked').length === 0) {
            $('#overall-rating-checkbox-any-mobile').prop('checked', true);
        }

        let checkedValue = $('.overall-rating-checkbox-any-mobile').is(':checked') ? 'any' : $this.val();

        updateUrlParams('rating', checkedValue);
    });

    // $applyButton.on('click', function (){
    //     let searchQuery = $searchInput.val();
    //     updateUrlParams('pub', searchQuery);
    //
    //     window.location.reload();
    // });



    $('.clearSearchDesktop').on('click', function() {
        $desktopSearchInput.val('');

        updateUrlParams('pub', $desktopSearchInput.val());
        window.location.reload();
    });

    $('.clearSearchMobile').on('click', function() {
        $mobileSearchInput.val('');

        updateUrlParams('pub', $mobileSearchInput.val());
    });


    // Set the filters on page load based on URL parameters
    function setFiltersFromUrl() {
        let filterCount = 0;
        let urlParams = new URLSearchParams(window.location.search);
        let rating = urlParams.get('rating');
        let city = urlParams.get('city');
        let pub = urlParams.get('pub');

        // Set the rating filter
        if (rating) {
            if (rating === 'any') {
                $('#overall-rating-checkbox-any-desktop').prop('checked', true);
                $('#overall-rating-checkbox-any-mobile').prop('checked', true);
            } else {
                filterCount++;
                $(`.pub-overall-rating-select-desktop[value="${rating}"]`).prop('checked', true);
                $(`.pub-overall-rating-select-mobile[value="${rating}"]`).prop('checked', true);
            }
        } else {
            $('#overall-rating-checkbox-any-desktop').prop('checked', true);
            $('#overall-rating-checkbox-any-mobile').prop('checked', true);
        }

        // Set the city filter
        if (city) {
            filterCount++;
            $citySelectionDesktop.val(city);
            $citySelectionMobile.val(city);
        }

        // Set the pub search input
        if (pub) {
            filterCount++;
            $desktopSearchInput.val(pub);
            $mobileSearchInput.val(pub);
        }

        // filter-count-mobile

        toggleApplyButton();
        toggleFilterCount(filterCount);
    }


    setFiltersFromUrl();

    function toggleFilterCount(count = 0) {
        const filterCountSpan = $('#filter-count-span');
        const filterIcon = $('#filter-icon');

        if (count > 0) {
            filterCountSpan.text(count).removeClass('hidden');
            filterIcon.addClass('hidden');
        } else {
            filterCountSpan.addClass('hidden');
            filterIcon.removeClass('hidden');
        }
    }

    $('.reset-filters-desktop').on('click', function() {
        // $('.city-selection-desktop').prop('selectedIndex', 0);
        let newUrl = window.location.pathname;
        window.history.replaceState(null, null, newUrl);

        // Reload the page to apply the reset
        window.location.href = newUrl;
    });

    $('.reset-filters-mobile').on('click', function() {
        // $('.city-selection-desktop').prop('selectedIndex', 0);
        $mobileSearchInput.val('');
        $citySelectionMobile.prop('selectedIndex', 0);
        $('.pub-overall-rating-select-mobile').prop('checked', false);

        // Check the "Any" checkbox
        $('#overall-rating-checkbox-any-mobile').prop('checked', true);
        updateUrlParams('city', null);
        updateUrlParams('rating', 'any');
        updateUrlParams('pub', '');
    });

    $('.reset-city-selection-desktop').on('click', function (){
        $citySelectionDesktop.prop('selectedIndex', 0);
        updateUrlParams('city', null);
        window.location.reload();
    });

    $('.reset-city-selection-mobile').on('click', function (){
        $citySelectionMobile.prop('selectedIndex', 0);
        updateUrlParams('city', null);
    });

    $('.mobile-apply-filters').on('click', function (){
        //pub search
        let $mobileSearchQuery = $mobileSearchInput.val();
        updateUrlParams('pub', $mobileSearchQuery);

        //rating selection
        let $selectedRatingValue = $('.pub-overall-rating-select-mobile:checked').val();
        updateUrlParams('rating', $selectedRatingValue);

        //city selection
        let $selectedCityValue = $citySelectionMobile.val();
        updateUrlParams('city', $selectedCityValue);

        window.location.reload();
    });
});





$(document).on('click', '.toggle-btn', function (event){

    event.preventDefault();
    var infoSection = $(this).prev('.info-section');
    var downArrow = $(this).find('.down-arrow');
    var upArrow = $(this).find('.up-arrow');

    infoSection.toggleClass('flex hidden');
    downArrow.toggleClass('hidden');
    upArrow.toggleClass('hidden');

});


//make a ajax call to the backend to get data
function ajaxCall(data, url, type = 'POST'){

    var params = {
        type: type,
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

    // switch (response.action){
    //     case 'pub-view-action':
    //         $('.pub-list-view').html(response.data.html);
    //     break;
    // }
    // console.log(response.data.params[0].city_name);
    // $('.city_name_show').removeClass('hidden');
    // $('.city_heading').html(response[0].city_name);
}
