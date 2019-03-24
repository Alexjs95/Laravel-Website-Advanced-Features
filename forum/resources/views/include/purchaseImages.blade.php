<th>    <h6>Purchase ability to add images to topics £0.99</h6></th>

<form action="{{ action('CheckoutController@charge')  }}" method="GET">
        <input name="purchaseType" type="hidden" value="images">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_PUB_KEY') }}"
            data-amount="99"
            data-name="Subscribe"
            data-description="Add images to topics"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="gbp">
        </script>
    </form>




