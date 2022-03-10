<template>
  <!--<header>-->
    <!--{% if is_granted("ROLE_USER")%}-->
<!--    <nav id="menu_user">
      <ul>
        <li id="nom_utilisateur">Bonjour {{ app.user.nom }}</li>
        <li><a href="{{ path('reservation_index') }}">Mes réservations</a></li>
        <li><a href="{{ path('app_logout') }}">Déconnexion</a></li>
      </ul>
    </nav>
    -->
<!--    {% else %}-
    <nav id="menu_user">
      <ul>
        <li><a href="#">Se connecter</a></li>
        <li><a href="#">Créer un compte</a></li>
      </ul>
    </nav>

    <h1 id="page_name">Les recettes de Jean-bob</h1>-->

    <nav id="menu_navigation">
      <ul>
        <li class="smenu"><router-link to="/">Accueil</router-link></li>
        <li class="smenu"><router-link to="/recettes">Recettes</router-link></li>
        <!--<li class="smenu"><a href="#">Reservation</a></li>-->
      </ul>
    </nav>
  <!--</header>-->
<!--  {% for message in app.flashes('compteCree') %}-->
<!--  <div class="alert alert-success">-->
<!--    {{ message }}-->
<!--  </div>-->
<!--  {% endfor %}-->
</template>

<script>
export default {
name: "Header"
}
</script>

<style scoped>

</style>