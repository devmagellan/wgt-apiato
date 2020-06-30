<?php

/**
 * @apiGroup           WGT
 * @apiName            updateWGT
 *
 * @api                {PATCH} /v1/wgts/:id Endpoint title here..
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
$router->patch('wgts/{id}', [
    'as' => 'api_wgt_update_w_g_t',
    'uses'  => 'Controller@updateWGT',
    'middleware' => [
      'auth:api',
    ],
]);
