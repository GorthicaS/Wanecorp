@extends('layouts.layouthf')


@section('content')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<div class="container">
    <div class="contact-header">
        <h1>Vous avez besoin de nous contacter ? Notre équipe vous écoute !</h1>
        <img src="{{ asset('video/contact.gif') }}" alt="Contact GIF" class="contact-gif" loop>
    </div>

    <div class="contact-form">
        <h2>Contactez-nous</h2>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
@endsection