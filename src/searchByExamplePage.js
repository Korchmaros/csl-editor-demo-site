define(
		[	'src/SearchByExample',
			'src/styleUtils',
		],
		function (
			CSLEDIT_SearchByExample,
			styleUtils
		) {
	$(document).ready(function () {
		var searchByExample = new CSLEDIT_SearchByExample($('#mainContainer'), {
			editStyle_func : function (styleURL) {
				styleUtils.editStyle(styleURL, "../visualEditor");
			}
		});
	});
});
