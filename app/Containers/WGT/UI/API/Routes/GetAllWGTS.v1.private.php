<?php

/**
 * @apiGroup           WGT
 * @apiName            getAllWGTS
 *
 * @api                {GET} /v1/wgts Endpoint title here..
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
$router->get('wgts', [
    'as' => 'api_wgt_get_all_w_g_t_s',
    'uses'  => 'Controller@getAllWGTS',
    'middleware' => [
      'auth:api',
    ],
]);
