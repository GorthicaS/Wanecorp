@extends('layouts.layouthf')



@section('content')
<link rel="stylesheet" href="../public/css/palmares.css">
<section class="palmares-container">
    <h2 class="section-title">Notre palmarès</h2>
    
    <div class="palmares-event">
        <div class="event-text">
            <h3 class="event-title">ROCKSTAR QUALIFIER #2</h3>
            <p>Pour l'inauguration de leur nouvelle boisson, Rockstar a créé un tournoi francophone. Deux jours de qualifications pour pouvoir affronter les plus grands !</p>
            <p>Trois équipes en lisse pour notre association, une s'est qualifiée. Son classement est 10ème sur 125 équipes présentes. Les autres teams ne déméritent pas et finissent quant à elles 59ème et 102ème.</p>
            <p>Equipe 1 : SadBear_FR, Razbaill, Eden_Lewis</p>
            <p>Classement : 10ème</p>
            <p>Equipe 2 : Waneguenne, Tonymerguez, Unferth</p>
            <p>Classement : 59ème</p>
            <p>Equipe 3 : Nyar-ZZz, Silver43000, Sojotony</p>
            <p>Classement : 102ème</p>
            <p>14 NOV 2021</p>
        </div>
        <div class="event-image">
            <img src="{{ asset('image/RockstarQualifer.webp') }}" alt="ROCKSTAR QUALIFIER #2">
        </div>
    </div>
    
    <div class="palmares-event">
        <div class="event-image">
            <img src="{{ asset('image/warzoneShow.webp') }}" alt="Finale du rockstar warzone show">
        </div>
        <div class="event-text">
            <h3 class="event-title">Finale du rockstar warzone show</h3>
            <p>C'est après deux jours de qualifications que 25 équipes amatrices ont pu accéder à la finale, nous avons eu l'honneur de faire partie de l'une d'elles. Dans les 25 autres équipes, de grands noms étaient présents : ChowH1, EsK, AyzenLR, NobuSpartan, BlingCJay, Phyzikk, Punkill et plein d'autres !</p>
            <p>La soirée s'est déroulée en 5 manches en partie privée sur Verdansk. Après une lutte acharnée durant toute la soirée, nous avons réalisé un top 9 / 10 & 11, avec deux games moins intéressantes.</p>
            <p>Cependant, nous nous plaçons dans la première moitié du tableau car la 24ème place nous est attribuée !</p>
            <p>4 DEC 2021</p>
        </div>
    </div>

    <div class="palmares-event">
        <div class="event-image">
            <img src="{{ asset('image/fezfezfef.webp') }}" alt="GRAND GAMING FESTIVAL">
        </div>
        <div class="event-text">
            <h3 class="event-title">GRAND GAMING FESTIVAL</h3>
            <p>Les jeux vidéos ont le droit aussi à un festival. Dans ce dernier, de nombreuses rencontres ont eu lieu sur différents jeux.</p>
            <p>Lors d'un tirage au sort pour la participation à une partie privée sur Warzone Pacific en compagnie de Skyrroz et Sackzi, nos deux compères SadBear et Power_marc se sont placés 8ème et 9ème sur deux parties. Un beau classement lorsqu'on sait qu'il y avait environ 45 équipes.</p>
            <p>En prime, nos deux joueurs ont tué les deux grands streamers FR.</p>
            <p>12 DEC 2021</p>
        </div>
    </div>

    <div class="palmares-event">
        <div class="event-text">
            <h3 class="event-title">TOURNOI LEGENDS BRAQUEURS</h3>
            <p>Lors d'un tournoi habituel créé et organisé par la team legends braqueurs, notre quatuor de choc (Waneguenne, Anaïs, DoubleH & Axel1_TV) a joué pour la première fois ensemble.</p>
            <p>Premières parties ensemble mais déjà un groupe uni. Une communication et une précision chirurgicale tout au long de la soirée ! Cette performance leur permet de décrocher la victoire haut la main puisque 200 points les séparent des deuxièmes !</p>
            <p>15 DEC 2021</p>
        </div>
        <div class="event-image">
            <img src="{{ asset('image/legendsbraqueurslogonews.webp') }}" alt="TOURNOI LEGENDS BRAQUEURS">
        </div>
    </div>

    <div class="palmares-event">
        <div class="event-image">
            <img src="{{ asset('image/Frenezy.webp') }}" alt="FRENEZY CUP #4">
        </div>
        <div class="event-text">
            <h3 class="event-title">FRENEZY CUP #4</h3>
            <p>Pour la quatrième édition de la Frenezy Cup en format trio parties publiques. Sur 3h00, toutes les parties sont prises en compte. Une soirée exceptionnelle, avec des joueurs et joueuses au rendez-vous.</p>
            <p>Comme à chaque tournoi, nous essayons d'aligner plusieurs rosters. Ici, deux se sont présentés !</p>
            <p>Equipe 1 :SadBear_TV, Panhéra et Power_Marc</p>
            <p>Position : 3ème</p>
            <p>Bonus Top Killeur : SadBear_TV --> 2ème<br>Power_Marc --> 4ème</p>
            <p>Equipe 2 : Sylcotek, Nyar-ZZz et Silver</p>
            <p>Position : 7ème</p>
            <p>22 JAN 2022</p>
        </div>
    </div>
</section>

@endsection
