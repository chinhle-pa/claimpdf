<?php

return [

    /*
    |--------------------------------------------------------------------------
    |
    |--------------------------------------------------------------------------
    |
    */
    'greeting' => 'hello',
    'pdf' => [
        'lib' => 'Pdf', //Pdf, FPDM
        'path' => '/assets/cathay/',
        'out_path' => '/output/',
        'name' => 'gop.pdf',
        'fields' => [
            'fullname'    => 'Full Name',
            'pocy_no' => 'Policy No',
            'memb_no'    => 'Member No',
            'first_appear_date' => 'When did the illness first appear',
            'first_consult_date' => '',
            'first_provider' => 'first_provider',
            'occur_time' => '',
            'occur_place' => '',
            'incident_detail' => '',
            'first_treatment_date' => '',
            'accident_first_provider' => '',
            'police_report' => 'Off', //Off, True, False
            'sign_date' => '',
            'sign' => '',
            'diagnosis' => '',
            'other_illness' => '',
            'reason_for_admission' => '',
            'symptom' => '',
            'first_consultation_date' => '',
            'treatment_plan' => 'Điều trị ngoại trú',
            'treatment_plan_radio' => 'Off', //Off, inpatient, outpatient, surgery
            'admission_date' => '',
            'discharge_date' => '',
            'room_and_board' => '',
            'parent_accomodation' => '',
            'icu' => '',
            'medication' => '',
            'lab_tests' => '',
            'surgery' => '',
            'aneasthetist_fee' => '',
            'private_nurse' => '',
            'other' => '',
            'provider_confirm' => '',
            'processed_by' => '',
            'approved_by' => '',
            // 'total_amount' => ''
        ]
    ]

];
