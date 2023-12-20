
$.ajax({

    url: 'Demo.php',
    
    method: 'get',
    
    data: {adminlogincheck:1},
    
    success: result=> {
    
    
    try {
       
    obj=JSON.parse(result);
    
    if( obj.user=="" | obj.pass=='' ){
    
        window.location.href="Adminlogin.html";
    
    }
    
    } catch (error) {
      
      console.log("json parse errors due to admin yet not logined");
    
      window.location.href="Adminlogin.html";
    
    }
    
    }
    
    });

    