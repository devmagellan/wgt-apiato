<?php

/**
 * @apiGroup           WGT
 * @apiName            createWGT
 *
 * @api                {POST} /v1/wgts Endpoint title here..
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
$router->post('wgts', [
    'as' => 'api_wgt_create_w_g_t',
    'uses'  => 'Controller@createWGT',
    'middleware' => [
      'auth:api',
    ],
]);
