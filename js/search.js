$(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchText = $(this).val().toLowerCase();
      $('#userList ').each(function() {
        var userName = $(this).text().toLowerCase();
        if (userName.indexOf(searchText) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    });
});