<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <script src="validate.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
    <title>Smart Academy</title>
</head>
<body>
 
    <div class="container">
        <form action="hodaddteacherfunction.php" method="post" id="form1">
            <h2 class="text-center">ADD A TEACHER</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="Sname">Teachers Name</label>
                <input type="text" class="form-control" name="tname" id="name" placeholder="Enter full name." octavalidate="R,ALPHA_ONLY">
            </div>
           
            <div class="col-sm-6 form-group">
                <label for="address">Address</label>
                <input type="textarea" class="form-control" name="tadd" id="address" placeholder="Enter Address">
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="text" name="tphoneno" class="form-control" id="tel" placeholder="Enter Your Contact Number." minlength="10" maxlength="10" octavalidate="R,EMAIL">
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of joininng</label>
                <input type="Date" name="tdoj" class="form-control" id="Date" placeholder="" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="temail" id="email" placeholder="Enter your email." octavalidate="R,DIGITS">
            </div>
            <div class="col-sm-6 form-group">
                <label for="address">Qualification</label>
                <input type="textarea" class="form-control" name="tqual" id="address" placeholder="Qualification" >
            </div>
            <div class="col-sm-6 form-group">
                <label for="address">Subject 1</label>
                <input type="textarea" class="form-control" name="tqual" id="address" placeholder="Qualification" >
            </div>
            
          
            <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="tpass" class="form-control" id="pass" default='1111'>
            </div>
           
            <div class="col-sm-12">
              <p>Back to Home page <a href="hodteacher.php">Click Here</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="REGISTER">
            </div>
            
        </div>
        </form>
    </div>
    <script>
    //create new instance of the function
    const myForm = new octaValidate('form1');
    //listen for submit event
    document.getElementById('form1').addEventListener('submit', function(e){
        
        //invoke the method
        if(myForm.validate())
        { 
          //validation successful, process form data here
        } else {
          //validation failed
          e.preventDefault();
          return false;
        }
    })
</script>

</body></html>
