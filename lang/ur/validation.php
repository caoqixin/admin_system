<?php

return [
    'accepted'             => ':Attribute تسلیم کرنا لازمی ہے۔',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'active_url'           => ':Attribute قابلِ قبول یو آر ایل نہیں ہے۔',
    'after'                => ':Attribute لازماً :date کے بعد کی کوئی تاریخ ہو۔',
    'after_or_equal'       => 'اس :attribute ہونا ضروری ہے ، ایک تاریخ کے بعد یا اس کے برابر :date.',
    'alpha'                => ':Attribute صرف حروفِ تہجی پر مشتمل ہو سکتا ہے۔',
    'alpha_dash'           => ':Attribute صرف حروفِ تہجی، اعداد، ڈیشِز پر مشتمل ہو سکتا ہے۔',
    'alpha_num'            => ':Attribute میں صرف حروفِ تہجی و اعداد شامل ہو سکتے ہیں۔',
    'array'                => ':Attribute لازماً کسی رینج پر مشتمل ہو۔',
    'before'               => ':Attribute لازماً :date سے پہلے کی کوئی تاریخ ہو۔',
    'before_or_equal'      => 'اس :attribute ہونا ضروری ہے ایک تاریخ سے پہلے یا اس کے برابر :date.',
    'between'              => [
        'array'   => ':Attribute لازماً :min اور :max آئٹمز کے درمیان ہو۔',
        'file'    => ':Attribute لازماً :min اور :max کلو بائٹس کے درمیان ہو۔',
        'numeric' => ':Attribute لازماً :min اور :max کے درمیان ہو۔',
        'string'  => ':Attribute لازماً :min اور :max کریکٹرز کے درمیان ہو۔',
    ],
    'boolean'              => ':Attribute لازماً درست یا غلط ہونا چاہیے۔',
    'confirmed'            => ':Attribute تصدیق سے مطابقت نہیں رکھتا۔',
    'current_password'     => 'The password is incorrect.',
    'date'                 => ':Attribute قابلِ قبول تاریخ نہیں ہے۔',
    'date_equals'          => 'اس :attribute ہونا ضروری ہے ، ایک تاریخ کے لئے برابر :date.',
    'date_format'          => ':Attribute فارمیٹ :format کے مطابق نہیں ہے۔',
    'declined'             => 'The :attribute must be declined.',
    'declined_if'          => 'The :attribute must be declined when :other is :value.',
    'different'            => ':Attribute اور :other لازماً مختلف ہوں۔',
    'digits'               => ':Attribute لازماً :digits اعداد ہوں۔',
    'digits_between'       => ':Attribute لازماً :min اور :max اعداد کے درمیان ہو۔',
    'dimensions'           => 'اس کے :attribute ہے باطل کی تصویر کے طول و عرض.',
    'distinct'             => ':Attribute کی دہری ویلیو ہے۔',
    'doesnt_end_with'      => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with'    => 'The :attribute may not start with one of the following: :values.',
    'email'                => ':Attribute لازماً قابلِ قبول ای میل ہو۔',
    'ends_with'            => 'اس :attribute ختم کرنا ضروری ہے کے ساتھ مندرجہ ذیل میں سے ایک: :values.',
    'enum'                 => 'The selected :attribute is invalid.',
    'exists'               => 'منتخب :attribute درست نہیں ہے۔',
    'file'                 => 'اس :attribute ہونا ضروری ہے ایک فائل.',
    'filled'               => ':Attribute کو بھرنا ضروری ہے۔',
    'gt'                   => [
        'array'   => 'The :attribute must have more than :value items.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string'  => 'The :attribute must be greater than :value characters.',
    ],
    'gte'                  => [
        'array'   => 'The :attribute must have :value items or more.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
    ],
    'image'                => ':Attribute لازماً کوئی تصویر ہو۔',
    'in'                   => 'منتخب :attribute قابلِ قبول نہیں ہے۔',
    'in_array'             => ':Attribute فیلڈ :other میں موجود نہیں ہے۔',
    'integer'              => ':Attribute لازماً کوئی عدد ہو۔',
    'ip'                   => ':Attribute لازماً قابلِ قبول آئی پی پتہ ہو۔',
    'ipv4'                 => 'اس :attribute ہونا ضروری ہے ایک درست IPv4 ایڈریس.',
    'ipv6'                 => 'اس :attribute ہونا ضروری ہے ایک درست IPv6 ایڈریس.',
    'json'                 => ':Attribute لازماً قابلِ قبول JSON سٹرِنگ ہو۔',
    'lt'                   => [
        'array'   => 'The :attribute must have less than :value items.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string'  => 'The :attribute must be less than :value characters.',
    ],
    'lte'                  => [
        'array'   => 'The :attribute must not have more than :value items.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal :value.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
    ],
    'mac_address'          => 'The :attribute must be a valid MAC address.',
    'max'                  => [
        'array'   => ':Attribute میں :max سے زیادہ آئٹمز نہیں ہو سکتیں۔',
        'file'    => ':Attribute کو :max کلو بائٹس سے زیادہ نہیں ہونا چاہیے۔',
        'numeric' => ':Attribute کو :max سے بڑا نہیں ہونا چاہیے۔',
        'string'  => ':Attribute کو :max کریکٹرز سے زیادہ نہیں ہونا چاہیے۔',
    ],
    'max_digits'           => 'The :attribute must not have more than :max digits.',
    'mimes'                => ':Attribute لازماً :type :values قسم کی فائل ہو۔',
    'mimetypes'            => 'اس :attribute ہونا ضروری ہے ایک فائل کی قسم: :values.',
    'min'                  => [
        'array'   => ':Attribute میں لازماً کم از کم :min آئٹمز ہوں۔',
        'file'    => ':Attribute لازماً کم از کم :min کلو بائٹس کی ہو۔',
        'numeric' => ':Attribute لازماً کم از کم :min ہو۔',
        'string'  => ':Attribute لازماً کم از کم :min کریکٹرز طویل ہو۔',
    ],
    'min_digits'           => 'The :attribute must have at least :min digits.',
    'multiple_of'          => 'اس :attribute ہونا ضروری ہے ایک سے زیادہ کے :value',
    'not_in'               => 'منتخب :attribute قابلِ قبول نہیں ہے۔',
    'not_regex'            => 'اس :attribute شکل باطل ہے.',
    'numeric'              => ':Attribute لازماً کوئی عدد ہو۔',
    'password'             => [
        'letters'       => 'The :attribute must contain at least one letter.',
        'mixed'         => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers'       => 'The :attribute must contain at least one number.',
        'symbols'       => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present'              => ':Attribute فیلڈ موجود ہونا ضروری ہے۔',
    'prohibited'           => 'اس :attribute میدان ممنوع ہے.',
    'prohibited_if'        => 'اس :attribute میدان ممنوع ہے جب :other ہے :value.',
    'prohibited_unless'    => 'اس :attribute میدان ممنوع ہے جب تک کہ :other میں ہے :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => ':Attribute قابلِ قبول فارمیٹ میں نہیں ہے۔',
    'required'             => ':Attribute فیلڈ درکار ہے۔',
    'required_array_keys'  => 'The :attribute field must contain entries for: :values.',
    'required_if'          => ':Attribute درکار ہے اگر :other کی ویلیو :value ہو۔',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless'      => 'جب تک :other :values میں نہ ہو تو :attribute فیلڈ درکار ہے۔',
    'required_with'        => ':Attribute فیلڈ درکار ہے اگر :values موجود ہوں۔',
    'required_with_all'    => ':Attribute فیلڈ درکار ہے اگر :values موجود ہوں۔',
    'required_without'     => ':Attribute درکار ہے جب :values موجود ہو۔',
    'required_without_all' => ':Attribute فیلڈ درکار ہے جب :values میں سے کوئی بھی موجود نہ ہو۔',
    'same'                 => ':Attribute اور :other لازماً ایک دوسرے سے مماثل ہوں۔',
    'size'                 => [
        'array'   => ':Attribute میں لازماً :size آئٹمز شامل ہوں۔',
        'file'    => ':Attribute کا سائز لازماً :size کلو بائٹس ہو۔',
        'numeric' => ':Attribute لازماً :size ہوں۔',
        'string'  => ':Attribute لازماً :size کریکٹرز پر مشتمل ہو۔',
    ],
    'starts_with'          => 'اس :attribute کے ساتھ شروع ہونا چاہئے مندرجہ ذیل میں سے ایک: :values.',
    'string'               => ':Attribute لازماً کوئی سٹرنگ ہو۔',
    'timezone'             => ':Attribute لازماً کوئی قابلِ قبول خطۂِ وقت ہو۔',
    'unique'               => ':Attribute کو پہلے ہی کسی نے حاصل کر لیا ہے۔',
    'uploaded'             => 'اس :attribute ناکام اپ لوڈ کرنے کے لئے.',
    'url'                  => ':Attribute فارمیٹ قابلِ قبول نہیں ہے۔',
    'uuid'                 => 'اس :attribute ہونا ضروری ہے ایک درست UUID.',
    'attributes'           => [
        'address'                  => 'address',
        'age'                      => 'age',
        'amount'                   => 'amount',
        'area'                     => 'area',
        'available'                => 'available',
        'birthday'                 => 'birthday',
        'body'                     => 'body',
        'city'                     => 'city',
        'content'                  => 'content',
        'country'                  => 'country',
        'created_at'               => 'created at',
        'creator'                  => 'creator',
        'current_password'         => 'current password',
        'date'                     => 'date',
        'date_of_birth'            => 'date of birth',
        'day'                      => 'day',
        'deleted_at'               => 'deleted at',
        'description'              => 'description',
        'district'                 => 'district',
        'duration'                 => 'duration',
        'email'                    => 'email',
        'excerpt'                  => 'excerpt',
        'filter'                   => 'filter',
        'first_name'               => 'first name',
        'gender'                   => 'gender',
        'group'                    => 'group',
        'hour'                     => 'hour',
        'image'                    => 'تصویر',
        'last_name'                => 'last name',
        'lesson'                   => 'lesson',
        'line_address_1'           => 'line address 1',
        'line_address_2'           => 'line address 2',
        'message'                  => 'message',
        'middle_name'              => 'middle name',
        'minute'                   => 'minute',
        'mobile'                   => 'mobile',
        'month'                    => 'month',
        'name'                     => 'name',
        'national_code'            => 'national code',
        'number'                   => 'number',
        'password'                 => 'password',
        'password_confirmation'    => 'password confirmation',
        'phone'                    => 'phone',
        'photo'                    => 'photo',
        'postal_code'              => 'postal code',
        'price'                    => 'price',
        'province'                 => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember'                 => 'remember',
        'restored_at'              => 'restored at',
        'result_text_under_image'  => 'تصویر کے تحت نتیجے کا متن',
        'role'                     => 'role',
        'second'                   => 'second',
        'sex'                      => 'sex',
        'short_text'               => 'مختصر متن',
        'size'                     => 'size',
        'state'                    => 'state',
        'street'                   => 'street',
        'student'                  => 'student',
        'subject'                  => 'subject',
        'teacher'                  => 'teacher',
        'terms'                    => 'terms',
        'test_description'         => 'ٹیسٹ کی تفصیلات',
        'test_locale'              => 'زبان',
        'test_name'                => 'ٹیسٹ کا نام',
        'text'                     => 'text',
        'time'                     => 'time',
        'title'                    => 'title',
        'updated_at'               => 'updated at',
        'username'                 => 'username',
        'year'                     => 'year',
    ],
];
