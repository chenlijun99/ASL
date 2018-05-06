(function() {
'use strict';
	var jsonContentType = "application/json";
	$.ajaxSetup({
		beforeSend: function(request) {
			if (this.contentType === jsonContentType) {
				if (this.data && this.data.nodeName === "FORM") {
					this.data = $(this.data).serializeJSON();
				}

				this.data = JSON.stringify(this.data);
			}
		},
		processData: false,
		dataType: "json",
		contentType: jsonContentType,
		headers: {
			authToken: localStorage.getItem("authToken")
		}
	});
})();
