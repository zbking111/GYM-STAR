<!-- Add Google Maps -->
<div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14900.330800867565!2d105.85838735!3d20.9893218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac117b2c0445%3A0x545444b787618292!2zMTI2IE5nw7UgMjU0IE1pbmggS2hhaSwgTWFpIMSQ4buZbmcsIEhvw6BuZyBNYWksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1511798211908" width="100%" height="400px" style="border:0" allowfullscreen></iframe>
</div>
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Made By <a href="https://www.fb.com/thientv2910" data-toggle="tooltip" title="Visit facebook">Thientran2910</a></p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>