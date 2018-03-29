wp-content/plugins/revslider/include/operations.class.php
key : 9834r9q8u4mrpzquwrqf

public function checkPurchaseVerification($data){
		global $wp_version;

//		$response = wp_remote_post('http://updates.themepunch.tools/activate.php', array(
//			'user-agent' => 'WordPress/'.$wp_version.'; '.get_bloginfo('url'),
//			'body' => array(
//				'code' => urlencode($data['code']),
//				//'email' => urlencode($data['email']),
//				'version' => urlencode(RevSliderGlobals::SLIDER_REVISION),
//				'product' => urlencode('revslider')
//			)
//		));
//
//		$response_code = wp_remote_retrieve_response_code( $response );
//		$version_info = wp_remote_retrieve_body( $response );
//
//		if ( $response_code != 200 || is_wp_error( $version_info ) ) {
//			return false;
//		}
        $version_info = 'valid';
		
		if($version_info == 'valid'){
			update_option('revslider-valid', 'true');
			update_option('revslider-code', $data['code']);
			//update_option('revslider-email', $data['email']);
			update_option('revslider-temp-active-notice', 'false');
			return true;
		}elseif($version_info == 'exist'){
			return 'exist';
			//RevSliderFunctions::throwError(__('Purchase Code already registered!', 'revslider'));
		}elseif($version_info == 'temp_valid'){ //only temporary active, rechecking needs to be done soon on the themepunch servers (envato API may be down)
			update_option('revslider-valid', 'true');
			update_option('revslider-code', $data['code']);
			//update_option('revslider-email', $data['email']);
			update_option('revslider-temp-active', 'true');
			update_option('revslider-temp-active-notice', 'false');
			return 'temp';
		}else{
			return false;
		}
		/*elseif($version_info == 'bad_email'){
			return 'bad_email';
		}elseif($version_info == 'email_used'){
			return 'email_used';
		}*/

	}
