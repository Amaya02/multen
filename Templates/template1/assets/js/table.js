$(document).ready(function($) {
  $('table').hide();
  $('#mySelector').change(function() {
    $('table').show();
    var selection = $(this).val();
    var dataset = $('#myTable tbody').find('tr');
    // show all rows first
    dataset.show();
    // filter the rows that should be hidden
    dataset.filter(function(index, item) {
      return $(item).find('td:first-child').text().split(',').indexOf(selection) === -1;
    }).hide();

  });
});