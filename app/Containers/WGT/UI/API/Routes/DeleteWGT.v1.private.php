<?php

/**
 * @apiGroup           WGT
 * @apiName            deleteWGT
 *
 * @api                {DELETE} /v1/wgts/:id Endpoint title here..
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
$router->delete('wgts/{id}', [
    'as' => 'api_wgt_delete_w_g_t',
    'uses'  => 'Controller@deleteWGT',
    'middleware' => [
      'auth:api',
    ],
]);
