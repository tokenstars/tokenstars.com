window.$ = window.jQuery = require('jquery');
require('glyphicons');
require('eonasdan-bootstrap-datetimepicker');
require('daterangepicker');
window['moment'] = require('moment');

$(function () {
  $('.datetimepicker-bet').datetimepicker({
    locale: 'ru',
  });

  var start = null;
  var end = null;
  let startValue = $('#analytics-daterange [name="start_date"]').val(),
      endValue = $('#analytics-daterange [name="end_date"]').val();
  if (startValue) {
    start = moment(startValue);
  } else {
    start = moment().add(-7, 'days');
  }
  if (endValue) {
    end = moment(endValue);
  } else {
    end = moment().add(-1, 'days');
  }

  function cb(start, end) {
    $('#analytics-daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    $('#analytics-daterange [name="start_date"]').val(start.format('YYYY-MM-DD'));
    $('#analytics-daterange [name="end_date"]').val(end.format('YYYY-MM-DD'));
  }

  $('#analytics-daterange').daterangepicker({
    startDate: start,
    endDate: end,
    maxDate: moment().add(-1, 'day'),
    ranges: {
      'Yesterday': [moment().add(-1, 'days'), moment()],
      'Last 7 Days': [moment().add(-7, 'days'), moment().add(-1, 'days')],
      'Last 30 Days': [moment().add(-30, 'days'), moment().add(-1, 'days')],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().add(-1, 'month').startOf('month'), moment().add(-1, 'month').endOf('month')]
    }
  }, cb);

  cb(start, end);
});
