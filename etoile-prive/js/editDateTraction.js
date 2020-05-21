var date = $('.dateTraction');
console.log(date);

$('.dateEditCancel').on('click', function () {
    var dateForm = new Date($('#date-traction').val());
    day = dateForm.getDate();
    month = dateForm.getMonth() +1;
    year = dateForm.getFullYear();
    var newDate = ([day, month, year].join('/'));
    date.text(newDate);
});
