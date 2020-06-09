function startfunc() {
	$(".preloader").fadeOut();
	$("#slide1").show("slide",{direction:'right'},500);
	$("#slide1").delay(3000).hide("slide",{direction:'left'},500);
	var count=2;
	var sc= 3;
	setInterval(function(){

	$("#slide"+count).show("slide",{direction:'right'},500);
	$("#slide"+count).delay(3000).hide("slide",{direction:'left'},500);
	 if(count == sc)
      {
         count = 1;

      }
      else
      {
         count = count + 1;
      }

	},3500);

	
}

function validate(){

	var name= document.getElementById('username');
	var email= document.getElementById('email');
	var emailid=email.value;
	var elength=email.value.length;
	var cno= document.getElementById('cno');
	var mobile=cno.value;
	var message= document.getElementById('message');
var errcode=0;
var errcode1=0;
	var error=0;

	if(name.value==""){
		name.setAttribute("style","border:1px solid red;");
		error=1;
	};

	if(message.value==""){
		message.setAttribute("style","border:1px solid red;");
		error=1;
	};

	if(cno.value==""){
		// cno.setAttribute("style","border:1px solid red;");
		errcode=1;
	};

	if(emailid.indexOf("@")<=1 || emailid.lastIndexOf(".")<=emailid.indexOf("@")+2 || emailid.length<=emailid.lastIndexOf(".")+1){
		// email.setAttribute("style","border:1px solid red;");
		errcode1=1;
	};


	if (errcode==1 && errcode1==1) {
		email.setAttribute("style","border:1px solid red;");
		cno.setAttribute("style","border:1px solid red;");
		errcode=2;
		error=1;
	};

	if(error==1 && errcode==2){
		document.getElementById('msgs').innerHTML='Kindly enter your Email Id or Mobile Number!';
		$('#msgs').fadeIn();
	}else if (error==1) {
		email.removeAttribute("style");
		cno.removeAttribute("style");
		document.getElementById('msgs').innerHTML='Name and message field can not be empty!';
		$('#msgs').fadeIn();
	}else{
		$('#msgs').fadeOut();
		var xhr;  
                 if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
                    xhr = new XMLHttpRequest();  
                } else if (window.ActiveXObject) { // IE 8 and older  
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
                }
               	var name1= document.getElementById('username').value;
				var email1= document.getElementById('email').value;
				var cno1= document.getElementById('cno').value;
				var message1= document.getElementById('message').value;
               var dataString1 = 'name='+ name1 + '&email='+ email1 + '&cno=' + cno1 + '&message='+ message1;
                
                        function display_data() {  
                     if (xhr.readyState == 4) {  
                      if (xhr.status == 200) {  
//alert(xhr.responseText);
                       document.getElementById('msgs').innerHTML= xhr.responseText; 
                       document.getElementById("msgs").setAttribute("style","display:block;"); 
                        
                       document.getElementById('contact-us').reset();
                        setTimeout(function(){document.getElementById("msgs").setAttribute("style","display:none;");}, 3000);
                      } else {  
                       
                      };
                     };  
                  };
                        xhr.open("POST", "mail.php", true);   
                     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
                     xhr.send(dataString1);  
                     xhr.onreadystatechange = display_data;  
                    
};
};

function checkit(obj,length){
	obj.setAttribute("style","border:1px solid #ccc;");
	var chk=isNaN(obj.value);
	if(chk==true){
		obj.value="";
	};
	if (obj.value>length) {
		obj.value=obj.value.substring(0, length);
	};
};

function limitlength(object,maxlength){
object.setAttribute("style","border:1px solid #ccc;");
};