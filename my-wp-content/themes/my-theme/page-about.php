<?php
/*
 * A specific page template for "/home" path.
 */
?>

<?php get_header(); ?>

<div class="section" style="min-height: 80vh;">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="content has-text-centered">
                <h1 class="title">Welcome!</h1>
                <p>We're so glad you're here!</p>
                <p><button class="button is-primary">More About Us</button></p>
            </div>
        </div>
    </div>
</div>

<div class="section has-background-white-ter" style="min-height: 80vh;">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="content has-text-centered">
                <h1 class="title">Technologies Stack</h1>
                <p>We are experts in website development!</p>
            </div>
            <div class="columns is-align-items-center">
                <div class="column">
                    <figure class="image is-square">
                        <img src="https://bulma.io/assets/Bulma%20Logo.svg">
                    </figure>
                    <div class="has-text-centered">
                        <h1 class="is-size-4">BulmaCSS</h1>
                        <p><a href="https://bulma.io/" class="button is-primary">Learn More</a></p>
                    </div>
                </div>
                <div class="column">
                    <figure class="image is-square">
                        <img src="https://raw.githubusercontent.com/vuejs/art/master/logo.svg">
                    </figure>
                    <div class="has-text-centered">
                        <h1 class="is-size-4">VueJS</h1>
                        <p><a href="https://vuejs.org/" class="button is-primary">Learn More</a></p>
                    </div>
                </div>
                <div class="column">
                    <figure class="image is-square">
                        <img src="https://www.php.net/images/logos/new-php-logo.svg">
                    </figure>
                    <div class="has-text-centered">
                        <h1 class="is-size-4">PHP</h1>
                        <p><a href="https://php.net" class="button is-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

