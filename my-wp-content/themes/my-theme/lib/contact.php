<?php
/*
 * Process a contact us form using custom code together with a page template.
 *
 * The trigger/entry point of process_form() is kicked off only when the template is starting to render.
 * See "page-contact.php" template file for details.
 *
 * NOTE: WordPress has many reserved query parameters names that you can not use. Hence, it's safer to
 * prefix all form field to ensure its uniqueness. Example, use "mt_" in this contact form.
 * See https://codex.wordpress.org/WordPress_Query_Vars
 */

namespace MyTheme\Contact;

function process_form( $form_data ): array {
  $form = [ 'errors' => [], 'data' => $form_data ];
  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if ( validate_form( $form ) === 0 ) {
      // Process form data here.
      $site_name   = get_bloginfo( "name" );
      $admin_email = get_option( 'admin_email' );
      $subject     = "Contact Us Submission from $site_name";
      $message     = $form['data']['mt_message'];
      $from_name   = $form['data']['mt_name'];
      $from_email  = $form['data']['mt_email'];
      $headers     = 'From: "' . $from_name . '" <' . $from_email . '>';
      if ( wp_mail( $admin_email, $subject, $message, $headers ) ) {
        $form['message'] = [ 'text' => "Thank you for using our contact form!", 'type' => 'is-success' ];
        $form['data']    = []; // Clear form fill after process.
      } else {
        $form['message'] = [
          'text' => "Sorry, we are unable to send your message at this time. Please retry later.",
          'type' => 'is-danger'
        ];
      }
    }
  }

  return $form;
}

/** Sanitize and validate form data */
function validate_form( &$form ): int {
  $form_errors = &$form['errors'];
  $form_data   = &$form['data'];

  $form_data['mt_name'] = htmlspecialchars( filter_var( $form_data['mt_name'] ?? '', FILTER_SANITIZE_STRING ) );
  if ( filter_var( $form_data['mt_name'], FILTER_VALIDATE_REGEXP,
      [ 'options' => [ 'regexp' => '/.{1,100}/' ] ] ) === false ) {
    $form_errors['mt_name'] = 'Invalid name';
  }

  $form_data['mt_email'] = htmlspecialchars( filter_var( $form_data['mt_email'] ?? '', FILTER_SANITIZE_EMAIL ) );
  if ( filter_var( $form_data['mt_email'], FILTER_VALIDATE_EMAIL ) === false ) {
    $form_errors['mt_email'] = 'Invalid email';
  }

  $form_data['mt_message'] = htmlspecialchars( filter_var( $form_data['mt_message'] ?? '', FILTER_SANITIZE_STRING ) );
  if ( filter_var( $form_data['mt_message'], FILTER_VALIDATE_REGEXP,
      [ 'options' => [ 'regexp' => '/.{1,500}/' ] ] ) === false ) {
    $form_errors['mt_message'] = 'Invalid message';
  }

  return count( $form_errors );
}
