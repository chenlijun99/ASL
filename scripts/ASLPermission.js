(function(global) {
'use strict';
	global.ASLPermission = ASLPermission;

	function ASLPermission($element) {
		if (!$element) {
			throw new Error("ASLPermission requires a jQuery element to be passed");
		}
		this.elements = $element.find("[data-permission]");

		this.actions = {
			"show": [show, hide],
			"hide": [hide, show],
			"enable": [enable, disable],
			"disable": [disable, enable],
			"insert": [insert, remove],
			"remove": [remove, insert]
		};
	}

	ASLPermission.prototype.addAction = function(name, transform, antitransform) {
		if (this.actions[name]) {
			throw new Error("ASLPermission: action already registred");
		}

		this.actions[name] = [transform, antitransform];
	};

	ASLPermission.prototype.show = function(role, exclusive) {
		this.do("show", role, exclusive);
	};
	ASLPermission.prototype.hide = function(role, exclusive) {
		this.do("hide", role, exclusive);
	};
	ASLPermission.prototype.enable = function(role, exclusive) {
		this.do("enable", role, exclusive);
	};
	ASLPermission.prototype.disable = function(role, exclusive) {
		this.do("disable", role, exclusive);
	};
	ASLPermission.prototype.insert = function(role, exclusive) {
		this.do("insert", role, exclusive);
	};
	ASLPermission.prototype.remove = function(role, exclusive) {
		this.do("remove", role, exclusive);
	};

	ASLPermission.prototype.do = function(actionName, role, exclusive) {
		var action = this.actions[actionName];
		if (!action) {
			throw new Error("ASLPermission: action not found");
		}

		applyPermissions.call(this, role, action[0], action[1], exclusive);
	};

	function applyPermissions(role, matchCallback, unmatchCallback, exclusive) {
		var self = this;
		exclusive = exclusive === false ? false : true;

		self.elements.each(function(index, element) {
			element = $(element);

			var actionName = element.attr("data-permission-action");

			if (permissionMatches(element, role)) {
				if (actionName) {
					self.actions[actionName][0](element);
				} else {
					matchCallback(element);
				}
			} else if (exclusive) {
				if (actionName) {
					self.actions[actionName][1](element);
				} else {
					unmatchCallback(element);
				}
			}
		});
	}

	function permissionMatches(element, role) {
		var permission = element.attr("data-permission");
		var index = permission.indexOf(role);
		if (index !== -1 && permission[index - 1] !== "!") {
			return true;
		} else if (permission.indexOf("all") !== -1) {
			return true;
		}

		return false;
	}

	function show(element) {
		element.removeClass("hidden");
	}
	function hide(element) {
		element.addClass("hidden");
	}
	function enable(element) {
		element.prop("disabled", false);
	}
	function disable(element) {
		element.prop("disabled", true);
	}
	function insert(element) {
		var data = element.data();
		if (data.removed) {
			if (ASLHelper.getProperty(data.nextElement.data(), "removed")) {
				insert(data.nextElement);
			}
			data.nextElement.before(element);
			data.removed = false;
			element.data(data);
		}
	}
	function remove(element) {
		var data = element.data();
		if (!data.removed) {
			data = {
				nextElement: element.next(),
				removed: true
			};
			element.detach();
			element.data(data);
		}
	}
})(window);
