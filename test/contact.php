<?php
//require "../private/autoload.php";
//include "functions/common_functions.php";

include "header.php";
?>
<script>
    /*
    
        $(document).ready(function(){
            $("form").submit(function(event){
                event.preventDefault();
                var contact_name = $("#contact_name").val();
                var contact_email = $("#contact_email").val();
                var contact_subject = $("#contact_subject").val();
                var contact_msg = $("#contact_msg").val();
                var submit = $("#submit").val();
                $(".form-message").load("includes/sent.inc.php", {
                    contact_name: contact_name,
                    contact_email: contact_email,
                    contact_subject: contact_subject,
                    contact_msg: contact_msg,
                    submit: submit
                });
            });
        });
    */
</script>
<main>
    <section id="contact">
        <div class="container-lg">
            <div class="text-center my-3">
                <h2>Get in Touch</h2>
                <p class="lead">Questions to ask? Fill out the form to contact me directly... </p>
            </div>
            <div class="row justify-content-center my-5">
                <div class="col-lg-6">
                    <div>
                        <label for="email" class="form-label">Email address:</label>
                        <div class="mb-4 input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>                                
                            </span>
                            <input type="email" id="email" name="contact_email" class="form-control"
                                placeholder="e.g. example@examples.com">
                        </div>
                        <label for="name" class="form-label">Name:</label>
                        <div class="mb-4 input-group">
                            <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" id="name" name="contact_name" class="form-control" placeholder="e.g. Victoria">
                        </div>
                        <label for="subject" class="form-label">What is your question about?</label>
                        <div class="mb-4 input-group">
                            <span class="input-group-text">
                                <i class="bi bi-chat-right-dots-fill"></i>
                            </span>
                            <select class="form-select" id="subject" name="contact_subject">
                                <option value="pricing" selected>Pricing</option>
                                <option value="technical">Technical assistance</option>
                                <option value="general">General Enquiry</option>
                            </select>
                        </div>

                        <div class="form-floating mb-4 mt-5">
                            <textarea name="contact_msg" id="message" class="form-control" style="height: 140px"></textarea>
                            <label for="message">Your Message...</label>
                        </div>
                        <div class="mb-4 text-center">
                            <button class="btn btn-secondary" onclick="sendMail()">Send Message</button>
                        </div>
                        <div class="text-center">
                        <p class="form-message fw-bold"></p>
                        </div>



    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("tc6ZFCSoFnYFpWieR");
   })();
</script>
<script src="js/email.js"></script>
<?php
require "footer.php";
?>