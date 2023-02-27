<?php

return [
  /*
  |--------------------------------------------------------------------------
  | Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | The following language lines contain the default error messages used by
  | the validator class. Some of these rules have multiple versions such
  | as the size rules. Feel free to tweak each of these messages here.
  |
  */
  'alpha' => ':attribute hanya boleh mengandung karakter!',
  'digits_between' => 'Panjang :attribute valid antara :min dan :max karakter!',
  'email' => ':attribute harus berupa email!',
  'required' => ':attribute wajib diisi!',
  'size' => [
    'string' => ':attribute harus berisi :size karakter!',
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using the
  | convention "attribute.rule" to name the lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | The following language lines are used to swap our attribute placeholder
  | with something more reader friendly such as "E-Mail Address" instead
  | of "email". This simply helps us make our message more expressive.
  |
  */

  'attributes' => [
    'nama_desa'  => 'Nama desa',
    'no_hp'      => 'Nomor HP',
    'nama_pj'    => 'Nama penanggung jawab',
    'nip_pj'     => 'NIP penanggung jawab',
    'nama_wakil' => 'Nama perwakilan',
    'nip_wakil'  => 'NIP perwakilan',
  ],

];
