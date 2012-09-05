<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 

	<title>CSL-data-exporter style generator</title>

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.8.18/themes/ui-lightness/jquery-ui.css">
	<link rel="stylesheet" href="../cslEditorLib/css/base.css?bust=$GIT_COMMIT" />
	<style>
		body {
			margin: 20px;
		}
		#code {
			background-color: #eeeeee;
			margin: 20px;
			overflow: auto;
			height: 300px;
		}
	</style>
	<script type="text/javascript" src="../cslEditorLib/external/require-jquery.js"></script>
	<script>
		require.config({
			baseUrl: "../cslEditorLib",
			urlArgs : "bust=$GIT_COMMIT"
		});
		requirejs(['src/config'], function (config) {
			require(
					[	'../cslDataExporter/generateCsl',
						'../src/styleUtils'
					],
					function (
						generateCsl,
						styleUtils
					) {
				$(document).ready(function () {
					generateCsl.generate($('#code'));

					$('#saveStyle').click(function () {
						styleUtils.saveCsl($('#code').text(), "cslDataExporter");	
					});
				});
			});
		});
	</script>
</head>
<body>
<h2>CSL style to generate csl-data.json</h2>

<p>This generates a CSL file which outputs csl-data.json</p>

<p>
Useful to export references from ref managers into the editor via:
<pre>Example Citations->Citation ?->Advanced->Add new reference</pre>
</p>

<h3>Warning:</h3>
<p>
If you have quotation marks in your metadata this won't work,
CSL can't escape characters so this seems unfixable, which isn't
surprising since CSL wasn't designed for things like this.
</p>

<button id=saveStyle>Save csl-data.json exporter style</button>
<pre type="syntaxhighlighter" class="brush: html" id=code>
</pre>
</body>
</html>
