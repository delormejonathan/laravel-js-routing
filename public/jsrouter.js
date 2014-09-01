var JSRouter = {
	package : 'LaravelJSRouting : ',
	routesByAction : [],
	routesByName : [],
	base_path : '',

	action : function(name, parameters) {
		if (this.routesByAction instanceof Array || this.routesByName instanceof Array) {
			console.error(this.package + 'No routes detected.');
			return '';
		}

		if (this.routesByAction[name] instanceof Object == false) {
			console.error(this.package + "route '" + name + "' is undefined.");
			return '';
		}

		var selected = this.routesByAction[name];
		var param = null;

		for (var key in selected.parameters) {
			param = selected.parameters[key];

			if (parameters[param]) {
				selected.route = selected.route.replace('{' + param + '}', parameters[param]);
			}
			else {
				selected.route = selected.route.replace('/{' + param + '}', '');
			}
		}

		return selected.route;
	},

	route : function(name, parameters) {
		if (this.routesByName instanceof Array || this.routesByName instanceof Array) {
			console.error(this.package + 'No routes detected.');
			return '';
		}

		if (this.routesByName[name] instanceof Object == false) {
			console.error(this.package + "route '" + name + "' is undefined.");
			return '';
		}

		var selected = this.routesByName[name];
		var param = null;

		for (var key in selected.parameters) {
			param = selected.parameters[key];

			if (parameters[param]) {
				selected.route = selected.route.replace('{' + param + '}', parameters[param]);
			}
			else {
				selected.route = selected.route.replace('/{' + param + '}', '');
			}
		}

		return selected.route;
	}
};