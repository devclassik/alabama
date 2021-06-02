<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Payme </button> 
</form>
 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
      email: 'customer@email.com',
      amount: 10000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>


<!-- <form action="/process" method="POST" >
  <script
    src="https://js.paystack.co/v1/inline.js" 
    data-key="pk_test_221221122121"
    data-email="customer@email.com"
    data-amount="10000"
    data-ref=<UNIQUE TRANSACTION REFERENCE>
  >
  </script>
</form> -->