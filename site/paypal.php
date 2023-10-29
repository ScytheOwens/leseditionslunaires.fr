<script src="https://www.paypal.com/sdk/js?client-id=AWnx70dF8dyO8Rf_jGnh8Ik46LEzOoTYJqop-KtGwzUJicVgEYCgaOX6wk640STSyqfETMJMze_O44wu&currency=EUR"></script>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $_SESSION['total'];?>' 
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];

                sessionStorage.setItem('validation', "TRUE");
	            if(typeof(sessionStorage.getItem('validation'))!='undefined'){
		            <?php $_SESSION['validation'] = "<script>document.write(sessionStorage.getItem('validation'));</script>";?>
	            }

	            sessionStorage.removeItem('validation');
                actions.redirect('http://localhost/site/validation.php');
          });
        }
      }).render('#paypal-button-container');

    </script>