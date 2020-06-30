<?php

/**
 * @apiGroup           Firm
 * @apiName            findFirmById
 *
 * @api                {GET} /v1/firms/:id Endpoint title here..
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
$router->get('firms/{id}', [
    'as' => 'api_firm_find_firm_by_id',
    'uses'  => 'Controller@findFirmById',
    'middleware' => [
      'auth:api',
    ],
]);
