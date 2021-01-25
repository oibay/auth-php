function validateForm() {
    var name = document.forms["reg"]["name"].value;
    var email = document.forms["reg"]["email"].value;
    var password = document.forms["reg"]["password"].value;
    var emailRegex = /\S+@\S+\.\S+/;
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
    if(emailRegex.test(email) === false){
        alert("Incorrect email")
        return false;
    }
    if(password.length >= 8) {
        
    }else{
        alert("Must be password 8 letter")
        return false;
    }
  }