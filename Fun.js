
///////////////////////////////////////////

// just of match the input from the users

let arr=["laptop","mobile","camera","facewash","shoes","books","cloth"];

////////////////////

$('.form-submit').submit(e=>{

e.preventDefault();

text=$('#srchFld').val();

text=text.toLowerCase();

//alert("Search params   "+searchText);

if(text!=""){

	console.log("searched text :"+text);

	searchText="";
	
	arr.forEach(ele=>{
	
	 google	=text.includes(ele) | text.includes(ele.slice(0,-1)) ;
	
	 console.log("value======"+google);
	
	 if(google==true){
	
		searchText=ele;
		return false;
	
	 }
	
	});

if(searchText==""){

top.location="Empty.html";

}else{ 

	top.location="products.html?val="+searchText+"&"+"query="+searchText;


}
 

}else{

var select = document.getElementById('selectvalue');
var selectv = select.options[select.selectedIndex].value;
console.log(selectv);
//alert("text"+v);
top.location="products.html?val="+selectv+"&"+"query="+selectv;

}

});


///////////////////////////////////////////////

// signup process 

$('#signupbtn').click(event => {

event.preventDefault();

user = $('.user').val();
pass = $('.pass').val();

if( user!="" && pass!="" && pass.length>=4 && user.endsWith("@gmail.com") )
{
$.ajax({
  url: 'Demo.php',
  method: 'get',
  data: { signup: 1, user, pass },
  success: (res) => {
     console.log(res);
	 try {
		data=JSON.parse(res)
		$('.msgline').text(data.message);
		 
		   if(data.code){
			location.reload();
		   }
	
	} catch (error) {
		$('.msgline').text("server problem");
		console.log(res);
       
   }

}

})


}else{  
	$('.msgline').text("Please Enter valid data");
}

}) //end of signup block


// login block

 
$('#loginbtn').click(event=> {

	event.preventDefault(); 

	user = $('.user1').val();
	pass = $('.pass1').val();
	
	if( user!="" && pass!="" && pass.length>=4 && user.endsWith("@gmail.com") )
	{
	$.ajax({
	  url: 'Demo.php',
	  method: 'get',
	  data: { signin: 1, user, pass },
	  success: (res) => { 
		 console.log(res)
		 try {
			data=JSON.parse(res)
			$('.msgline1').text(data.message);
           
			  if(data.message=="signin successful"){
				location.reload();
			  }

		} catch (error) {
			$('.msgline1').text("server problem");
		   
	   }
	
	}
	
	})
	
	
	}else{
		$('.msgline1').text("Please Enter valid data");
	}
	
	})

	

// end of login block
 // end of login block

//////////////////////////

User="";

$.ajax({

url: 'Demo.php',
method: 'get',
data: { total:1 },

success: (res) => {

 console.log(res);

   try {
	var obj = JSON.parse(res);

	console.log( obj);
 
	$('#total').html(obj.cost);
	$('.noitems').html(obj.items);
 
	User=obj.User;

	$('strong').html(User);
	$('strong').css({"color":"rgb(61, 129, 142)","font-size":'20px'});
 
   } catch (error) {
	console.log("json parse error because user yet not logined");
	
   }

 
 }

});


$('#logout').click(event=>{
    
	event.preventDefault();

	$.ajax({
	
	url: 'Demo.php',
	method: 'get',
	data: { logout:1 },
	
	success: res => {
	
		obj=JSON.parse(res);
		confirm(obj.message);
		window.location.href = "index.html";
	 }
	
	})
	
	
	top.location="index.html";    
	
	})
	

