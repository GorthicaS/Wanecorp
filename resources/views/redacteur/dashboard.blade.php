@if ($user->role && $user->role->name === 'redacteur')
    <p>Vous êtes connecté en tant que rédacteur.</p>
    <!-- Ajoutez le contenu spécifique au rédacteur ici -->
@else
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
@endif
