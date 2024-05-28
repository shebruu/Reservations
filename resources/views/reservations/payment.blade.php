@extends('layouts.main')

@section('title', 'Paiement')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Paiement pour {{ $representation->show->title }}</h1>
    <p>Nombre de places : {{ $places }}</p>

    <form method="POST" action="{{ route('representation.book', $representation->id) }}">
        @csrf
        <input type="hidden" name="places" value="{{ $places }}">

        <label for="card-element">Carte de crédit</label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <button type="submit" class="btn btn-primary mt-4">Payer maintenant</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    console.log("Stripe Key: ", '{{ env('
        STRIPE_KEY ') }}'); // Debugging log
    var stripe = Stripe('{{ env('
        STRIPE_KEY ') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.createElement('div');
                errorElement.textContent = result.error.message;
                form.appendChild(errorElement);
            } else {
                // Send the token to your server.
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    });
</script>
@endsection