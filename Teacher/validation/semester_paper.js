function validateForm() {
//    window.alert();
   var x = document.forms["myForm"]["subject"].value;
    var y = document.forms["myForm"]["difficulty"].value;
//    document.write=y;
    
    if (x == "" || y == "" ) {
        if( x == ""){
        document.getElementById("subject_select").innerHTML="Please select a subject!";
        }
        
        if (y == ""){
//       
        document.getElementById("diff").innerHTML="Please select difficulty level!";
       
        }
        
//        window.alert();
        return false;
    }
//    window.alert("g");
    
    
}