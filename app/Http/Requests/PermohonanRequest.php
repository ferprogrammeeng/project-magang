<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermohonanRequest extends FormRequest
{
  /**
   * Indicates if the validator should stop on hthe first failure.
   *
   * @var bool
   */
  protected $stopOnFirstFailure = true;


  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'jenis_website' => 'required',
      'nama_desa'     => 'required|string',
      'syarat.*'      => 'required|mimes:pdf|max:2048',
      'kode_pos'      => '',
      // 'kode_pos'      => 'required_if:',
      'nama_pj'       => 'required|string',
      'nip_pj'        => 'required|string|size:16',
      'nama_wakil'    => 'required|string',
      'nip_wakil'     => 'required|string|size:16',
      'jabatan_wakil' => 'required|string',
      'pangkat_wakil' => 'required|string',
      'email'         => 'required|email',
      'no_hp'         => 'required|string|digits_between:10,16',
    ];
  }
}
