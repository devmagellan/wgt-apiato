<?php

/**
 * @apiGroup           Firm
 * @apiName            getAllFirms
 *
 * @api                {GET} /v1/firms Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('firms', [
    'as' => 'api_firm_get_all_firms',
    'uses'  => 'Controller@getAllFirms',
    'middleware' => [
      'auth:api',
    ],
]);
