var pusher = $(".ui.sidebar~.pusher");
var sidebar = $('.ui.sidebar')
	.sidebar({
		dimPage: false,
		closable: false,
		//onShow: function() {
			//$(function() {
				//pusher.css("width", "-=" + sidebar.width() + "px");
			//});
		//},
		//onHide: function() {
			//$(function() {
				//pusher.css("width", "+=" + sidebar.width() + "px");
			//});
		//}
	});

//$(window).resize(function() {
	//if ($(window).width() > 720) {
		////sidebar.sidebar({
			////dimPage: true,
			////closable: true
		////})
		//sidebar.sidebar("show");
	//} else {
		////sidebar.sidebar({
			////dimPage: true,
			////closable: true
		////})
		//sidebar.sidebar("hide");
	//}
//});

//pusher.css("width", "-=" + sidebar.width() + "px");

$("button#sidebar-trigger")
	.on("click", function() {
		if ($(window).width > 720) {
		} else {
			sidebar.sidebar("toggle");
		}
	});

$('.ui.dropdown')
	.dropdown({
		keepOnScreen: true
	});
