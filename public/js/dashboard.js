function toggleEdit(id){
    document.getElementById(`default-view${id}`).classList.toggle("hide-view");
    document.getElementById(`edit-view${id}`).classList.toggle("hide-view");
}   
    $(document).ready( function(){
				$("#background-fix").css({"background": "url('public/images/naassom-azevedo-Q_Sei-TqSlc-unsplash.jpg') no-repeat fixed center center", "background-size": "100%"});
	});
	
	$(document).ready( function(){
			$("#home-tab").click(function(){
				$("#background-fix").css({"background": "url('public/images/naassom-azevedo-Q_Sei-TqSlc-unsplash.jpg') no-repeat fixed center center", "background-size": "100%"});
			});
	});
	
	$(document).ready( function(){
			$("#profile-tab").click(function(){
				$("#background-fix").css({"background": "url('public/images/1588525417.jpg') no-repeat fixed", "background-size": "100%"});
			});
	});	
	
	$(document).ready( function(){
			$("#gradgift-tab").click(function(){
				$("#background-fix").css({"background": "url('public/images/keith-luke-GUAcpXPyFRc-unsplash.jpg') no-repeat fixed", "background-size": "100%"});
			});
	});	
	
	$(document).ready( function(){
			$("#upgrade-tab").click(function(){
				$("#background-fix").css({"background": "url('public/images/vasily-koloda-8CqDvPuo_kI-unsplash.jpg') no-repeat fixed", "background-size": "100%"});
			});
	});	
	
	$(document).ready( function(){
			$("#bankinfo-tab").click(function(){
				$("#background-fix").css({"background": "url('public/images/ferran-fusalba-rosello-WgUHuGSWPVM-unsplash.jpg') no-repeat fixed", "background-size": "100%"});
			});
	});	