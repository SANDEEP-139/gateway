var PageComingSoon = function () {
    return {
      //Coming Soon
      initPageComingSoon: function () {
			var newYear = new Date();
			newYear = new Date(newYear.setDate(31+8));
			$('#defaultCountdown').countdown({until: newYear})
        }
    };
}();
