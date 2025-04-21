

paypal
    .Buttons({
        
        style: {
            shape: "rect",
            layout: "vertical",
            color: "blue",
            label: "paypal",
        },
        createOrder: function (data, actions) {
            // Set the amount dynamically
            //const amount = $('#total_amount').val(); // Replace with your desired amount
            const productPrice = document.getElementById("product-price").textContent;
            return actions.order.create({
                purchase_units: [
                    {
                        amount: {
                            value: productPrice, // Ensure 2 decimal places
                            currency_code: 'USD', // Change currency as needed
                        },
                    },
                ],
            });
        },
        onApprove: function (data, actions) {
            const donation_page = document.getElementById("donation_page");
            const product_id = document.getElementById("product_id");
            // Handle when the payment is approved
            return actions.order.capture().then(function (details) {
                // Show a success message to the user
                const transaction = details.purchase_units[0].payments.captures[0];
                //alert(transaction.status + ' => ' + transaction.id)
                //How to insert the response into the database using PHP
                var user_id = 5; //can be dynamic incase of user sessions

                fetch(donation_page.textContent, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        transaction_id: transaction.id,
                        user: user_id,
                        transaction_status: transaction.status,
                        cost: transaction.amount.value,
                        currency: transaction.amount.currency_code,
                        product_id: product_id.textContent
                    })
                })
                .then(response => response.text())
                .then(responseText => {
                    alert(responseText.trim());
                    //donation_page.innerText = responseText.trim();
                    if (responseText.trim() === '1') {
                        alert("Payment Successful. Transaction ID is " + transaction.id);
                    } else {
                        alert("Failed to process payment c");
                        console.log(responseText);
                    }
                })
                .catch(error => {
                    document.getElementById('result-message').innerText =
                        "Error processing payment: " + error;
                    console.error('Fetch error:', error);
                });

                //alert('Transaction completed by ' + details.payer.name.given_name + '. Payment successful');
            });
        },
        onError: function(err) {
            console.error('PayPal Buttons error:', err);
            document.getElementById('result-message').innerText =
                "An error occurred during the transaction: " + err;
        }
    }).render('#paypal-button-container');