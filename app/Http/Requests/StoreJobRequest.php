<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2019-03-13
 * Time: 11:41 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreJobRequest
 * @package App\Http\Requests
 */
class StoreJobRequest extends FormRequest
{
    const DESCRIPTION = 'description';
    const ADDRESS = 'address';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            self::DESCRIPTION => 'string',
            self::ADDRESS => 'required|string',
        ];
    }
}
