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

    'accepted'             => 'Das :attribute muss akzeptiert werden.',
    'active_url'           => 'Die :attribute ist keine gültige URL.',
    'after'                => 'Der :attribute muss ein Datum nach :date. sein',
    'after_or_equal'       => 'Der :attribute muss ein Datum nach oder gleich sein :date. sein',
    'alpha'                => 'Das :attribute darf nur Buchstaben enthalten.',
    'alpha_dash'           => 'Das :attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
    'alpha_num'            => 'Das :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array'                => 'Das :attribute muss ein Array sein.',
    'before'               => 'Der :attribute muss ein Datum vor :date. sein',
    'before_or_equal'      => 'Der :attribute muss ein Datum vor oder gleich dem :date. sein',
    'between'              => [
        'numeric' => 'Der :attribute muss zwischen :min und :max. sein',
        'file'    => 'Die :attribute muss zwischen :min und :max Kilobytes enthalten.',
        'string'  => 'Der :attribute muss zwischen :min und :max Zeichen enthalten.',
        'array'   => 'Der :attribute muss zwischen :min und :max Items enthalten',
    ],
    'boolean'              => 'Der :attribute Feld muss true oder false sein.',
    'confirmed'            => 'Die :attribute Bestätigung stimmt nicht überein.',
    'date'                 => 'Das Datum :attribute ist kein gültiges Datum.',
    'date_format'          => 'Das Datumsformat :attribute Entspricht nicht dem Format :format.',
    'different'            => 'Das :attribute und :other muss unterschiedlich sein.',
    'digits'               => 'Die Zahl :attribute muss :digits gross sein.',
    'digits_between'       => 'Die Zahl :attribute muss zwischen :min und :max Zahlen sein.',
    'dimensions'           => 'Das :attribute hat ungültige Bilder Dimensionen.',
    'distinct'             => 'Das :attribute Feld hat einen doppelten Wert.',
    'email'                => 'Das Feld :attribute muss eine gültige E-Mail Adresse sein.',
    'exists'               => 'Das selektierte :attribute ist ungültig.',
    'file'                 => 'Das :attribute muss eine gültige Datei sein.',
    'filled'               => 'Das :attribute ist ein Pflichtfeld.',
    'image'                => 'Das :attribute muss eine Bilddatei sein.',
    'in'                   => 'Das ausgewählte :attribute ist ungültig. ',
    'in_array'             => 'Das :attribute Feld existiert nicht in :other.',
    'integer'              => 'Das :attribute muss Ganzzahlig sein.',
    'ip'                   => 'Das :attribute muss eine gültige IP-Adresse sein. ',
    'json'                 => 'Das :attribute muss eine gültige JSON Zeichenkette sein.',
    'max'                  => [
        'numeric' => 'Die Nummer :attribute ist nicht grösser als :max.',
        'file'    => 'Das :attribute ist nicht grösser als :max Kilobytes.',
        'string'  => 'Der :attribute ist nicht grösser als :max Zeichen.',
        'array'   => 'Das :attribute ist nicht grösser als :max Items.',
    ],
    'mimes'                => 'Das :attribute muss eines dieser Dateitypen sein: :values.',
    'mimetypes'            => 'Das :attribute muss eines dieser Dateitypen sein: :values.',
    'min'                  => [
        'numeric' => 'Das :attribute muss mindestens :min. lang sein',
        'file'    => 'Die :attribute muss mindestens :min Kilobytes gross sein.',
        'string'  => 'Das :attribute muss mindestesns :min Zeichen lang sein.',
        'array'   => 'Das :attribute muss mindestens :min Items gross sein.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
