<?php

/**
 * @apiGroup           Firm
 * @apiName            deleteFirm
 *
 * @api                {DELETE} /v1/firms/:id Endpoint title here..
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
$router->delete('firms/{id}', [
    'as' => 'api_firm_delete_firm',
    'uses'  => 'Controller@deleteFirm',
    'middleware' => [
      'auth:api',
    ],
]);
