define(function(){
	'use strict';
	var extension = {
		isValid : function(){
			return false;
		}
	};

	return function(target){
		return target.extend(extension);
	}
});