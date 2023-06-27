function sendMail(){
    var params = {
        email: document.getElementById("email").value ,
        name: document.getElementById("name").value ,
        subject: document.getElementById("subject").value ,
        message : document.getElementById("message").value ,
    };

    const serviceID = "service_9nfe54i";
const templateID = "template_b2gxpbl";

emailjs.send(serviceID, templateID, params)
.then(
    res =>{
        document.getElementById("email").value = "";
        document.getElementById("name").value = "";
        document.getElementById("subject").value = "";
        document.getElementById("message").value = "";
        console.log(res);
        document.querySelector(".form-message").innerHTML = "Thank you for your message, we will reply as soon as possible";
        //alert("Thank you for your message, we will reply as soon as possible");
    }
)
.catch((err) => {
    document.querySelector(".form-message").innerHTML = "We are sorry! Something went wrong, please try again later.";
    console.log(err)
});


}

