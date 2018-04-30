var sidebarEl = $("app .ui.sidebar")
	.sidebar({
		dimPage: true,
		closable: true,
		context: $("app .pushable")
	})
	.sidebar('setting', 'transition', 'overlay');

$("#sidebar-trigger")
	.on("click", function() {
		sidebarEl.sidebar("toggle");
	});
