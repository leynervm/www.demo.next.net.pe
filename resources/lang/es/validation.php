<?php

declare(strict_types=1);

return [
    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a hoy.',
    'alpha'                => 'El campo :attribute solo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => 'El campo :attribute solo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'array'   => 'El campo :attribute tiene que tener entre :min - :max elementos.',
        'file'    => 'El campo :attribute debe pesar entre :min - :max kilobytes.',
        'numeric' => 'El campo :attribute tiene que estar entre :min - :max.',
        'string'  => 'El campo :attribute tiene que tener entre :min - :max caracteres.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_equals'          => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute debe ser una dirección de correo válida.',
    'ends_with'            => 'El campo :attribute debe finalizar con alguno de los siguientes valores: :values',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'gt'                   => [
        'array'   => 'El campo :attribute debe tener más de :value elementos.',
        'file'    => 'El campo :attribute debe tener más de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string'  => 'El campo :attribute debe tener más de :value caracteres.',
    ],
    'gte'                  => [
        'array'   => 'El campo :attribute debe tener como mínimo :value elementos.',
        'file'    => 'El campo :attribute debe tener como mínimo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como mínimo :value.',
        'string'  => 'El campo :attribute debe tener como mínimo :value caracteres.',
    ],
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'lt'                   => [
        'array'   => 'El campo :attribute debe tener menos de :value elementos.',
        'file'    => 'El campo :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string'  => 'El campo :attribute debe tener menos de :value caracteres.',
    ],
    'lte'                  => [
        'array'   => 'El campo :attribute debe tener como máximo :value elementos.',
        'file'    => 'El campo :attribute debe tener como máximo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como máximo :value.',
        'string'  => 'El campo :attribute debe tener como máximo :value caracteres.',
    ],
    'max'                  => [
        'array'   => 'El campo :attribute no debe tener más de :max elementos.',
        'file'    => 'El campo :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'string'  => 'El campo :attribute no debe ser mayor que :max caracteres.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'array'   => 'El campo :attribute debe tener al menos :min elementos.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
    ],
    'min_digits'           => 'El campo :attribute debe tener al menos :min dígitos.',
    'not_in'               => 'El campo :attribute seleccionado es inválido.',
    'not_regex'            => 'El formato del campo :attribute es inválido.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'array'   => 'El campo :attribute debe contener :size elementos.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El campo :attribute debe ser una zona horaria válida.',
    'unique'               => 'El valor del campo :attribute ya está en uso.',
    'uploaded'             => 'El campo :attribute no se pudo subir.',
    'url'                  => 'El formato del campo :attribute es inválido.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',
    'attributes'           => [
        'address'                  => 'dirección',
        'affiliate_url'            => 'URL de afiliado',
        'age'                      => 'edad',
        'amount'                   => 'cantidad',
        'announcement'             => 'anuncio',
        'area'                     => 'área',
        'audience_prize'           => 'premio del público',
        'available'                => 'disponible',
        'birthday'                 => 'cumpleaños',
        'body'                     => 'contenido',
        'city'                     => 'ciudad',
        'compilation'              => 'compilación',
        'concept'                  => 'concepto',
        'conditions'               => 'condiciones',
        'content'                  => 'contenido',
        'country'                  => 'país',
        'cover'                    => 'portada',
        'created_at'               => 'creado el',
        'creator'                  => 'creador',
        'currency'                 => 'moneda',
        'current_password'         => 'contraseña actual',
        'customer'                 => 'cliente',
        'date'                     => 'fecha',
        'date_of_birth'            => 'fecha de nacimiento',
        'dates'                    => 'fechas',
        'day'                      => 'día',
        'deleted_at'               => 'eliminado el',
        'description'              => 'descripción',
        'display_type'             => 'tipo de visualización',
        'district'                 => 'distrito',
        'duration'                 => 'duración',
        'email'                    => 'correo electrónico',
        'excerpt'                  => 'extracto',
        'filter'                   => 'filtro',
        'finished_at'              => 'terminado el',
        'first_name'               => 'nombre',
        'gender'                   => 'género',
        'grand_prize'              => 'gran Premio',
        'group'                    => 'grupo',
        'hour'                     => 'hora',
        'image'                    => 'imagen',
        'image_desktop'            => 'imagen de escritorio',
        'image_main'               => 'imagen principal',
        'image_mobile'             => 'imagen móvil',
        'images'                   => 'imágenes',
        'is_audience_winner'       => 'es ganador de audiencia',
        'is_hidden'                => 'está oculto',
        'is_subscribed'            => 'está suscrito',
        'is_visible'               => 'es visible',
        'is_winner'                => 'es ganador',
        'items'                    => 'elementos',
        'key'                      => 'clave',
        'last_name'                => 'apellidos',
        'lesson'                   => 'lección',
        'line_address_1'           => 'línea de dirección 1',
        'line_address_2'           => 'línea de dirección 2',
        'login'                    => 'acceso',
        'message'                  => 'mensaje',
        'middle_name'              => 'segundo nombre',
        'minute'                   => 'minuto',
        'mobile'                   => 'móvil',
        'month'                    => 'mes',
        'name'                     => 'nombre',
        'national_code'            => 'código nacional',
        'number'                   => 'número',
        'password'                 => 'contraseña',
        'password_confirmation'    => 'confirmación de la contraseña',
        'phone'                    => 'teléfono',
        'photo'                    => 'foto',
        'portfolio'                => 'portafolio',
        'postal_code'              => 'código postal',
        'preview'                  => 'vista preliminar',
        'price'                    => 'precio',
        'product_id'               => 'ID del producto',
        'product_uid'              => 'UID del producto',
        'product_uuid'             => 'UUID del producto',
        'promo_code'               => 'código promocional',
        'province'                 => 'provincia',
        'quantity'                 => 'cantidad',
        'reason'                   => 'razón',
        'recaptcha_response_field' => 'respuesta del recaptcha',
        'referee'                  => 'árbitro',
        'referees'                 => 'árbitros',
        'reject_reason'            => 'motivo de rechazo',
        'remember'                 => 'recordar',
        'restored_at'              => 'restaurado el',
        'result_text_under_image'  => 'texto bajo la imagen',
        'role'                     => 'rol',
        'rule'                     => 'regla',
        'rules'                    => 'reglas',
        'second'                   => 'segundo',
        'sex'                      => 'sexo',
        'shipment'                 => 'envío',
        'short_text'               => 'texto corto',
        'size'                     => 'tamaño',
        'skills'                   => 'habilidades',
        'slug'                     => 'slug',
        'specialization'           => 'especialización',
        'started_at'               => 'comenzado el',
        'state'                    => 'estado',
        'status'                   => 'estado',
        'street'                   => 'calle',
        'student'                  => 'estudiante',
        'subject'                  => 'asunto',
        'tag'                      => 'etiqueta',
        'tags'                     => 'etiquetas',
        'teacher'                  => 'profesor',
        'terms'                    => 'términos',
        'test_description'         => 'descripción de prueba',
        'test_locale'              => 'idioma de prueba',
        'test_name'                => 'nombre de prueba',
        'text'                     => 'texto',
        'time'                     => 'hora',
        'title'                    => 'título',
        'type'                     => 'tipo',
        'updated_at'               => 'actualizado el',
        'user'                     => 'usuario',
        'username'                 => 'usuario',
        'value'                    => 'valor',
        'year'                     => 'año',
        'shipmenttype'             => 'tipo de envío',
        'shipmenttype_id'          => 'tipo de envío',
        'receiver_info.document'   => 'documento',
        'receiver_info.name'       => 'nombres',
        'receiver_info.telefono'   => 'teléfono',
        'local_id'                 => 'local',
        'daterecojo'               => 'fecha de recojo',
        'today'                    => 'fecha actual',
        'direccionenvio_id'        => 'dirección de envío',
        'default'                  => 'predeterminado',
        'decimals'                 => 'decimal',
        'defaultlogin'             => 'lista web predeterminado',
        'startdate'                => 'fecha de inicio',
        'expiredate'               => 'fecha de finalización',
        'finish'                   => 'finalizado',
        'sendmode'                 => 'modo envío',
        'typepayment_id'           => 'tipo de pago',
        'almacens'                 => 'almacenes',
        'cuotas.*.cuota'           => 'cuota',
        'cuotas.*.amount'          => 'monto de cuota',
        'cuotas.*.date'            => 'fecha de pago',
        'methodpayment_id'         => 'forma de pago',
        'amountcuotas'             => 'monto total cuotas',
        'document'                 => 'documento',
        'ubigeo_id'                =>  'ubigeo',
        'proveedortype_id'         => 'tipo de proveedor',
        'documentContact'          => 'documento',
        'nameContact'              => 'nombre',
        'telefonoContact'          => 'telefono',
        'category_id'                 => 'categoría',
        'tipocambio'               => 'tipo de cambio',
        'moneda_id'                => 'moneda',
        'proveedor_id'             => 'proveedor',
        'producto_id'              => 'producto',
        'pricesale'                => 'precio venta',
        'pricebuy'                 => 'precio venta',
        'serie.*.compraitem_id'    => 'item de compra',
        'serie.*.serie'            => 'serie',
        'cart.*.almacen_id'        => 'almacen',
        'cart.*.price'             => 'precio',
        'cart.*.cantidad'          => 'cantidad',
        'cart.*.serie'             => 'serie',
        'typecomprobante_id'        => 'tipo comprobante',
        'partnumber'                => 'número de parte',
        'unit_id'                   => 'unidad medida',
        'marca_id'                   => 'marca',
        'datecode'                  => 'tiempo medida',
        'typegarantia_id'           => 'tipo garantía',
        'sucursal_id'               => 'sucursal',
        'codeanexo'                 => 'código anexo',
        'cert'                      => 'certificado',
        'passwordcert'              => 'contraseña del certificado',
        'clientsecret'              => 'clave secreta',
        'clientid'                  => 'client id',
        'usuariosol'                => 'usuario sol',
        'clavesol'                  => 'clave sol',
        'selectedsucursals'         => 'sucursales',
        'namealmacen'               => 'nombre almacén',
        'precio_1'                  => 'precio',
        'precio_2'                  => 'precio',
        'precio_3'                  => 'precio',
        'precio_4'                  => 'precio',
        'precio_5'                  => 'precio',
        'pricetype_id'              => 'lista de precio',
        'document2'                 =>  'documento',
        'name2'                     =>  'nombre',
        'telefono2'                 =>  'telefono',
    ],
];
