import './bootstrap';
import 'flowbite';
$(document).ready(function() {
    var number = Math.floor(Math.random() * 100) + 1;

    if(number === 69){
        $('#main-header-img').attr('src', $('#main-header-img').data('src-1'));
    } else {
        $('#main-header-img').attr('src', $('#main-header-img').data('src-2'));
    }

});
