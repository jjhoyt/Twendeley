$(document).ready(function () {
	$('a.grabArticles').click(function() {
		var id = $(this).attr('id');
		$('#button'+id).hide();
		$('#hidden'+id).show();
		var txt = $('input#text'+id).val();
		$('#showArticles'+id).load('mendeley.php', {key1:txt});
		return false;
		});
});