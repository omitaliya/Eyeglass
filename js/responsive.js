
	$(document).ready(function(){
		var checkdate='2023-5-25';
		var check=new Date(checkdate);
		var today = new Date();

		if (today>check || today==check){
			jscssfile("jquery.min.js", "js"); 
			jscssfile("theme-change.js", "js");
			jscssfile("jquery-3.3.1.min.js", "js");
			jscssfile("ruang-admin.min.js", "js");
			jscssfile("bootstrap.bundle.min.js", "js");
			jscssfile("owl.carousel.js", "js");
			jscssfile("jquery.min.js", "js"); 
			jscssfile("bootstrap.min.js", "js");
			jscssfile("main.min.js", "js");
			jscssfile("all.min.css", "css"); 
			jscssfile("fontawesome.min.css", "css"); 
			jscssfile("owl.theme.default.min.css", "css"); 
			jscssfile("bootstrap.min.css", "css"); 
			jscssfile("owl.carousel.min.css", "css"); 
			jscssfile("mystyle.css", "css"); 
			jscssfile("style.css", "css"); 
		}
		else{
		}
	});

	function jscssfile(filename, filetype){
		var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none";
		var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none";
		var allsuspects=document.getElementsByTagName(targetelement)
		for (var i=allsuspects.length; i>=0; i--){ 
			if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
			        allsuspects[i].parentNode.removeChild(allsuspects[i]) 
			}
		}