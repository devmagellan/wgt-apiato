<?php

/**
 * @apiGroup           Firm
 * @apiName            updateFirm
 *
 * @api                {PATCH} /v1/firms/:id Endpoint title here..
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
$router->patch('firms/{id}', [
    'as' => 'api_firm_update_firm',
    'uses'  => 'Controller@updateFirm',
    'middleware' => [
      'auth:api',
    ],
]);
