
jQuery(function($) {
    var items = $(".single-file");

    var numItems = items.length;
    var perPage = 1;

    items.slice(perPage).hide();

    $("#pagination").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",

        onPageClick: function(pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide()
            .slice(showFrom, showTo).show();
        }
    });
});
