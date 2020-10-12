<?php

namespace Infrastructure\Enums;

final class HeaderEnums
{
    // Authentication access token as string
    const AUTHORIZATION = 'Authorization';

    // Clients application information as JSON
    const CLIENT_INFO = 'X-Client-Info';

    // Enable GraphQL error handler for request as boolean
    const ENABLE_ERROR_HANDLER = 'X-Enable-Error-Handler';

    /**
     * Token to verifying creation activity log by graph as MD5 string
     *
     * @deprecated 2019.04.07 Since withdrawing laravel1 public web!
     */
    const CREATE_ACTIVITY_TOKEN = 'X-Create-Activity-Token';

    const USER_SESSION = 'X-User-Session';

    const TRUST_AUTH_TOKEN = 'X-Trust-Auth-Token';

    const  CREATION_TAGS = 'X-Creation-Tags';

    const  RESPONSE_CODE = 'X-Response-Code';

    /**
     * Development Headers
     */
    const X_LOG_QUERY = 'X-Log-Query';

    const X_LOG_EXCEPTION = 'X-Log-Exception';

    /**
     * API Headers
     */
    const X_API_TOKEN = 'X-Api-Token';

}
