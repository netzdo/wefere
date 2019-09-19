(function(code){
	code(window.jQuery,window,document);
}(function($,window,document){

    dataBackground();

		new WOW().init();

    function dataBackground(){
		$('*[data-background]').each(function(){
			var element = $(this);
			var bgUrl = element.attr('data-background');
			element.css('background-image','url('+bgUrl+')');
			element.css('background-repeat','no-repeat');
			if(hasAttr(element,'data-background-size')){
				element.css('background-size',element.attr('data-background-size'));
			}
			if(hasAttr(element,'data-background-attachment')){
				element.css('background-attachment',element.attr('data-background-attachment'));
			}
			if(hasAttr(element,'data-background-position')){
				element.css('background-position',element.attr('data-background-position'));
			}
		});
	}

	//Helpers
	function hasAttr(element,attr){
		var hasattr = element.attr(attr);

		if (typeof hasattr !== typeof undefined && hasattr !== false) {
			return true;
		}else{
			return false;
		}
	}
}));
