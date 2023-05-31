<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanecorp site association Bourges</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <meta name="description" content="Wanecorp, association e-sportive et communauté gaming à Bourges. Progressez grâce à nos coachs et managers expérimentés. Découvrez nos streamers et participez à des tournois attractifs. Rejoignez notre serveur Discord pour discuter et jouer avec d'autres passionnés d'e-sport. Sortez de la Gulag et rejoignez la Wanecorp à Bourges !" />
    <link rel="stylesheet" href="{{ asset('public/css/layouthf.css') }}">



</head>
<body>
  <header id="siteHeader">
  <input type="checkbox" id="toggle" >
  <label for="toggle" class="menu-icon">&#9776;</label>
    <nav class="navbar">
      <div class="nav-items">
        <div class="left-links">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/') }}">Accueil</a>
            </li>
            <li class="nav-item {{ Request::is('presentation') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/presentation') }}">Présentation</a>
            </li>
            <li class="nav-item {{ Request::is('equipe') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/equipe') }}">Nos Equipes</a>           
            </li>
            <li class="nav-item {{ Request::is('palmares') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/palmares') }}">Notre Palmares</a>
            </li>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
          <div class="svg-wrapper">
            <svg height="80" width="80" xmlns="http://www.w3.org/2000/svg">
              <rect class="shape" height="80" width="80" />
              <image xlink:href="{{ asset('image/logo.png') }}" href="{{ asset('image/logo.png') }}" width="80" height="80" />
            </svg>
          </div>
        </a>
        <div class="right-links">
            <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/shop') }}">Boutique</a>
            </li>
            <li class="nav-item {{ Request::is('rejoind') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/rejoind') }}">Deviens adhérent</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/contact') }}"><i class="fas fa-envelope"></i> Contact</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard.route') }}"><i class="fas fa-user"></i> Tableau de bord</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @else
            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Connexion</a>
            </li>
            @endauth
        </div>
      </div>
    </nav>
  </header>
  
  
    <main>
      @yield('content')
    </main>
  
    <footer>
  <div class="footer-content">
    <div class="footer-social">
      <a href="https://twitter.com/waneguennec?s=21&t=nEC0Jnun6GON4HhVAf9p5g" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.youtube.com/@waneguenne" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://www.facebook.com/Waneguenne" target="_blank">
        <i class="fab fa-facebook"></i>
      </a>
      <a href="https://discord.gg/GAMWxNuC5T" target="_blank">
        <i class="fab fa-discord"></i>
      </a>
    </div>
    <p>&copy; {{ date('Y') }} Wanecorp. Tous droits réservés.</p>
    <ul class="footer-links">
      <li><a href="{{ url('/mentions-legales') }}">Mentions légales</a></li>
      <li><a href="{{ url('/politique-de-confidentialite') }}">Politique de confidentialité</a></li>
      <li><a href="{{ url('/contact') }}">Contact</a></li>
    </ul>
    <div class="footer-credits">
      Site créé par <a href="https://www.linkedin.com/in/geoffrey-praud/" target="_blank">Gorthicas</a>
    </div>
  </div>
</footer>

    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-..." crossorigin="anonymous"></script>
    <script type="module" src="{{ asset('public/js/app.js') }}"></script>



  
  </body>
  </html>
  