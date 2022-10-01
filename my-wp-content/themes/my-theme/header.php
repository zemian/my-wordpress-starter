<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo get_bloginfo( 'name' ); ?></title>

  <?php wp_head(); ?>
</head>

<header class="navbar">
  <div class="navbar-brand">
    <div class="navbar-item">
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>
    </div>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMainMenu"
       :class="{'is-active': isNavbarBurgerActive}" @click="isNavbarBurgerActive = !isNavbarBurgerActive">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbarMainMenu" :class="{'is-active': isNavbarBurgerActive}">
    <div class="navbar-end">
      <?php \MyTheme\MainMenu\render_nav_menu_items(); ?>
    </div>
  </div>
</header>
<script>
  // JS Code to support Navbar menu expansion in mobile mode
  Vue.createApp({
    data: function () {
      return {
        isNavbarBurgerActive: false
      }
    }
  }).mount('header.navbar');
</script>

<body>
