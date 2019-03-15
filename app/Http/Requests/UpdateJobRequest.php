<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2019-03-13
 * Time: 11:56 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateJobRequest
 * @package App\Http\Requests
 */
class UpdateJobRequest extends FormRequest
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
            self::COMPANY_NAME => 'required|string',
            self::JOB_TITLE => 'required|string',
            self::DESCRIPTION => 'string',
            self::ADDRESS => 'string',
        ];
    }
}
