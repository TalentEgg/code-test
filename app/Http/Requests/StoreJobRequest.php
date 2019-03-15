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
    const COMPANY_NAME = 'company_name';
    const JOB_TITLE = 'job_title';
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
            self::COMPANY_NAME => 'required|max:255|string',
            self::JOB_TITLE => 'required|max:255|string',
            self::DESCRIPTION => 'string|nullable',
            self::ADDRESS => 'string|max:255|nullable',
        ];
    }
}
