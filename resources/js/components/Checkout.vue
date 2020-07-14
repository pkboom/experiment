<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form id="payment-form">
          <div
            id="card-element"
            class="max-w-md border rounded p-2 border-gray-500"
          >
            <!--Stripe.js injects the Card Element-->
          </div>
          <button id="submit">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">Pay</span>
          </button>
          <p id="card-error" role="alert"></p>
          <p class="result-message hidden">
            Payment succeeded, see the result in your
            <a href="" target="_blank">Stripe dashboard.</a>
            Refresh the page to pay again.
          </p>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    var stripe = Stripe('pk_test_YYkihli9GMwo1bsynWILraRs')

    axios.post('/payment').then(({ data }) => {
      var elements = stripe.elements()
      var style = {
        base: {
          color: '#32325d',
          fontFamily: 'Arial, sans-serif',
          fontSmoothing: 'antialiased',
          fontSize: '16px',
          '::placeholder': {
            color: '#32325d',
          },
        },
        invalid: {
          fontFamily: 'Arial, sans-serif',
          color: '#fa755a',
          iconColor: '#fa755a',
        },
      }
      var card = elements.create('card', { style: style })
      // Stripe injects an iframe into the DOM
      card.mount('#card-element')
      card.on('change', function(event) {
        // Disable the Pay button if there are no card details in the Element
        document.querySelector('button').disabled = event.empty
        document.querySelector('#card-error').textContent = event.error
          ? event.error.message
          : ''
      })
      var form = document.getElementById('payment-form')

      var self = this
      form.addEventListener('submit', function(event) {
        event.preventDefault()
        // Complete payment when the submit button is clicked
        self.payWithCard(stripe, card, data.clientSecret)
      })
    })
  },
  methods: {
    payWithCard(stripe, card, clientSecret) {
      var self = this
      self.loading(true)
      stripe
        .confirmCardPayment(clientSecret, {
          payment_method: {
            card: card,
          },
        })
        .then(function(result) {
          if (result.error) {
            // Show error to your customer
            self.showError(result.error.message)
          } else {
            // The payment succeeded!
            self.orderComplete(result.paymentIntent.id)
          }
        })
    },
    orderComplete(paymentIntentId) {
      var self = this
      this.loading(false)
      document
        .querySelector('.result-message a')
        .setAttribute(
          'href',
          'https://dashboard.stripe.com/test/payments/' + paymentIntentId
        )
      document.querySelector('.result-message').classList.remove('hidden')
      document.querySelector('button').disabled = true
    },
    // Show the customer the error from Stripe if their card fails to charge
    showError(errorMsgText) {
      var self = this
      this.loading(false)
      var errorMsg = document.querySelector('#card-error')
      errorMsg.textContent = errorMsgText
      setTimeout(function() {
        errorMsg.textContent = ''
      }, 4000)
    },
    // Show a spinner on payment submission
    loading(isLoading) {
      if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector('button').disabled = true
        document.querySelector('#spinner').classList.remove('hidden')
        document.querySelector('#button-text').classList.add('hidden')
      } else {
        document.querySelector('button').disabled = false
        document.querySelector('#spinner').classList.add('hidden')
        document.querySelector('#button-text').classList.remove('hidden')
      }
    },
  },
}
</script>
