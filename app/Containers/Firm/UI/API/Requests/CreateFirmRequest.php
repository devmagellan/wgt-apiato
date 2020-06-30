<?php

namespace App\Containers\Firm\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateFirmRequest.
 */
class CreateFirmRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Firm\Data\Transporters\CreateFirmTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:128'],
            'description' => ['string'],
            'website' => ['string', 'max:255'],
            'discount' => ['numeric'],
            'type' => ['string', Rule::in(['retailer', 'wholesaler', 'association', 'administration', 'customer', 'roughseller', 'miner', 'manufacturer', 'farm', 'laboratory', 'enhancer'])],
            'supplier' => ['string', 'max:255'],
            'status' => ['string', Rule::in(['active', 'disabled'])],
            'address.address' => ['required', 'string', 'max:255'],
            'address.fax' => ['string', 'max:16'],
            'address.phone' => ['string', 'max:16'],
            'address.postal_code' => ['string', 'max:16'],
            'address.alt_phone' => ['string', 'max:16'],
            'address.city' => ['required', 'string', 'max:64'],
            'address.state' => ['required', 'string', 'max:64'],
            'address.country' => ['required', 'string', 'max:2'],
            'extra.locale' => ['string', 'max:8'],
            'extra.timezone' => ['string', 'max:64'],
            'extra.currency' => ['string', 'max:3'],
            'extra.contact_name' => ['string', 'max:64'],
            'extra.email' => ['string', 'max:255'],
            'extra.logo' => ['numeric'],
            'extra.header_logo' => ['numeric'],
            'extra.mobile_header_logo' => ['numeric'],
            'extra.headline' => ['string', 'max:256'],
            'extra.discount_fee' => ['numeric'],
            'extra.as_discount_fee' => ['numeric'],
            'extra.default_association' => ['numeric'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
