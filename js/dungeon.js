$(function(){
	$('header > .header-banner').find('.widget-navigation li.active:first > a').prepend('<i class="fa fa-th-list"></i> ');
	
	$('a.btn-collapse').on('click', function(){
		var $aSelected = $(this).find('i.fa:first');
		
		if ($aSelected.hasClass('fa-angle-down')){
			$aSelected.removeClass('fa-angle-down').addClass('fa-angle-left');
		} else {
			$aSelected.removeClass('fa-angle-left').addClass('fa-angle-down');
		}
	});
});