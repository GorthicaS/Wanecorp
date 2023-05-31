@extends('layouts.layouthf')


@section('content')
<link rel="stylesheet" href="../public/css/rejoind.css">
<section class="adhesion">
    <div class="container adhesion-container">
        <h2>Devenir membre de la Wanecorp</h2>
        <p>En devenant adhérent, vous bénéficierez de plusieurs avantages, tels que la participation à des tournois exclusifs, l'accès à des formations de coaching et bien plus encore !</p>

        @if(auth()->check())
            @if(auth()->user()->membership)
                <h3>Vous êtes déjà adhérent</h3>
                <p>Il vous reste {{ auth()->user()->membership_days_left }} jour(s) d'adhésion.</p>
            @else
                <h3>Deviens adhérent dès maintenant ! </h3>
                <form action="{{ route('user.become-member') }}" method="post">
                    @csrf
                    
                </form>
                <div id="paypal-button-container"></div>
            @endif
        @else
            <p id="alertMessage">Pour pouvoir devenir adhérent, merci de vous <a href="{{ route('login') }}">connecter</a>. Vous allez être redirigé dans <span id="countdown">15</span> secondes.</p>
        @endif
    </div>
</section>

<script>
@unless(auth()->check())
    let countdown = 15;
    let countdownDisplay = document.getElementById('countdown');
    let intervalId = setInterval(function() {
        countdown--;
        countdownDisplay.innerText = countdown;
        if (countdown <= 0) {
            clearInterval(intervalId);
            window.location.href = "{{ route('login') }}";
        }
    }, 1000);
@endunless
</script>

<script src="https://www.paypal.com/sdk/js?client-id=AbkN78VjJGwj2EWLyS06f2Fqupy532-vJTfZ4WY27v4YrD3vboE797lI2MIRWLTZ5BEe-3xvK1M8arfF"></script>
<script>
var totalPrice = 10;

paypal.Buttons({
    createOrder: function(data, actions) {
        // Cette fonction définit l'information de la commande
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: totalPrice // Utiliser la valeur de totalPrice pour le montant de l'achat
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        // Cette fonction est appelée lorsque l'acheteur a approuvé la commande
        return actions.order.capture().then(function(details) {
            // Ici, vous pouvez afficher un message de succès à l'acheteur
            alert('Transaction completed by ' + details.payer.name.given_name);
        });
    }
}).render('#paypal-button-container'); // Ceci indique où le bouton PayPal doit être rendu
</script>

@endsection
