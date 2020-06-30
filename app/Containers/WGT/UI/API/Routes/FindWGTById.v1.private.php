<?php

/**
 * @apiGroup           WGT
 * @apiName            findWGTById
 *
 * @api                {GET} /v1/wgts/:id Endpoint title here..
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
$router->get('wgts/{id}', [
    'as' => 'api_wgt_find_w_g_t_by_id',
    'uses'  => 'Controller@findWGTById',
    'middleware' => [
      'auth:api',
    ],
]);
