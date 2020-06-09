@extends('layout')

@section('breadcrumb')
<section style="background-image:url('/pic/breadcrumbs/bg-2.png');" class="breadcrumbs">
    <div class="container">
      <div class="text-left breadcrumbs-item">
        <h2><span>Contact</span> Us</h2>
      </div>
    </div>
  </section>
@endsection('breadcrumb')

@section('content')

    <!-- content-->
    <div class="content-body">
        <div class="container page-section-contact">
          <div class="row">
            <div class="col-md-4 col-md-offset-right-1 col-md-offset-1">
            <h4 class="title-section"><span class="font-bold">Contact us</span></h4>
            <p>Fill the details bellow and get a call back.</p>
            <div class="widget-contact-form pb-30">
              <!-- contact-form-->
              <form id="contactus" class="form contact-form1 alt clearfix">
                @csrf
                <div class="row">
                  <div class="col-md-12 clearfix">
                    <div class="input-container">
                      <input type="text" name="name" id="name" placeholder="YOUR NAME" class="form-row form-row-first">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-container">
                      <input type="email" name="email" id="email" placeholder="YOUR EMAIL" class="form-row form-row-last">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-container">
                      <input type="text" name="contact_number" id="contact_number" placeholder="CONTACT NUMBER" class="form-row form-row-last">
                    </div>
                  </div>
                </div>
                <div class="input-container">
                  <textarea name="message" cols="40" rows="4" id="message" placeholder="MESSAGE"></textarea>
                </div>
                <div class="input-container">
                  <p id="result" style="display: none"></p>
                </div>
                <center><button type="submit" class="cws-button alt">Send</button></center>
                <center><p id="msgs"></p></center>
              </form>
              <!-- /contact-form-->
            </div>
            </div>
            
            <div class="col-md-4 col-md-offset-right-1 col-md-offset-1">
              <div class="contact-item">
                <h4 class="title-section"><span class="font-bold">Get In Touch</span></h4>
                      <p>Feel free to call us, we are happy to help you!</p>
                  <ul class="icon">
                    <li> <a href="#"><i class="flaticon-suntour-map"></i>Office Address</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-map"></i>Personal address</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-phone"></i>Phone number 1</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-phone"></i>Phone number 2</a></li>
                    <li> <a href="#"><i class="fa fa-whatsapp" aria-hidden="true" style="margin-top:5px;"></i>Whatsapp Number</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-email"></i>Email 1</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-email"></i>Email 2</a></li>
                    <li> <a href="#"><i class="flaticon-suntour-map"></i>Director - Jitesh Khandelwal</a></li>
                  </ul>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- ! content-->

      <script>
        $(document).ready(function(){
          $('#contactus').on("submit", function(e) {
             e.preventDefault();
             var name=document.getElementById('name').value;
             var email=document.getElementById('email').value;
             var contact_number=document.getElementById('contact_number').value;
             var message=document.getElementById('message').value;
             var error=0;
             if(name==''){
              error=1;
             }
             if(email==''){
              error=1;
             }
             if(contact_number==''){
              error=1;
             }
             if(error==1){
              $('#result').css('color','red');
              $('#result').html('Please fill all the information properly!');
                $('#result').slideDown('slow');
                setTimeout(function(){
                  $('#result').slideUp();
                },3000);
             }else{
                // var m_data=new FormData();
                // m_data.append('name',name);
                // m_data.append('email',email);
                // m_data.append('contact_number',contact_number);
                // m_data.append('message',message);

                // m_data.append('image',$('input[name=image]')[0].files[0]);

                  $.ajax({
                      type: "POST",
                      url: '/contact-us',
                      data: $("#contactus").serialize(),
                      // data: m_data,
                      success: function(store) {
                        // alert('Data Save');
                        $('#result').css('color','green');
                        $('#result').html('Thanks for contacting us. Our representative will get back to you shortly!');
                        $('#result').slideDown('slow');
                        setTimeout(function(){
                          $('#result').slideUp();
                          $('#contactus')[0].reset();
                        },3000);
                        
                      },
                      error: function(error) {
                        $('#result').css('color','red');
                        $('#result').html('Something went wrong. Please call our representative!');
                        $('#result').slideDown('slow');
                        setTimeout(function(){
                          $('#result').slideUp();
                        },3000);
                      }
                  });
            }
          });
        });
          
        </script>

@endsection('content')