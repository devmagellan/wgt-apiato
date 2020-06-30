<?php

/**
 * @apiGroup           Firm
 * @apiName            createFirm
 *
 * @api                {POST} /v1/firms Endpoint title here..
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
$router->post('firms', [
    'as' => 'api_firm_create_firm',
    'uses'  => 'Controller@createFirm',
    'middleware' => [
      'auth:api',
    ],
]);
