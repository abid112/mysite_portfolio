(function(jQuery){

	"use strict";

	jQuery(document).ready(function() {

		//	FastClick	
	jQuery('#s').attr('placeholder','search');
	    FastClick.attach(document.body);

		//	Smooth scroll

		try {
	        jQuery.browserSelector();
	          if(jQuery("html").hasClass("chrome" || "opera")) {
	            jQuery.smoothScroll();
	          }
	    } catch(err) {}

	    //	Text rotator

	    jQuery(".occupation").Morphext({
		    animation: "fadeIn",
		    separator: ",",
		    speed: 2500
		});

		// Preloader

      	jQuery(window).load(function() {
      		jQuery(".preloader").fadeOut("slow", function(){
      			jQuery("#resume, #blog, #portfolio, #contact").removeClass("absolute");
      			jQuery(".preloader-left").addClass("slide-left");
      			jQuery(".preloader-right").addClass("slide-right");
      			//	Typerjs function - Edit the sentences below
				jQuery('.hi .detail')
					.typeTo(object_name1.some_string1);
      		});
		});

	    //	Features animation function

	    jQuery("#profile .expand, #profile .expand-profile").on("click", function() {
			jQuery("#profile").toggleClass("full-height").removeClass("profile");
			jQuery("#profile .expand").hide();
		});

		jQuery("#profile .expand-profile").on("click", function() {
			jQuery("#profile").addClass("profile");
			jQuery("#profile .expand").show();
		});

		jQuery("#resume .expand").on("click", function() {
			jQuery("#resume").toggleClass("full").toggleClass("full-height");
			jQuery("#blog, #portfolio, #contact").toggleClass("zero").toggleClass("zero-height");
			jQuery("#profile").toggleClass("profile-off");
			jQuery(this).hide();
		});

		jQuery("#resume .close-icon").on("click", function() {
			jQuery("#resume .expand").show();
			jQuery(this).hide();
		});

		jQuery("#blog .expand").on("click", function() {
			jQuery("#blog").toggleClass("full").toggleClass("full-height");
			jQuery("#resume, #portfolio, #contact").toggleClass("zero").toggleClass("zero-height");
			jQuery("#profile").toggleClass("profile-off");
			jQuery(this).hide();
		});

		jQuery("#blog .close-icon").on("click", function() {
			jQuery("#blog .expand").show();
			jQuery(this).hide();
		});

		jQuery("#portfolio .expand").on("click", function() {
			jQuery("#portfolio").toggleClass("full").toggleClass("full-height");
			jQuery("#resume, #blog, #contact").toggleClass("zero").toggleClass("zero-height");
			jQuery("#profile").toggleClass("profile-off");
			jQuery(this).hide();
		});

		jQuery("#portfolio .close-icon").on("click", function() {
			jQuery("#portfolio .expand").show();
			jQuery(this).hide();
		});

		jQuery("#contact .expand").on("click", function() {
			jQuery("#contact").toggleClass("full").toggleClass("full-height");
			jQuery("#resume, #blog, #portfolio").toggleClass("zero").toggleClass("zero-height");
			jQuery("#profile").toggleClass("profile-off");
			jQuery(this).hide();
		});

		jQuery("#contact .close-icon").on("click", function() {
			jQuery("#contact .expand").show();
			jQuery(this).hide();
		});

		//	Skill bars function

		function skillBars() {
		jQuery('.skill-bar-bg').each(function() {
			 var skillBarBg = jQuery(this);
			 skillBarBg.find('.skill-bar').css('width', skillBarBg.attr('data-percent') + '%' );
			});
		}

		skillBars();

		// owl carousel function

        jQuery("#carousel-container").owlCarousel({
 
          	autoPlay : 3000,
		    slideSpeed : 300,
		    paginationSpeed : 300,
		    singleItem: true
       
        });

		//	Masonry function

		var masCon = jQuery("#portfolio-container");
			
		//	Shuffle function

		masCon.shuffle({
			itemSelector: ".portfolio-item" // the selector for the items in the grid
		});

		jQuery('#filter a').click(function (e) {
			e.preventDefault();

			jQuery('#filter a').removeClass('active');
			jQuery(this).addClass('active');

			var groupName = jQuery(this).attr('data-group');

			masCon.shuffle('shuffle', groupName);
		});

		//	CSS Correct

		var dateHeight = jQuery(".date").outerHeight();
		jQuery(".blog-title").css("min-height", dateHeight);

		// Ajax contact function

		jQuery(":input[placeholder]").each (function () {
		    var input = jQuery(this);
		    input.addClass("placeholder");
		    input.val(input.attr("placeholder"));
		 
		    jQuery(this).focus(function() {
		      	var input = jQuery(this);
		      	if (input.val() == input.attr("placeholder")) {
		        	input.val("");
		        	input.removeClass("placeholder");
		      	}
		    });

		    jQuery(this).blur(function() {
		      	var input = jQuery(this);
		      	if (input.val() == "" || input.val() == input.attr("placeholder")) {
			        input.addClass("placeholder");
			        input.val(input.attr("placeholder"));
		      	}
		    })
		});

		// placeholder snippet for older browsers [end]
		  
		// custom validation methods [start]
		
		jQuery.validator.addMethod(
		    "notplaceholder", 
		    function(value, element){
		        return (jQuery(element).attr("placeholder") != value);
			}, 
			"Please enter a value"
		);

		// custom validation methods [end]
		  
		// jquery validate initialisation

		jQuery("#contact-form").validate({
		    rules: {
			    subject : {
			        required    : true,
			        notplaceholder  : true
		      	},
		      	name : {
			        required   : true,
			        notplaceholder  : true
		      	},
		      	email : {
			        required    : true,
			        email       : true,
			        notplaceholder  : true
		      },
		     	message : {
			        required : true,
			        notplaceholder  : true
		      	}
		    },
		    errorPlacement: function(error, element) {
		      	jQuery(element).addClass("error");
		    },
		    submitHandler: function(form){

		    	jQuery("#send").attr("value", "Sending...");
		    	jQuery("#send").addClass("sending");

		        var hasError = false;   
		        if(!hasError) {
		            var formInput = jQuery(form).serialize();
		              	jQuery.post(jQuery(form).attr("action"),formInput, function(data){
		              		jQuery("#send").attr("value", "Send Message");
		              		jQuery("#send").removeClass("sending");
		                	jQuery(".contact-notification").addClass("success");
		              	}); 
		          	}
		        else {
		            alert("Sent error!");
		        }
		        return false; 
		    }
		});

	});

})(jQuery);