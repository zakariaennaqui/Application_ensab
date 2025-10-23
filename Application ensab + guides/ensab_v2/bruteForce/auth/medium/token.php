<?php

// Token functions --
function checkToken($user_token, $session_token) {  # Validate the given (CSRF) token

	if( $user_token !== $session_token || !isset( $session_token ) ) {
		return false;
	}
    return true;
}

function generateSessionToken() {  # Generate a brand new (CSRF) token
	if( isset( $_SESSION[ '_token' ] ) ) {
		destroySessionToken();
	}
	$_SESSION[ '_token' ] = md5( uniqid() );
}

function destroySessionToken() {  # Destroy any session with the name 'session_token'
	unset( $_SESSION[ '_token' ] );
}

function tokenField() {  # Return a field for the (CSRF) token
	return "<input type='hidden' name='_token' value='{$_SESSION[ '_token' ]}' />";
}
// -- END (Token functions)