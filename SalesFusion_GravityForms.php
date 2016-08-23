<?php
/**
 * Plugin Name: Gravity Forms - Submit to Salesfusion
 * Plugin URI: http://salesfusion.com
 * Description: Allows Gravity forms to submit to salesfusion CRM
 * Author: Tyler Jefford
 * Author URI: http://tylerjefford.com
 * Version: 1.0.0
 */


add_action('gform_after_submission', 'post_to_salesfusion', 5);
function post_to_salesfusion($entry) {
  $customer = '1234567890';
  $post_url = 'http://YOUR-SALESFUSION-DOMAIN-HERE.com/RESTPostForm.aspx';

  switch ($entry['form_id']){

    case "2": // Case Number corresponds to the Gravity Forms ID
      $body = array(
        'Email' => rgar( $entry, 1.1 ),

    		'Customer' => $customer,
    		'cke' => '1',
    		'ownerid' => '2',
    		'overwrite' => '0',
    		'DialogID' => '13',
    		'TriggerID' => '21',
    		'PushExternal' => '1',
    		'rurl' => 'http://www.YOUR-DOMAIN.com/'
      );
    break;

    case "3": // Case Number corresponds to the Gravity Forms ID
      $body = array(
        'FirstName' => rgar( $entry, 3.1 ),
    		'LastName' => rgar( $entry, 3.2 ),
    		'companyname' => rgar( $entry, 3.9 ),
    		'Email' => rgar( $entry, 3.3 ),
    		'telephone3' => rgar( $entry, 3.4 ),
    		'address1_postalcode' => rgar( $entry, 3.5 ),
    		'NumberOfEmployees' => rgar( $entry, 3.6 ),
    		'new_provider' => rgar( $entry, 3.7 ),
    		'Comments__c' => rgar( $entry, 3.8 ),

    		'Customer' => $customer,
    		'cke' => '1',
    		'ownerid' => '2',
    		'overwrite' => '0',
    		'TriggerID' => '18',
    		'DialogID' => '21',
    		'PushExternal' => '1',
    		'rurl' => ''
      );
    break;

    case "4": // Case Number corresponds to the Gravity Forms ID
      $body = array(
        'FirstName' => rgar( $entry, 4.1 ),
    		'LastName' => rgar( $entry, 4.2 ),
    		'companyname' => rgar( $entry, 4.9 ),
    		'Email' => rgar( $entry, 4.3 ),
    		'Title' => rgar( $entry, 4.10 ),
    		'telephone3' => rgar( $entry, 4.4 ),
    		'address1_postalcode' => rgar( $entry, 4.5 ),

    		'Customer' => $customer,
    		'cke' => '1',
    		'ownerid' => '306',
    		'overwrite' => '0',
    		'TriggerID' => '68',
    		'DialogID' => '20',
    		'PushExternal' => '1',
    		'rurl' => ''
      );
    break;

  }
	$request = new WP_Http();
	$response = $request->post($post_url, array('body' => $body));
}

?>
