<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'avatar' => ['image', 'max:2048'], // Kiểm tra hình ảnh với dung lượng tối đa là 2MB.
            'status' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
            'birthdate' => ['date', 'before_or_equal:' . now()->subYears(16)->format('Y-m-d')],
        ];
    }
    public function messages(){
        return [
        'name.max' => 'Tên không được vượt quá 255 ký tự.',
        'avatar.image' => 'File tải lên không  phải là hình ảnh.',
        'avatar.max' => 'Dung lượng hình ảnh không được vượt quá 2MB.',
        'status.max' => 'Trạng thái không được vượt quá 255 ký',
        'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        'birthdate.date' => 'Ngày sinh phải là một ngày hợp lệ.',
        'birthdate.before_or_equal' => 'Bạn phải đủ 16 tuổi .',
    ];
}
}


