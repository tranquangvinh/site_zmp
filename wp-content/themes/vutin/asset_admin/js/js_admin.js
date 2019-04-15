(function($){
	$(document).ready(function(){
        // ADMIN JS

		if ($('table.sortableen').length > 0) {
            $('table.sortableen tbody').sortable({
                placeholder: "sort-highlight"
            });
		}
	});
})(jQuery);