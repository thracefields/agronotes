<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    "accepted"         => ":attribute.",
    "active_url"       => "Полето не е валиден URL адрес.",
    "after"            => "Полето трябва да съдържа дата след :date.",
    "alpha"            => "Полето трябва да съдържа само букви.",
    "alpha_dash"       => "Полето трябва да съдържа само букви, цифри, долна черта и тире.",
    "alpha_num"        => "Полето трябва да съдържа само букви и цифри.",
    "array"            => "Полето трябва да бъде масив.",
    "before"           => "Полето трябва да съдържа дата преди :date.",
    "between"          => [
        "numeric" => ":attribute трябва да бъде между :min и :max.",
        "file"    => ":attribute трябва да бъде между :min и :max килобайта.",
        "string"  => ":attribute трябва да бъде между :min и :max знака.",
        "array"   => ":attribute трябва да има между :min - :max елемента.",
    ],
    "boolean"          => ":attribute трябва да съдържа положителен или отрицателен отговор.",
    "confirmed"        => "Полето не е потвърдено.",
    "date"             => "Полето не съдържа валидна дата.",
    "date_format"      => "Стойността на полето не е във формат :format.",
    "different"        => "Полеот за :attribute и това за :other трябва да са различни.",
    "digits"           => "Стойността на оолето трябва да има :digits цифри.",
    "digits_between"   => "Полето за :attribute трябва да има между :min и :max цифри.",
    "email"            => "Полето за :attribute е в невалиден формат.",
    "exists"           => "Избраното поле вече съществува.",
    "filled"           => "Полето за :attribute е задължително.",
    "image"            => "Полето трябва да бъде изображение.",
    "in"               => "Избраното поле е невалидно.",
    "in_array"         => "Полето за :attribute липсва в това за :other.",
    "integer"          => "Полето за :attribute трябва да бъде цяло число.",
    "ip"               => "Полето за :attribute трябва да бъде валиден IP адрес.",
    "ipv4"             => "Полето за :attribute трябва да бъде валиден IPv4 адрес.",
    "ipv6"             => "Полето за :attribute трябва да бъде валиден IPv6 адрес.",
    "json"             => "Полето за :attribute трябва да бъде JSON низ.",
    "max"              => [
        "numeric" => "Полето за :attribute трябва да бъде по-малко от :max.",
        "file"    => "Полето за :attribute трябва да бъде по-малко от :max килобайта.",
        "string"  => "Полето за :attribute трябва да бъде по-малко от :max знака.",
        "array"   => "Полето за :attribute трябва да има по-малко от :max елемента.",
    ],
    "mimes"            => "Полето трябва да бъде файл от тип: :values.",
    "min"              => [
        "numeric" => "Полето трябва да бъде минимум :min.",
        "file"    => "Полето трябва да бъде минимум :min килобайта.",
        "string"  => "Полето трябва да бъде минимум :min знака.",
        "array"   => "Полето трябва има минимум :min елемента.",
    ],
    "not_in"                => "Избраното поле :attribute е невалидно.",
    "numeric"               => "Полето :attribute трябва да бъде число.",
    "regex"                 => "Полето :attribute е в невалиден формат.",
    "required"              => "Полето е задължително.",
    "required_if"           => "Полето за:attribute се изисква, когато :other е :value.",
    "required_unless"       => "Полето за :attribute се изисква, освен ако :other не е :values.",
    "required_with"         => "Полето за :attribute се изисква, когато :values има стойност.",
    "required_with_all"     => "Полето за :attribute е задължително, когато :values имат стойност.",
    "required_without"      => "Полето за :attribute се изисква, когато :values няма стойност.",
    "required_without_all"  => "Полето за :attribute се изисква, когато никое от полетата :values няма стойност.",
    "same"                  => "Полетата за :attribute и за :other трябва да съвпадат.",
    "size"                  => [
        "numeric" => "Полето трябва да бъде :size.",
        "file"    => "Полето трябва да бъде :size килобайта.",
        "string"  => "Полето трябва да бъде :size знака.",
        "array"   => "Полето трябва да има :size елемента.",
    ],
    "string"                => "Полето трябва да бъде знаков низ.",
    "timezone"              => "Полето трябва да съдържа валидна часова зона.",
    "unique"                => "Полето за вече съществува.",
    "url"                   => "Полето е в невалиден формат.",
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
    "custom" => [
        "attribute-name" => [
            "rule-name"  => "custom-message",
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
    "attributes" => [
            "name"                      => "името",
            "username"                  => "потребителското име",
            "email"                     => "електронната поща",
            "first_name"                => "името",
            "last_name"                 => "фамилията",
            "password"                  => "паролата",
            "city"                      => "града",
            "country"                   => "държавата",
            "address"                   => "адреса",
            "phone"                     => "телефона",
            "mobile"                    => "телефона",
            "age"                       => "бъзрастта",
            "sex"                       => "пола",
            "gender"                    => "пола",
            "day"                       => "деня",
            "month"                     => "месеца",
            "year"                      => "годината",
            "hour"                      => "часа",
            "minute"                    => "минутата",
            "second"                    => "секундата",
            "title"                     => "заглавието",
            "content"                   => "съдържанието",
            "description"               => "описанието",
            "excerpt"                   => "откъса",
            "date"                      => "датата",
            "time"                      => "времето",
            "available"                 => "достъпен",
            "size"                      => "размер",
            "recaptcha_response_field"  => "рекапча",
            "subject"                   => "заглавието",
            "message"                   => "съобщението",
    ],
];