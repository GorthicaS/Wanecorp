    @extends('layouts.layouthf')


    @section('content')
    <link rel="stylesheet" href="../public/css/order.css">
        <section class="order-summary">
            <div class="container">
                <h2>Récapitulatif de commande</h2>

                <div class="order-details">
                    <p><strong>Prénom :</strong> {{ $order->first_name }}</p>
                    <p><strong>Nom :</strong> {{ $order->last_name }}</p>
                    <p><strong>Adresse :</strong> {{ $order->address }}</p>
                    <p><strong>Taille :</strong> {{ $order->size }}</p>
                    <p><strong>Pseudo avant :</strong> {{ $order->pseudo_front }}</p>
                    <p><strong>Pseudo arrière :</strong> {{ $order->pseudo_back }}</p>
                    <p><strong>Prix :</strong> 60€</p>

                </div>

                <div id="paypal-button-container"></div>


            </div>
        </section>
        <script src="https://www.paypal.com/sdk/js?client-id=AbkN78VjJGwj2EWLyS06f2Fqupy532-vJTfZ4WY27v4YrD3vboE797lI2MIRWLTZ5BEe-3xvK1M8arfF"></script>
        <script>
        var totalPrice = 60;

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
