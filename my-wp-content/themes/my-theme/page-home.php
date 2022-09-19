<?php
/*
 * A specific page template for "/home" path.
 */
?>

<?php get_header(); ?>

<div class="section">
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

<div class="section has-background-white-ter">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="content has-text-centered">
                <h1 class="title">Technologies Stack</h1>
                <p>We are experts in website development!</p>
            </div>
            <div class="columns is-align-items-center">
                <div class="column">
                    <figure class="image is-3x2">
                        <img src="https://bulma.io/images/placeholders/480x320.png">
                    </figure>
                    <div class="has-text-centered">
                        <h1 class="is-size-4">BulmaCSS</h1>
                        <p><a href="https://bulma.io/" class="button is-primary">Learn More</a></p>
                    </div>
                </div>
                <div class="column">
                    <figure class="image is-3x2">
                        <img src="https://bulma.io/images/placeholders/480x320.png">
                    </figure>
                    <div class="has-text-centered">
                        <h1 class="is-size-4">VueJS</h1>
                        <p><a href="https://vuejs.org/" class="button is-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

