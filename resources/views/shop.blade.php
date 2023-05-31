@extends('layouts.layouthf')


@section('content')
<link rel="stylesheet" href="../public/css/shop.css">
    <section class="shop-section">
        <div class="container">
            <h2 class="shop-title">Boutique Waneguenne Corp</h2>

            <div class="product-display">
            <video autoplay muted loop id="myVideo">
                <source src="{{ asset('video/tshirt.webm') }}" type="video/webm">
                </video>
            <p class="shop-text">
                Présentation de notre T-shirt exclusif Waneguenne Corp, un vêtement haut de gamme qui reflète notre passion pour le gaming. 
                Montrez votre amour pour la Waneguenne Corp et soutenez-nous en commandant ce T-shirt unique et élégant. 
                Il est doux, confortable, durable et a un look incroyable qui vous fera vous démarquer dans la foule. 
                N'attendez plus, commandez le vôtre dès aujourd'hui et rejoignez la famille Waneguenne Corp !
            </p>

            </div>
        <form action="/order" method="post" class="order-form">
            @csrf
            <h2 class="shop-title">Commander votre Jersey</h2>
            <div class="form-group">
                <label for="first_name">Prénom:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">Nom:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Adresse:</label>
                <textarea id="address" name="address" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="size">Taille:</label>
                <select id="size" name="size" class="form-control" required>
                    <option value="">Choisissez une taille...</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pseudo_front">Pseudo avant:</label>
                <input type="text" id="pseudo_front" name="pseudo_front" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pseudo_back">Pseudo arrière:</label>
                <input type="text" id="pseudo_back" name="pseudo_back" class="form-control" required>
            </div>
            <div class="order-submit">
                <input type="hidden" id="totalPrice" name="totalPrice" value="0">
                <span id="price" class="price">0€</span>
                <input type="submit" value="Commander" class="btn btn-primary">
            </div>

        </form>

        </div>



    </section>
    <script>
document.addEventListener('DOMContentLoaded', (event) => {
    const video = document.getElementById('myVideo');
    video.playbackRate = 4.5; 

    video.addEventListener('ended', (event) => {
        video.currentTime = 0;
        video.play();
    });

    const formElements = document.querySelectorAll('.form-group input, .form-group select, .form-group textarea');
    const priceElement = document.getElementById('price');
    let orderCount = 0;

    formElements.forEach(element => {
        element.addEventListener('input', () => {
            if (Array.from(formElements).every(input => input.value.trim() !== '')) {
                orderCount = 1;
                priceElement.textContent = orderCount * 60 + "€";
                document.getElementById('totalPrice').value = orderCount * 60;  
            }
        });
    });
});
    </script>
@endsection

