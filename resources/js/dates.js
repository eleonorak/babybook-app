import flatpickr from "flatpickr";

document.addEventListener('DOMContentLoaded', function(){

    flatpickr(".datetimepicker-element", {
        altInput: true,
        altFormat: "j F Y - H:i",
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true
    });

    flatpickr(".datepicker-element", {
        altInput: true,
        altFormat: "j F Y ",
        dateFormat: "Y-m-d",
        time_24hr: true
    });

});
