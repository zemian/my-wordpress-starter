<?php
/*
 * A specific page template for "/contact" path.
 */
require_once 'lib/contact.php';
$form = \MyTheme\Contact\process_form($_POST);
$form_errors = $form['errors'] ?? [];
$form_data = $form['data'] ?? [];
?>

<?php get_header(); ?>

<div class="section" style="min-height: 80vh;">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div <?php post_class("contact-us-page"); ?>>
                <h1 class="title">Contact Us</h1>
                <p class="subtitle">We would love to hear from you. Please let us know what you think!</p>
		        <?php if (isset($form['message'])):
			        $message_class = ($form['message']['type'] === 'is-success') ? 'is-success' : 'is-danger';
			        $message = $form['message']['text'];
			        ?>
                    <div class="notification <?php echo $message_class; ?>">
				        <?php echo $message; ?>
                    </div>
		        <?php endif; ?>
                <form method="POST" action="">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" type="text" name="mt_name"
                                   value="<?php echo esc_attr($form_data["mt_name"] ?? ''); ?>">
					        <?php if (isset($form_errors['mt_name'])): ?>
                                <p class="help is-danger"><?php echo $form_errors['mt_name']; ?></p>
					        <?php endif; ?>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" name="mt_email"
                                   value="<?php echo esc_attr($form_data["mt_email"] ?? ''); ?>">
					        <?php if (isset($form_errors['mt_email'])): ?>
                                <p class="help is-danger"><?php echo $form_errors['mt_email']; ?></p>
					        <?php endif; ?>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea" name="mt_message"><?php echo esc_attr($form_data["mt_message"] ?? ''); ?></textarea>
					        <?php if (isset($form_errors['mt_message'])): ?>
                                <p class="help is-danger"><?php echo $form_errors['mt_message']; ?></p>
					        <?php endif; ?>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="button is-primary" type="submit" name="mt_submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

