$(document).ready(function() {

});

$(document).on('input', '.countrySearch', function (e){

    let countries = $(".country-selection").filter("[data-country-name]");
    let input = $(this);
    let value = input.val().trim().toLowerCase();

    countries.each(function (){
        let country = $(this);
        let country_name = country.attr("data-country-name");
        if(country.hasClass("selected")) return true;
        !country_name.toLowerCase().includes(value) ? country.addClass('hidden') : country.removeClass('hidden');
    });

});


$('.clearSearch').on('click', function() {
    $('.countrySearch').val('');
    $(".country-selection").removeClass('hidden');
});
