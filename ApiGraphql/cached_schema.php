<?php
return array (
  'kind' => 'Document',
  'loc' => 
  array (
    'start' => 0,
    'end' => 8475,
  ),
  'definitions' => 
  array (
    0 => 
    array (
      'kind' => 'SchemaDefinition',
      'loc' => 
      array (
        'start' => 0,
        'end' => 65,
      ),
      'directives' => 
      array (
      ),
      'operationTypes' => 
      array (
        0 => 
        array (
          'kind' => 'OperationTypeDefinition',
          'loc' => 
          array (
            'start' => 12,
            'end' => 32,
          ),
          'operation' => 'query',
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 19,
              'end' => 32,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 19,
                'end' => 32,
              ),
              'value' => 'RootQueryType',
            ),
          ),
        ),
        1 => 
        array (
          'kind' => 'OperationTypeDefinition',
          'loc' => 
          array (
            'start' => 36,
            'end' => 62,
          ),
          'operation' => 'mutation',
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 46,
              'end' => 62,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 46,
                'end' => 62,
              ),
              'value' => 'RootMutationType',
            ),
          ),
        ),
      ),
    ),
    1 => 
    array (
      'kind' => 'ScalarTypeDefinition',
      'loc' => 
      array (
        'start' => 69,
        'end' => 82,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 76,
          'end' => 82,
        ),
        'value' => 'Upload',
      ),
      'directives' => 
      array (
      ),
    ),
    2 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 86,
        'end' => 144,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 91,
          'end' => 95,
        ),
        'value' => 'Cart',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 101,
            'end' => 124,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 101,
              'end' => 109,
            ),
            'value' => 'products',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 111,
              'end' => 124,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 112,
                'end' => 123,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 112,
                  'end' => 123,
                ),
                'value' => 'CartProduct',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 128,
            'end' => 141,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 128,
              'end' => 133,
            ),
            'value' => 'total',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 135,
              'end' => 141,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 135,
                'end' => 141,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    3 => 
    array (
      'kind' => 'InputObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 148,
        'end' => 200,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 154,
          'end' => 164,
        ),
        'value' => 'CartOption',
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 170,
            'end' => 180,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 170,
              'end' => 172,
            ),
            'value' => 'id',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 174,
              'end' => 180,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 174,
                'end' => 180,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 184,
            'end' => 197,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 184,
              'end' => 189,
            ),
            'value' => 'value',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 191,
              'end' => 197,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 191,
                'end' => 197,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    4 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 204,
        'end' => 286,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 209,
          'end' => 226,
        ),
        'value' => 'CartProductOption',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 234,
            'end' => 246,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 234,
              'end' => 238,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 240,
              'end' => 246,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 240,
                'end' => 246,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 252,
            'end' => 265,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 252,
              'end' => 257,
            ),
            'value' => 'value',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 259,
              'end' => 265,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 259,
                'end' => 265,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 271,
            'end' => 283,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 271,
              'end' => 275,
            ),
            'value' => 'type',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 277,
              'end' => 283,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 277,
                'end' => 283,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    5 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 290,
        'end' => 411,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 295,
          'end' => 306,
        ),
        'value' => 'CartProduct',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 312,
            'end' => 323,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 312,
              'end' => 315,
            ),
            'value' => 'key',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 317,
              'end' => 323,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 317,
                'end' => 323,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 327,
            'end' => 343,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 327,
              'end' => 334,
            ),
            'value' => 'product',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 336,
              'end' => 343,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 336,
                'end' => 343,
              ),
              'value' => 'Product',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 347,
            'end' => 374,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 347,
              'end' => 353,
            ),
            'value' => 'option',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 355,
              'end' => 374,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 356,
                'end' => 373,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 356,
                  'end' => 373,
                ),
                'value' => 'CartProductOption',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 378,
            'end' => 391,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 378,
              'end' => 386,
            ),
            'value' => 'quantity',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 388,
              'end' => 391,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 388,
                'end' => 391,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 395,
            'end' => 408,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 395,
              'end' => 400,
            ),
            'value' => 'total',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 402,
              'end' => 408,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 402,
                'end' => 408,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    6 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 415,
        'end' => 644,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 420,
          'end' => 428,
        ),
        'value' => 'Category',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 434,
            'end' => 440,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 434,
              'end' => 436,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 438,
              'end' => 440,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 438,
                'end' => 440,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 444,
            'end' => 457,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 444,
              'end' => 449,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 451,
              'end' => 457,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 451,
                'end' => 457,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 461,
            'end' => 478,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 461,
              'end' => 470,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 472,
              'end' => 478,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 472,
                'end' => 478,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 482,
            'end' => 494,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 482,
              'end' => 486,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 488,
              'end' => 494,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 488,
                'end' => 494,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 498,
            'end' => 517,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 498,
              'end' => 509,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 511,
              'end' => 517,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 511,
                'end' => 517,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 521,
            'end' => 538,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 521,
              'end' => 530,
            ),
            'value' => 'parent_id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 532,
              'end' => 538,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 532,
                'end' => 538,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 542,
            'end' => 566,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 542,
              'end' => 545,
            ),
            'value' => 'url',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 546,
                'end' => 557,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 546,
                  'end' => 549,
                ),
                'value' => 'url',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 551,
                  'end' => 557,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 551,
                    'end' => 557,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 560,
              'end' => 566,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 560,
                'end' => 566,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 570,
            'end' => 608,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 570,
              'end' => 580,
            ),
            'value' => 'categories',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 581,
                'end' => 595,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 581,
                  'end' => 586,
                ),
                'value' => 'limit',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 588,
                  'end' => 591,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 588,
                    'end' => 591,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 594,
                  'end' => 595,
                ),
                'value' => '3',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 598,
              'end' => 608,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 599,
                'end' => 607,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 599,
                  'end' => 607,
                ),
                'value' => 'Category',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 612,
            'end' => 627,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 612,
              'end' => 619,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 621,
              'end' => 627,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 621,
                'end' => 627,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 631,
            'end' => 641,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 631,
              'end' => 635,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 637,
              'end' => 641,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 637,
                'end' => 641,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    7 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 648,
        'end' => 885,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 653,
          'end' => 665,
        ),
        'value' => 'categoryBlog',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 671,
            'end' => 677,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 671,
              'end' => 673,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 675,
              'end' => 677,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 675,
                'end' => 677,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 681,
            'end' => 694,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 681,
              'end' => 686,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 688,
              'end' => 694,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 688,
                'end' => 694,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 698,
            'end' => 715,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 698,
              'end' => 707,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 709,
              'end' => 715,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 709,
                'end' => 715,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 719,
            'end' => 731,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 719,
              'end' => 723,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 725,
              'end' => 731,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 725,
                'end' => 731,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 735,
            'end' => 754,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 735,
              'end' => 746,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 748,
              'end' => 754,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 748,
                'end' => 754,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 758,
            'end' => 775,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 758,
              'end' => 767,
            ),
            'value' => 'parent_id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 769,
              'end' => 775,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 769,
                'end' => 775,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 779,
            'end' => 803,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 779,
              'end' => 782,
            ),
            'value' => 'url',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 783,
                'end' => 794,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 783,
                  'end' => 786,
                ),
                'value' => 'url',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 788,
                  'end' => 794,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 788,
                    'end' => 794,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 797,
              'end' => 803,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 797,
                'end' => 803,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 807,
            'end' => 822,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 807,
              'end' => 814,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 816,
              'end' => 822,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 816,
                'end' => 822,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 826,
            'end' => 868,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 826,
              'end' => 836,
            ),
            'value' => 'categories',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 837,
                'end' => 851,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 837,
                  'end' => 842,
                ),
                'value' => 'limit',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 844,
                  'end' => 847,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 844,
                    'end' => 847,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 850,
                  'end' => 851,
                ),
                'value' => '3',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 854,
              'end' => 868,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 855,
                'end' => 867,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 855,
                  'end' => 867,
                ),
                'value' => 'categoryBlog',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 872,
            'end' => 882,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 872,
              'end' => 876,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 878,
              'end' => 882,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 878,
                'end' => 882,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    8 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 889,
        'end' => 1073,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 894,
          'end' => 912,
        ),
        'value' => 'categoryBlogResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 918,
            'end' => 941,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 918,
              'end' => 925,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 927,
              'end' => 941,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 928,
                'end' => 940,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 928,
                  'end' => 940,
                ),
                'value' => 'categoryBlog',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 945,
            'end' => 959,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 945,
              'end' => 950,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 952,
              'end' => 959,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 952,
                'end' => 959,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 963,
            'end' => 976,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 963,
              'end' => 967,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 969,
              'end' => 976,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 969,
                'end' => 976,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 980,
            'end' => 991,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 980,
              'end' => 986,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 988,
              'end' => 991,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 988,
                'end' => 991,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 995,
            'end' => 1016,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 995,
              'end' => 1011,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1013,
              'end' => 1016,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1013,
                'end' => 1016,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1020,
            'end' => 1029,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1020,
              'end' => 1024,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1026,
              'end' => 1029,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1026,
                'end' => 1029,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1033,
            'end' => 1048,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1033,
              'end' => 1043,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1045,
              'end' => 1048,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1045,
                'end' => 1048,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1052,
            'end' => 1070,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1052,
              'end' => 1065,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1067,
              'end' => 1070,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1067,
                'end' => 1070,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    9 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1077,
        'end' => 1253,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1082,
          'end' => 1096,
        ),
        'value' => 'CategoryResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1102,
            'end' => 1121,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1102,
              'end' => 1109,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 1111,
              'end' => 1121,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 1112,
                'end' => 1120,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 1112,
                  'end' => 1120,
                ),
                'value' => 'Category',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1125,
            'end' => 1139,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1125,
              'end' => 1130,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1132,
              'end' => 1139,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1132,
                'end' => 1139,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1143,
            'end' => 1156,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1143,
              'end' => 1147,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1149,
              'end' => 1156,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1149,
                'end' => 1156,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1160,
            'end' => 1171,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1160,
              'end' => 1166,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1168,
              'end' => 1171,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1168,
                'end' => 1171,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1175,
            'end' => 1196,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1175,
              'end' => 1191,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1193,
              'end' => 1196,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1193,
                'end' => 1196,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1200,
            'end' => 1209,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1200,
              'end' => 1204,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1206,
              'end' => 1209,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1206,
                'end' => 1209,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1213,
            'end' => 1228,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1213,
              'end' => 1223,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1225,
              'end' => 1228,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1225,
                'end' => 1228,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1232,
            'end' => 1250,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1232,
              'end' => 1245,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1247,
              'end' => 1250,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1247,
                'end' => 1250,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    10 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1257,
        'end' => 1430,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1262,
          'end' => 1270,
        ),
        'value' => 'Currency',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1276,
            'end' => 1329,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1276,
              'end' => 1281,
            ),
            'value' => 'title',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1283,
              'end' => 1289,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1283,
                'end' => 1289,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
            0 => 
            array (
              'kind' => 'Directive',
              'loc' => 
              array (
                'start' => 1290,
                'end' => 1329,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 1291,
                  'end' => 1301,
                ),
                'value' => 'deprecated',
              ),
              'arguments' => 
              array (
                0 => 
                array (
                  'kind' => 'Argument',
                  'loc' => 
                  array (
                    'start' => 1302,
                    'end' => 1328,
                  ),
                  'value' => 
                  array (
                    'kind' => 'StringValue',
                    'loc' => 
                    array (
                      'start' => 1310,
                      'end' => 1328,
                    ),
                    'value' => 'Changed to name!',
                    'block' => false,
                  ),
                  'name' => 
                  array (
                    'kind' => 'Name',
                    'loc' => 
                    array (
                      'start' => 1302,
                      'end' => 1308,
                    ),
                    'value' => 'reason',
                  ),
                ),
              ),
            ),
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1333,
            'end' => 1345,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1333,
              'end' => 1337,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1339,
              'end' => 1345,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1339,
                'end' => 1345,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1349,
            'end' => 1361,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1349,
              'end' => 1353,
            ),
            'value' => 'code',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1355,
              'end' => 1361,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1355,
                'end' => 1361,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1365,
            'end' => 1384,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1365,
              'end' => 1376,
            ),
            'value' => 'symbol_left',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1378,
              'end' => 1384,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1378,
                'end' => 1384,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1388,
            'end' => 1408,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1388,
              'end' => 1400,
            ),
            'value' => 'symbol_right',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1402,
              'end' => 1408,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1402,
                'end' => 1408,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1412,
            'end' => 1427,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1412,
              'end' => 1418,
            ),
            'value' => 'active',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1420,
              'end' => 1427,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1420,
                'end' => 1427,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    11 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1434,
        'end' => 1524,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1439,
          'end' => 1447,
        ),
        'value' => 'Customer',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1453,
            'end' => 1463,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1453,
              'end' => 1455,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1457,
              'end' => 1463,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1457,
                'end' => 1463,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1467,
            'end' => 1484,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1467,
              'end' => 1476,
            ),
            'value' => 'firstName',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1478,
              'end' => 1484,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1478,
                'end' => 1484,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1488,
            'end' => 1504,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1488,
              'end' => 1496,
            ),
            'value' => 'lastName',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1498,
              'end' => 1504,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1498,
                'end' => 1504,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1508,
            'end' => 1521,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1508,
              'end' => 1513,
            ),
            'value' => 'email',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1515,
              'end' => 1521,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1515,
                'end' => 1521,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    12 => 
    array (
      'kind' => 'InputObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1528,
        'end' => 1630,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1534,
          'end' => 1547,
        ),
        'value' => 'CustomerInput',
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 1553,
            'end' => 1570,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1553,
              'end' => 1562,
            ),
            'value' => 'firstName',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1564,
              'end' => 1570,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1564,
                'end' => 1570,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 1574,
            'end' => 1590,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1574,
              'end' => 1582,
            ),
            'value' => 'lastName',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1584,
              'end' => 1590,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1584,
                'end' => 1590,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 1594,
            'end' => 1607,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1594,
              'end' => 1599,
            ),
            'value' => 'email',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1601,
              'end' => 1607,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1601,
                'end' => 1607,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 1611,
            'end' => 1627,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1611,
              'end' => 1619,
            ),
            'value' => 'password',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1621,
              'end' => 1627,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1621,
                'end' => 1627,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    13 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1634,
        'end' => 1720,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1639,
          'end' => 1647,
        ),
        'value' => 'Language',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1653,
            'end' => 1665,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1653,
              'end' => 1657,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1659,
              'end' => 1665,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1659,
                'end' => 1665,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1669,
            'end' => 1681,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1669,
              'end' => 1673,
            ),
            'value' => 'code',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1675,
              'end' => 1681,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1675,
                'end' => 1681,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1685,
            'end' => 1698,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1685,
              'end' => 1690,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1692,
              'end' => 1698,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1692,
                'end' => 1698,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1702,
            'end' => 1717,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1702,
              'end' => 1708,
            ),
            'value' => 'active',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1710,
              'end' => 1717,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1710,
                'end' => 1717,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    14 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1724,
        'end' => 1787,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1729,
          'end' => 1741,
        ),
        'value' => 'LoggedResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1747,
            'end' => 1762,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1747,
              'end' => 1753,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1755,
              'end' => 1762,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1755,
                'end' => 1762,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1766,
            'end' => 1784,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1766,
              'end' => 1774,
            ),
            'value' => 'customer',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1776,
              'end' => 1784,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1776,
                'end' => 1784,
              ),
              'value' => 'Customer',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    15 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1791,
        'end' => 1832,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1796,
          'end' => 1808,
        ),
        'value' => 'LogoutResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1814,
            'end' => 1829,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1814,
              'end' => 1820,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1822,
              'end' => 1829,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1822,
                'end' => 1829,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    16 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1836,
        'end' => 1887,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1841,
          'end' => 1852,
        ),
        'value' => 'OptionValue',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1858,
            'end' => 1868,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1858,
              'end' => 1860,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1862,
              'end' => 1868,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1862,
                'end' => 1868,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1872,
            'end' => 1884,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1872,
              'end' => 1876,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1878,
              'end' => 1884,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1878,
                'end' => 1884,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    17 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 1891,
        'end' => 2063,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 1896,
          'end' => 1900,
        ),
        'value' => 'Page',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1906,
            'end' => 1912,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1906,
              'end' => 1908,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1910,
              'end' => 1912,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1910,
                'end' => 1912,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1916,
            'end' => 1969,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1916,
              'end' => 1921,
            ),
            'value' => 'title',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1923,
              'end' => 1929,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1923,
                'end' => 1929,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
            0 => 
            array (
              'kind' => 'Directive',
              'loc' => 
              array (
                'start' => 1930,
                'end' => 1969,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 1931,
                  'end' => 1941,
                ),
                'value' => 'deprecated',
              ),
              'arguments' => 
              array (
                0 => 
                array (
                  'kind' => 'Argument',
                  'loc' => 
                  array (
                    'start' => 1942,
                    'end' => 1968,
                  ),
                  'value' => 
                  array (
                    'kind' => 'StringValue',
                    'loc' => 
                    array (
                      'start' => 1950,
                      'end' => 1968,
                    ),
                    'value' => 'Changed to name!',
                    'block' => false,
                  ),
                  'name' => 
                  array (
                    'kind' => 'Name',
                    'loc' => 
                    array (
                      'start' => 1942,
                      'end' => 1948,
                    ),
                    'value' => 'reason',
                  ),
                ),
              ),
            ),
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1973,
            'end' => 1985,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1973,
              'end' => 1977,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 1979,
              'end' => 1985,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 1979,
                'end' => 1985,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 1989,
            'end' => 2008,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 1989,
              'end' => 2000,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2002,
              'end' => 2008,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2002,
                'end' => 2008,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2012,
            'end' => 2027,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2012,
              'end' => 2019,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2021,
              'end' => 2027,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2021,
                'end' => 2027,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2031,
            'end' => 2041,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2031,
              'end' => 2035,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2037,
              'end' => 2041,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2037,
                'end' => 2041,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2045,
            'end' => 2060,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2045,
              'end' => 2055,
            ),
            'value' => 'sort_order',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2057,
              'end' => 2060,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2057,
                'end' => 2060,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    18 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2067,
        'end' => 2235,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2072,
          'end' => 2082,
        ),
        'value' => 'PageResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2088,
            'end' => 2103,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2088,
              'end' => 2095,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 2097,
              'end' => 2103,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 2098,
                'end' => 2102,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 2098,
                  'end' => 2102,
                ),
                'value' => 'Page',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2107,
            'end' => 2121,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2107,
              'end' => 2112,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2114,
              'end' => 2121,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2114,
                'end' => 2121,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2125,
            'end' => 2138,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2125,
              'end' => 2129,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2131,
              'end' => 2138,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2131,
                'end' => 2138,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2142,
            'end' => 2153,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2142,
              'end' => 2148,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2150,
              'end' => 2153,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2150,
                'end' => 2153,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2157,
            'end' => 2178,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2157,
              'end' => 2173,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2175,
              'end' => 2178,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2175,
                'end' => 2178,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2182,
            'end' => 2191,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2182,
              'end' => 2186,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2188,
              'end' => 2191,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2188,
                'end' => 2191,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2195,
            'end' => 2210,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2195,
              'end' => 2205,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2207,
              'end' => 2210,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2207,
                'end' => 2210,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2214,
            'end' => 2232,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2214,
              'end' => 2227,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2229,
              'end' => 2232,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2229,
                'end' => 2232,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    19 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2239,
        'end' => 2312,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2244,
          'end' => 2260,
        ),
        'value' => 'postReviewResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2266,
            'end' => 2287,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2266,
              'end' => 2273,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 2275,
              'end' => 2287,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 2276,
                'end' => 2286,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 2276,
                  'end' => 2286,
                ),
                'value' => 'postReview',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2291,
            'end' => 2309,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2291,
              'end' => 2304,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2306,
              'end' => 2309,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2306,
                'end' => 2309,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    20 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2316,
        'end' => 2664,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2321,
          'end' => 2325,
        ),
        'value' => 'Post',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2331,
            'end' => 2337,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2331,
              'end' => 2333,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2335,
              'end' => 2337,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2335,
                'end' => 2337,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2341,
            'end' => 2394,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2341,
              'end' => 2346,
            ),
            'value' => 'title',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2348,
              'end' => 2354,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2348,
                'end' => 2354,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
            0 => 
            array (
              'kind' => 'Directive',
              'loc' => 
              array (
                'start' => 2355,
                'end' => 2394,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 2356,
                  'end' => 2366,
                ),
                'value' => 'deprecated',
              ),
              'arguments' => 
              array (
                0 => 
                array (
                  'kind' => 'Argument',
                  'loc' => 
                  array (
                    'start' => 2367,
                    'end' => 2393,
                  ),
                  'value' => 
                  array (
                    'kind' => 'StringValue',
                    'loc' => 
                    array (
                      'start' => 2375,
                      'end' => 2393,
                    ),
                    'value' => 'Changed to name!',
                    'block' => false,
                  ),
                  'name' => 
                  array (
                    'kind' => 'Name',
                    'loc' => 
                    array (
                      'start' => 2367,
                      'end' => 2373,
                    ),
                    'value' => 'reason',
                  ),
                ),
              ),
            ),
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2398,
            'end' => 2410,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2398,
              'end' => 2402,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2404,
              'end' => 2410,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2404,
                'end' => 2410,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2414,
            'end' => 2438,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2414,
              'end' => 2430,
            ),
            'value' => 'shortDescription',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2432,
              'end' => 2438,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2432,
                'end' => 2438,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2442,
            'end' => 2461,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2442,
              'end' => 2453,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2455,
              'end' => 2461,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2455,
                'end' => 2461,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2465,
            'end' => 2478,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2465,
              'end' => 2470,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2472,
              'end' => 2478,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2472,
                'end' => 2478,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2482,
            'end' => 2499,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2482,
              'end' => 2491,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2493,
              'end' => 2499,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2493,
                'end' => 2499,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2503,
            'end' => 2518,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2503,
              'end' => 2510,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2512,
              'end' => 2518,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2512,
                'end' => 2518,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2522,
            'end' => 2535,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2522,
              'end' => 2528,
            ),
            'value' => 'rating',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2530,
              'end' => 2535,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2530,
                'end' => 2535,
              ),
              'value' => 'Float',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2539,
            'end' => 2564,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2539,
              'end' => 2546,
            ),
            'value' => 'reviews',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2548,
              'end' => 2564,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2548,
                'end' => 2564,
              ),
              'value' => 'postReviewResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        10 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2568,
            'end' => 2594,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2568,
              'end' => 2578,
            ),
            'value' => 'categories',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 2580,
              'end' => 2594,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 2581,
                'end' => 2593,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 2581,
                  'end' => 2593,
                ),
                'value' => 'categoryBlog',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        11 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2598,
            'end' => 2619,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2598,
              'end' => 2611,
            ),
            'value' => 'datePublished',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2613,
              'end' => 2619,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2613,
                'end' => 2619,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        12 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2623,
            'end' => 2633,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2623,
              'end' => 2627,
            ),
            'value' => 'next',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2629,
              'end' => 2633,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2629,
                'end' => 2633,
              ),
              'value' => 'Post',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        13 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2637,
            'end' => 2647,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2637,
              'end' => 2641,
            ),
            'value' => 'prev',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2643,
              'end' => 2647,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2643,
                'end' => 2647,
              ),
              'value' => 'Post',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        14 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2651,
            'end' => 2661,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2651,
              'end' => 2655,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2657,
              'end' => 2661,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2657,
                'end' => 2661,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    21 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2668,
        'end' => 2836,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2673,
          'end' => 2683,
        ),
        'value' => 'PostResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2689,
            'end' => 2704,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2689,
              'end' => 2696,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 2698,
              'end' => 2704,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 2699,
                'end' => 2703,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 2699,
                  'end' => 2703,
                ),
                'value' => 'Post',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2708,
            'end' => 2722,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2708,
              'end' => 2713,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2715,
              'end' => 2722,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2715,
                'end' => 2722,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2726,
            'end' => 2739,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2726,
              'end' => 2730,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2732,
              'end' => 2739,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2732,
                'end' => 2739,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2743,
            'end' => 2754,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2743,
              'end' => 2749,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2751,
              'end' => 2754,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2751,
                'end' => 2754,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2758,
            'end' => 2779,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2758,
              'end' => 2774,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2776,
              'end' => 2779,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2776,
                'end' => 2779,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2783,
            'end' => 2792,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2783,
              'end' => 2787,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2789,
              'end' => 2792,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2789,
                'end' => 2792,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2796,
            'end' => 2811,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2796,
              'end' => 2806,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2808,
              'end' => 2811,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2808,
                'end' => 2811,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2815,
            'end' => 2833,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2815,
              'end' => 2828,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2830,
              'end' => 2833,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2830,
                'end' => 2833,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    22 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2840,
        'end' => 2960,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2845,
          'end' => 2855,
        ),
        'value' => 'postReview',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2861,
            'end' => 2875,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2861,
              'end' => 2867,
            ),
            'value' => 'author',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2869,
              'end' => 2875,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2869,
                'end' => 2875,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2879,
            'end' => 2899,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2879,
              'end' => 2891,
            ),
            'value' => 'author_email',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2893,
              'end' => 2899,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2893,
                'end' => 2899,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2903,
            'end' => 2918,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2903,
              'end' => 2910,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2912,
              'end' => 2918,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2912,
                'end' => 2918,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2922,
            'end' => 2940,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2922,
              'end' => 2932,
            ),
            'value' => 'created_at',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2934,
              'end' => 2940,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2934,
                'end' => 2940,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2944,
            'end' => 2957,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2944,
              'end' => 2950,
            ),
            'value' => 'rating',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2952,
              'end' => 2957,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2952,
                'end' => 2957,
              ),
              'value' => 'Float',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    23 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 2964,
        'end' => 3011,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 2969,
          'end' => 2976,
        ),
        'value' => 'Country',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2984,
            'end' => 2990,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2984,
              'end' => 2986,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 2988,
              'end' => 2990,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 2988,
                'end' => 2990,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 2996,
            'end' => 3008,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 2996,
              'end' => 3000,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3002,
              'end' => 3008,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3002,
                'end' => 3008,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    24 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3013,
        'end' => 3080,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3018,
          'end' => 3022,
        ),
        'value' => 'Zone',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3030,
            'end' => 3036,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3030,
              'end' => 3032,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3034,
              'end' => 3036,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3034,
                'end' => 3036,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3042,
            'end' => 3054,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3042,
              'end' => 3046,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3048,
              'end' => 3054,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3048,
                'end' => 3054,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3060,
            'end' => 3077,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3060,
              'end' => 3069,
            ),
            'value' => 'countryId',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3071,
              'end' => 3077,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3071,
                'end' => 3077,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    25 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3084,
        'end' => 3559,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3089,
          'end' => 3096,
        ),
        'value' => 'Product',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3102,
            'end' => 3137,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3102,
              'end' => 3110,
            ),
            'value' => 'products',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 3111,
                'end' => 3125,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3111,
                  'end' => 3116,
                ),
                'value' => 'limit',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 3118,
                  'end' => 3121,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 3118,
                    'end' => 3121,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 3124,
                  'end' => 3125,
                ),
                'value' => '3',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3128,
              'end' => 3137,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3129,
                'end' => 3136,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3129,
                  'end' => 3136,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3141,
            'end' => 3147,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3141,
              'end' => 3143,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3145,
              'end' => 3147,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3145,
                'end' => 3147,
              ),
              'value' => 'ID',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3151,
            'end' => 3164,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3151,
              'end' => 3156,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3158,
              'end' => 3164,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3158,
                'end' => 3164,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3168,
            'end' => 3185,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3168,
              'end' => 3177,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3179,
              'end' => 3185,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3179,
                'end' => 3185,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3189,
            'end' => 3205,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3189,
              'end' => 3197,
            ),
            'value' => 'imageBig',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3199,
              'end' => 3205,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3199,
                'end' => 3205,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3209,
            'end' => 3221,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3209,
              'end' => 3213,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3215,
              'end' => 3221,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3215,
                'end' => 3221,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3225,
            'end' => 3249,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3225,
              'end' => 3241,
            ),
            'value' => 'shortDescription',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3243,
              'end' => 3249,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3243,
                'end' => 3249,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3253,
            'end' => 3272,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3253,
              'end' => 3264,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3266,
              'end' => 3272,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3266,
                'end' => 3272,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3276,
            'end' => 3289,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3276,
              'end' => 3281,
            ),
            'value' => 'model',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3283,
              'end' => 3289,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3283,
                'end' => 3289,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3293,
            'end' => 3306,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3293,
              'end' => 3298,
            ),
            'value' => 'price',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3300,
              'end' => 3306,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3300,
                'end' => 3306,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        10 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3310,
            'end' => 3325,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3310,
              'end' => 3317,
            ),
            'value' => 'special',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3319,
              'end' => 3325,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3319,
                'end' => 3325,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        11 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3329,
            'end' => 3340,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3329,
              'end' => 3332,
            ),
            'value' => 'tax',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3334,
              'end' => 3340,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3334,
                'end' => 3340,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        12 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3344,
            'end' => 3356,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3344,
              'end' => 3351,
            ),
            'value' => 'minimum',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3353,
              'end' => 3356,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3353,
                'end' => 3356,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        13 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3360,
            'end' => 3374,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3360,
              'end' => 3365,
            ),
            'value' => 'stock',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3367,
              'end' => 3374,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3367,
                'end' => 3374,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        14 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3378,
            'end' => 3391,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3378,
              'end' => 3384,
            ),
            'value' => 'rating',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3386,
              'end' => 3391,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3386,
                'end' => 3391,
              ),
              'value' => 'Float',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        15 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3395,
            'end' => 3425,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3395,
              'end' => 3405,
            ),
            'value' => 'attributes',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3407,
              'end' => 3425,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3408,
                'end' => 3424,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3408,
                  'end' => 3424,
                ),
                'value' => 'productAttribute',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        16 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3429,
            'end' => 3453,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3429,
              'end' => 3436,
            ),
            'value' => 'reviews',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3438,
              'end' => 3453,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3439,
                'end' => 3452,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3439,
                  'end' => 3452,
                ),
                'value' => 'productReview',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        17 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3457,
            'end' => 3481,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3457,
              'end' => 3464,
            ),
            'value' => 'options',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3466,
              'end' => 3481,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3467,
                'end' => 3480,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3467,
                  'end' => 3480,
                ),
                'value' => 'productOption',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        18 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3485,
            'end' => 3523,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3485,
              'end' => 3491,
            ),
            'value' => 'images',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 3492,
                'end' => 3506,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3492,
                  'end' => 3497,
                ),
                'value' => 'limit',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 3499,
                  'end' => 3502,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 3499,
                    'end' => 3502,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 3505,
                  'end' => 3506,
                ),
                'value' => '3',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3509,
              'end' => 3523,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3510,
                'end' => 3522,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3510,
                  'end' => 3522,
                ),
                'value' => 'productImage',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        19 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3527,
            'end' => 3542,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3527,
              'end' => 3534,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3536,
              'end' => 3542,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3536,
                'end' => 3542,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        20 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3546,
            'end' => 3556,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3546,
              'end' => 3550,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3552,
              'end' => 3556,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3552,
                'end' => 3556,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    26 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3563,
        'end' => 3626,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3568,
          'end' => 3584,
        ),
        'value' => 'productAttribute',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3590,
            'end' => 3602,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3590,
              'end' => 3594,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3596,
              'end' => 3602,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3596,
                'end' => 3602,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3606,
            'end' => 3623,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3606,
              'end' => 3613,
            ),
            'value' => 'options',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3615,
              'end' => 3623,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3616,
                'end' => 3622,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3616,
                  'end' => 3622,
                ),
                'value' => 'String',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    27 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3630,
        'end' => 3710,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3635,
          'end' => 3647,
        ),
        'value' => 'productImage',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3653,
            'end' => 3666,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3653,
              'end' => 3658,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3660,
              'end' => 3666,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3660,
                'end' => 3666,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3670,
            'end' => 3687,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3670,
              'end' => 3679,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3681,
              'end' => 3687,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3681,
                'end' => 3687,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3691,
            'end' => 3707,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3691,
              'end' => 3699,
            ),
            'value' => 'imageBig',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3701,
              'end' => 3707,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3701,
                'end' => 3707,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    28 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3714,
        'end' => 3808,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3719,
          'end' => 3732,
        ),
        'value' => 'productOption',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3738,
            'end' => 3748,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3738,
              'end' => 3740,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3742,
              'end' => 3748,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3742,
                'end' => 3748,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3752,
            'end' => 3764,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3752,
              'end' => 3756,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3758,
              'end' => 3764,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3758,
                'end' => 3764,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3768,
            'end' => 3780,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3768,
              'end' => 3772,
            ),
            'value' => 'type',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3774,
              'end' => 3780,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3774,
                'end' => 3780,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3784,
            'end' => 3805,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3784,
              'end' => 3790,
            ),
            'value' => 'values',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3792,
              'end' => 3805,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3793,
                'end' => 3804,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3793,
                  'end' => 3804,
                ),
                'value' => 'OptionValue',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    29 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3812,
        'end' => 3986,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3817,
          'end' => 3830,
        ),
        'value' => 'ProductResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3836,
            'end' => 3854,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3836,
              'end' => 3843,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 3845,
              'end' => 3854,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 3846,
                'end' => 3853,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 3846,
                  'end' => 3853,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3858,
            'end' => 3872,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3858,
              'end' => 3863,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3865,
              'end' => 3872,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3865,
                'end' => 3872,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3876,
            'end' => 3889,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3876,
              'end' => 3880,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3882,
              'end' => 3889,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3882,
                'end' => 3889,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3893,
            'end' => 3904,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3893,
              'end' => 3899,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3901,
              'end' => 3904,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3901,
                'end' => 3904,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3908,
            'end' => 3929,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3908,
              'end' => 3924,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3926,
              'end' => 3929,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3926,
                'end' => 3929,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3933,
            'end' => 3942,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3933,
              'end' => 3937,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3939,
              'end' => 3942,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3939,
                'end' => 3942,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3946,
            'end' => 3961,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3946,
              'end' => 3956,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3958,
              'end' => 3961,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3958,
                'end' => 3961,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 3965,
            'end' => 3983,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 3965,
              'end' => 3978,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 3980,
              'end' => 3983,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 3980,
                'end' => 3983,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    30 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 3988,
        'end' => 4164,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 3993,
          'end' => 4008,
        ),
        'value' => 'CountriesResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4014,
            'end' => 4032,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4014,
              'end' => 4021,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 4023,
              'end' => 4032,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 4024,
                'end' => 4031,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 4024,
                  'end' => 4031,
                ),
                'value' => 'Country',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4036,
            'end' => 4050,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4036,
              'end' => 4041,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4043,
              'end' => 4050,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4043,
                'end' => 4050,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4054,
            'end' => 4067,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4054,
              'end' => 4058,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4060,
              'end' => 4067,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4060,
                'end' => 4067,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4071,
            'end' => 4082,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4071,
              'end' => 4077,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4079,
              'end' => 4082,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4079,
                'end' => 4082,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4086,
            'end' => 4107,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4086,
              'end' => 4102,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4104,
              'end' => 4107,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4104,
                'end' => 4107,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4111,
            'end' => 4120,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4111,
              'end' => 4115,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4117,
              'end' => 4120,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4117,
                'end' => 4120,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4124,
            'end' => 4139,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4124,
              'end' => 4134,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4136,
              'end' => 4139,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4136,
                'end' => 4139,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4143,
            'end' => 4161,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4143,
              'end' => 4156,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4158,
              'end' => 4161,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4158,
                'end' => 4161,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    31 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4166,
        'end' => 4335,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4171,
          'end' => 4182,
        ),
        'value' => 'ZonesResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4188,
            'end' => 4203,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4188,
              'end' => 4195,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 4197,
              'end' => 4203,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 4198,
                'end' => 4202,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 4198,
                  'end' => 4202,
                ),
                'value' => 'Zone',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4207,
            'end' => 4221,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4207,
              'end' => 4212,
            ),
            'value' => 'first',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4214,
              'end' => 4221,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4214,
                'end' => 4221,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4225,
            'end' => 4238,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4225,
              'end' => 4229,
            ),
            'value' => 'last',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4231,
              'end' => 4238,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4231,
                'end' => 4238,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4242,
            'end' => 4253,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4242,
              'end' => 4248,
            ),
            'value' => 'number',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4250,
              'end' => 4253,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4250,
                'end' => 4253,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4257,
            'end' => 4278,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4257,
              'end' => 4273,
            ),
            'value' => 'numberOfElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4275,
              'end' => 4278,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4275,
                'end' => 4278,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4282,
            'end' => 4291,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4282,
              'end' => 4286,
            ),
            'value' => 'size',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4288,
              'end' => 4291,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4288,
                'end' => 4291,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4295,
            'end' => 4310,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4295,
              'end' => 4305,
            ),
            'value' => 'totalPages',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4307,
              'end' => 4310,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4307,
                'end' => 4310,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4314,
            'end' => 4332,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4314,
              'end' => 4327,
            ),
            'value' => 'totalElements',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4329,
              'end' => 4332,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4329,
                'end' => 4332,
              ),
              'value' => 'Int',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    32 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4339,
        'end' => 4462,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4344,
          'end' => 4357,
        ),
        'value' => 'productReview',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4363,
            'end' => 4377,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4363,
              'end' => 4369,
            ),
            'value' => 'author',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4371,
              'end' => 4377,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4371,
                'end' => 4377,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4381,
            'end' => 4401,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4381,
              'end' => 4393,
            ),
            'value' => 'author_email',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4395,
              'end' => 4401,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4395,
                'end' => 4401,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4405,
            'end' => 4420,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4405,
              'end' => 4412,
            ),
            'value' => 'content',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4414,
              'end' => 4420,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4414,
                'end' => 4420,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4424,
            'end' => 4442,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4424,
              'end' => 4434,
            ),
            'value' => 'created_at',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4436,
              'end' => 4442,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4436,
                'end' => 4442,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4446,
            'end' => 4459,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4446,
              'end' => 4452,
            ),
            'value' => 'rating',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4454,
              'end' => 4459,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4454,
                'end' => 4459,
              ),
              'value' => 'Float',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    33 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4466,
        'end' => 4510,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4471,
          'end' => 4484,
        ),
        'value' => 'ContactResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4492,
            'end' => 4507,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4492,
              'end' => 4498,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4500,
              'end' => 4507,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4500,
                'end' => 4507,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    34 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4514,
        'end' => 4695,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4519,
          'end' => 4527,
        ),
        'value' => 'Location',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4535,
            'end' => 4548,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4535,
              'end' => 4540,
            ),
            'value' => 'image',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4542,
              'end' => 4548,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4542,
                'end' => 4548,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4554,
            'end' => 4571,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4554,
              'end' => 4563,
            ),
            'value' => 'imageLazy',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4565,
              'end' => 4571,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4565,
                'end' => 4571,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4577,
            'end' => 4592,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4577,
              'end' => 4584,
            ),
            'value' => 'address',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4586,
              'end' => 4592,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4586,
                'end' => 4592,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4598,
            'end' => 4613,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4598,
              'end' => 4605,
            ),
            'value' => 'geocode',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4607,
              'end' => 4613,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4607,
                'end' => 4613,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4619,
            'end' => 4636,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4619,
              'end' => 4628,
            ),
            'value' => 'telephone',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4630,
              'end' => 4636,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4630,
                'end' => 4636,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4642,
            'end' => 4653,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4642,
              'end' => 4645,
            ),
            'value' => 'fax',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4647,
              'end' => 4653,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4647,
                'end' => 4653,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4659,
            'end' => 4671,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4659,
              'end' => 4663,
            ),
            'value' => 'open',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4665,
              'end' => 4671,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4665,
                'end' => 4671,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4677,
            'end' => 4692,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4677,
              'end' => 4684,
            ),
            'value' => 'comment',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4686,
              'end' => 4692,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4686,
                'end' => 4692,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    35 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4699,
        'end' => 4902,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4704,
          'end' => 4711,
        ),
        'value' => 'Contact',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4719,
            'end' => 4740,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4719,
              'end' => 4728,
            ),
            'value' => 'locations',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 4730,
              'end' => 4740,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 4731,
                'end' => 4739,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 4731,
                  'end' => 4739,
                ),
                'value' => 'Location',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4746,
            'end' => 4759,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4746,
              'end' => 4751,
            ),
            'value' => 'store',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4753,
              'end' => 4759,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4753,
                'end' => 4759,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4765,
            'end' => 4780,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4765,
              'end' => 4772,
            ),
            'value' => 'address',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4774,
              'end' => 4780,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4774,
                'end' => 4780,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4786,
            'end' => 4799,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4786,
              'end' => 4791,
            ),
            'value' => 'email',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4793,
              'end' => 4799,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4793,
                'end' => 4799,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4805,
            'end' => 4820,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4805,
              'end' => 4812,
            ),
            'value' => 'geocode',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4814,
              'end' => 4820,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4814,
                'end' => 4820,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4826,
            'end' => 4843,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4826,
              'end' => 4835,
            ),
            'value' => 'telephone',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4837,
              'end' => 4843,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4837,
                'end' => 4843,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4849,
            'end' => 4860,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4849,
              'end' => 4852,
            ),
            'value' => 'fax',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4854,
              'end' => 4860,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4854,
                'end' => 4860,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4866,
            'end' => 4878,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4866,
              'end' => 4870,
            ),
            'value' => 'open',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4872,
              'end' => 4878,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4872,
                'end' => 4878,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4884,
            'end' => 4899,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4884,
              'end' => 4891,
            ),
            'value' => 'comment',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4893,
              'end' => 4899,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4893,
                'end' => 4899,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    36 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 4906,
        'end' => 5152,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 4911,
          'end' => 4925,
        ),
        'value' => 'AccountAddress',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4931,
            'end' => 4941,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4931,
              'end' => 4933,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4935,
              'end' => 4941,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4935,
                'end' => 4941,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4945,
            'end' => 4962,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4945,
              'end' => 4954,
            ),
            'value' => 'firstName',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4956,
              'end' => 4962,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4956,
                'end' => 4962,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4966,
            'end' => 4982,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4966,
              'end' => 4974,
            ),
            'value' => 'lastName',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4976,
              'end' => 4982,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4976,
                'end' => 4982,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 4986,
            'end' => 5001,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 4986,
              'end' => 4993,
            ),
            'value' => 'company',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 4995,
              'end' => 5001,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 4995,
                'end' => 5001,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5005,
            'end' => 5021,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5005,
              'end' => 5013,
            ),
            'value' => 'address1',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5015,
              'end' => 5021,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5015,
                'end' => 5021,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5025,
            'end' => 5041,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5025,
              'end' => 5033,
            ),
            'value' => 'address2',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5035,
              'end' => 5041,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5035,
                'end' => 5041,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5045,
            'end' => 5059,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5045,
              'end' => 5051,
            ),
            'value' => 'zoneId',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5053,
              'end' => 5059,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5053,
                'end' => 5059,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5063,
            'end' => 5073,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5063,
              'end' => 5067,
            ),
            'value' => 'zone',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5069,
              'end' => 5073,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5069,
                'end' => 5073,
              ),
              'value' => 'Zone',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5077,
            'end' => 5094,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5077,
              'end' => 5086,
            ),
            'value' => 'countryId',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5088,
              'end' => 5094,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5088,
                'end' => 5094,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5098,
            'end' => 5114,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5098,
              'end' => 5105,
            ),
            'value' => 'country',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5107,
              'end' => 5114,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5107,
                'end' => 5114,
              ),
              'value' => 'Country',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        10 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5118,
            'end' => 5130,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5118,
              'end' => 5122,
            ),
            'value' => 'city',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5124,
              'end' => 5130,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5124,
                'end' => 5130,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        11 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5134,
            'end' => 5149,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5134,
              'end' => 5141,
            ),
            'value' => 'zipcode',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5143,
              'end' => 5149,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5143,
                'end' => 5149,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    37 => 
    array (
      'kind' => 'InputObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5156,
        'end' => 5360,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5162,
          'end' => 5181,
        ),
        'value' => 'AccountAddressInput',
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5187,
            'end' => 5204,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5187,
              'end' => 5196,
            ),
            'value' => 'firstName',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5198,
              'end' => 5204,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5198,
                'end' => 5204,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5208,
            'end' => 5224,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5208,
              'end' => 5216,
            ),
            'value' => 'lastName',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5218,
              'end' => 5224,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5218,
                'end' => 5224,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5228,
            'end' => 5243,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5228,
              'end' => 5235,
            ),
            'value' => 'company',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5237,
              'end' => 5243,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5237,
                'end' => 5243,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5247,
            'end' => 5263,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5247,
              'end' => 5255,
            ),
            'value' => 'address1',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5257,
              'end' => 5263,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5257,
                'end' => 5263,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5267,
            'end' => 5283,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5267,
              'end' => 5275,
            ),
            'value' => 'address2',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5277,
              'end' => 5283,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5277,
                'end' => 5283,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5287,
            'end' => 5299,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5287,
              'end' => 5291,
            ),
            'value' => 'city',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5293,
              'end' => 5299,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5293,
                'end' => 5299,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5303,
            'end' => 5320,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5303,
              'end' => 5312,
            ),
            'value' => 'countryId',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5314,
              'end' => 5320,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5314,
                'end' => 5320,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5324,
            'end' => 5338,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5324,
              'end' => 5330,
            ),
            'value' => 'zoneId',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5332,
              'end' => 5338,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5332,
                'end' => 5338,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'InputValueDefinition',
          'loc' => 
          array (
            'start' => 5342,
            'end' => 5357,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5342,
              'end' => 5349,
            ),
            'value' => 'zipcode',
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5351,
              'end' => 5357,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5351,
                'end' => 5357,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    38 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5364,
        'end' => 5400,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5369,
          'end' => 5379,
        ),
        'value' => 'FileResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5385,
            'end' => 5397,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5385,
              'end' => 5389,
            ),
            'value' => 'code',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5391,
              'end' => 5397,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5391,
                'end' => 5397,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    39 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5404,
        'end' => 5448,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5409,
          'end' => 5427,
        ),
        'value' => 'CheckoutLinkResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5433,
            'end' => 5445,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5433,
              'end' => 5437,
            ),
            'value' => 'link',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5439,
              'end' => 5445,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5439,
                'end' => 5445,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    40 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5452,
        'end' => 5531,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5457,
          'end' => 5461,
        ),
        'value' => 'Meta',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5469,
            'end' => 5482,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5469,
              'end' => 5474,
            ),
            'value' => 'title',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5476,
              'end' => 5482,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5476,
                'end' => 5482,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5488,
            'end' => 5507,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5488,
              'end' => 5499,
            ),
            'value' => 'description',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5501,
              'end' => 5507,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5501,
                'end' => 5507,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5513,
            'end' => 5528,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5513,
              'end' => 5520,
            ),
            'value' => 'keyword',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5522,
              'end' => 5528,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5522,
                'end' => 5528,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    41 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5535,
        'end' => 5571,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5540,
          'end' => 5550,
        ),
        'value' => 'HomeResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5558,
            'end' => 5568,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5558,
              'end' => 5562,
            ),
            'value' => 'meta',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5564,
              'end' => 5568,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5564,
                'end' => 5568,
              ),
              'value' => 'Meta',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    42 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5575,
        'end' => 5635,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5580,
          'end' => 5591,
        ),
        'value' => 'LoginResult',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5597,
            'end' => 5610,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5597,
              'end' => 5602,
            ),
            'value' => 'token',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5604,
              'end' => 5610,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5604,
                'end' => 5610,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5614,
            'end' => 5632,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5614,
              'end' => 5622,
            ),
            'value' => 'customer',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5624,
              'end' => 5632,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5624,
                'end' => 5632,
              ),
              'value' => 'Customer',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    43 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 5639,
        'end' => 6831,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 5644,
          'end' => 5660,
        ),
        'value' => 'RootMutationType',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5666,
            'end' => 5702,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5666,
              'end' => 5676,
            ),
            'value' => 'uploadFile',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5677,
                'end' => 5689,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5677,
                  'end' => 5681,
                ),
                'value' => 'file',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5683,
                  'end' => 5689,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5683,
                    'end' => 5689,
                  ),
                  'value' => 'Upload',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5692,
              'end' => 5702,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5692,
                'end' => 5702,
              ),
              'value' => 'FileResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5706,
            'end' => 5764,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5706,
              'end' => 5718,
            ),
            'value' => 'accountLogin',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5719,
                'end' => 5732,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5719,
                  'end' => 5724,
                ),
                'value' => 'email',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5726,
                  'end' => 5732,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5726,
                    'end' => 5732,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5734,
                'end' => 5750,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5734,
                  'end' => 5742,
                ),
                'value' => 'password',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5744,
                  'end' => 5750,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5744,
                    'end' => 5750,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5753,
              'end' => 5764,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5753,
                'end' => 5764,
              ),
              'value' => 'LoginResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5768,
            'end' => 5795,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5768,
              'end' => 5781,
            ),
            'value' => 'accountLogout',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5783,
              'end' => 5795,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5783,
                'end' => 5795,
              ),
              'value' => 'LogoutResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5799,
            'end' => 5849,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5799,
              'end' => 5814,
            ),
            'value' => 'accountRegister',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5815,
                'end' => 5838,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5815,
                  'end' => 5823,
                ),
                'value' => 'customer',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5825,
                  'end' => 5838,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5825,
                    'end' => 5838,
                  ),
                  'value' => 'CustomerInput',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5841,
              'end' => 5849,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5841,
                'end' => 5849,
              ),
              'value' => 'Customer',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5853,
            'end' => 5899,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5853,
              'end' => 5864,
            ),
            'value' => 'accountEdit',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5865,
                'end' => 5888,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5865,
                  'end' => 5873,
                ),
                'value' => 'customer',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5875,
                  'end' => 5888,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5875,
                    'end' => 5888,
                  ),
                  'value' => 'CustomerInput',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5891,
              'end' => 5899,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5891,
                'end' => 5899,
              ),
              'value' => 'Customer',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5903,
            'end' => 5950,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5903,
              'end' => 5922,
            ),
            'value' => 'accountEditPassword',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5923,
                'end' => 5939,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5923,
                  'end' => 5931,
                ),
                'value' => 'password',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5933,
                  'end' => 5939,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5933,
                    'end' => 5939,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 5942,
              'end' => 5950,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 5942,
                'end' => 5950,
              ),
              'value' => 'Customer',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 5954,
            'end' => 6017,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 5954,
              'end' => 5971,
            ),
            'value' => 'accountAddAddress',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 5972,
                'end' => 6000,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 5972,
                  'end' => 5979,
                ),
                'value' => 'address',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 5981,
                  'end' => 6000,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 5981,
                    'end' => 6000,
                  ),
                  'value' => 'AccountAddressInput',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6003,
              'end' => 6017,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6003,
                'end' => 6017,
              ),
              'value' => 'AccountAddress',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6021,
            'end' => 6097,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6021,
              'end' => 6039,
            ),
            'value' => 'accountEditAddress',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6040,
                'end' => 6050,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6040,
                  'end' => 6042,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6044,
                  'end' => 6050,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6044,
                    'end' => 6050,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6052,
                'end' => 6080,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6052,
                  'end' => 6059,
                ),
                'value' => 'address',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6061,
                  'end' => 6080,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6061,
                    'end' => 6080,
                  ),
                  'value' => 'AccountAddressInput',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6083,
              'end' => 6097,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6083,
                'end' => 6097,
              ),
              'value' => 'AccountAddress',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6101,
            'end' => 6182,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6101,
              'end' => 6121,
            ),
            'value' => 'accountRemoveAddress',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6122,
                'end' => 6132,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6122,
                  'end' => 6124,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6126,
                  'end' => 6132,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6126,
                    'end' => 6132,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6134,
                'end' => 6147,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6134,
                  'end' => 6138,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6140,
                  'end' => 6143,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6140,
                    'end' => 6143,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6146,
                  'end' => 6147,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6149,
                'end' => 6163,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6149,
                  'end' => 6153,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6155,
                  'end' => 6158,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6155,
                    'end' => 6158,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6161,
                  'end' => 6163,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6166,
              'end' => 6182,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6167,
                'end' => 6181,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6167,
                  'end' => 6181,
                ),
                'value' => 'AccountAddress',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6186,
            'end' => 6269,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6186,
              'end' => 6203,
            ),
            'value' => 'addBlogPostReview',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6204,
                'end' => 6214,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6204,
                  'end' => 6206,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6208,
                  'end' => 6214,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6208,
                    'end' => 6214,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6216,
                'end' => 6229,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6216,
                  'end' => 6222,
                ),
                'value' => 'rating',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6224,
                  'end' => 6229,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6224,
                    'end' => 6229,
                  ),
                  'value' => 'Float',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6231,
                'end' => 6245,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6231,
                  'end' => 6237,
                ),
                'value' => 'author',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6239,
                  'end' => 6245,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6239,
                    'end' => 6245,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6247,
                'end' => 6262,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6247,
                  'end' => 6254,
                ),
                'value' => 'content',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6256,
                  'end' => 6262,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6256,
                    'end' => 6262,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6265,
              'end' => 6269,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6265,
                'end' => 6269,
              ),
              'value' => 'Post',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        10 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6273,
            'end' => 6347,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6273,
              'end' => 6282,
            ),
            'value' => 'addToCart',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6283,
                'end' => 6293,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6283,
                  'end' => 6285,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6287,
                  'end' => 6293,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6287,
                    'end' => 6293,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6295,
                'end' => 6312,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6295,
                  'end' => 6303,
                ),
                'value' => 'quantity',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6305,
                  'end' => 6308,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6305,
                    'end' => 6308,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6311,
                  'end' => 6312,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6314,
                'end' => 6340,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6314,
                  'end' => 6321,
                ),
                'value' => 'options',
              ),
              'type' => 
              array (
                'kind' => 'ListType',
                'loc' => 
                array (
                  'start' => 6323,
                  'end' => 6335,
                ),
                'type' => 
                array (
                  'kind' => 'NamedType',
                  'loc' => 
                  array (
                    'start' => 6324,
                    'end' => 6334,
                  ),
                  'name' => 
                  array (
                    'kind' => 'Name',
                    'loc' => 
                    array (
                      'start' => 6324,
                      'end' => 6334,
                    ),
                    'value' => 'CartOption',
                  ),
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'ListValue',
                'loc' => 
                array (
                  'start' => 6338,
                  'end' => 6340,
                ),
                'values' => 
                array (
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6343,
              'end' => 6347,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6343,
                'end' => 6347,
              ),
              'value' => 'Cart',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        11 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6351,
            'end' => 6399,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6351,
              'end' => 6361,
            ),
            'value' => 'updateCart',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6362,
                'end' => 6373,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6362,
                  'end' => 6365,
                ),
                'value' => 'key',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6367,
                  'end' => 6373,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6367,
                    'end' => 6373,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6375,
                'end' => 6392,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6375,
                  'end' => 6383,
                ),
                'value' => 'quantity',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6385,
                  'end' => 6388,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6385,
                    'end' => 6388,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6391,
                  'end' => 6392,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6395,
              'end' => 6399,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6395,
                'end' => 6399,
              ),
              'value' => 'Cart',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        12 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6403,
            'end' => 6432,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6403,
              'end' => 6413,
            ),
            'value' => 'removeCart',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6414,
                'end' => 6425,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6414,
                  'end' => 6417,
                ),
                'value' => 'key',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6419,
                  'end' => 6425,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6419,
                    'end' => 6425,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6428,
              'end' => 6432,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6428,
                'end' => 6432,
              ),
              'value' => 'Cart',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        13 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6436,
            'end' => 6468,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6436,
              'end' => 6448,
            ),
            'value' => 'addToCompare',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6449,
                'end' => 6456,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6449,
                  'end' => 6451,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6453,
                  'end' => 6456,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6453,
                    'end' => 6456,
                  ),
                  'value' => 'Int',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6459,
              'end' => 6468,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6460,
                'end' => 6467,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6460,
                  'end' => 6467,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        14 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6472,
            'end' => 6508,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6472,
              'end' => 6485,
            ),
            'value' => 'removeCompare',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6486,
                'end' => 6496,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6486,
                  'end' => 6488,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6490,
                  'end' => 6496,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6490,
                    'end' => 6496,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6499,
              'end' => 6508,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6500,
                'end' => 6507,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6500,
                  'end' => 6507,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        15 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6512,
            'end' => 6550,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6512,
              'end' => 6524,
            ),
            'value' => 'editCurrency',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6525,
                'end' => 6537,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6525,
                  'end' => 6529,
                ),
                'value' => 'code',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6531,
                  'end' => 6537,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6531,
                    'end' => 6537,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6540,
              'end' => 6550,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6541,
                'end' => 6549,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6541,
                  'end' => 6549,
                ),
                'value' => 'Currency',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        16 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6554,
            'end' => 6592,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6554,
              'end' => 6566,
            ),
            'value' => 'editLanguage',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6567,
                'end' => 6579,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6567,
                  'end' => 6571,
                ),
                'value' => 'code',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6573,
                  'end' => 6579,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6573,
                    'end' => 6579,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6582,
              'end' => 6592,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6583,
                'end' => 6591,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6583,
                  'end' => 6591,
                ),
                'value' => 'Language',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        17 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6596,
            'end' => 6674,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6596,
              'end' => 6605,
            ),
            'value' => 'addReview',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6606,
                'end' => 6616,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6606,
                  'end' => 6608,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6610,
                  'end' => 6616,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6610,
                    'end' => 6616,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6618,
                'end' => 6631,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6618,
                  'end' => 6624,
                ),
                'value' => 'rating',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6626,
                  'end' => 6631,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6626,
                    'end' => 6631,
                  ),
                  'value' => 'Float',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6633,
                'end' => 6647,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6633,
                  'end' => 6639,
                ),
                'value' => 'author',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6641,
                  'end' => 6647,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6641,
                    'end' => 6647,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6649,
                'end' => 6664,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6649,
                  'end' => 6656,
                ),
                'value' => 'content',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6658,
                  'end' => 6664,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6658,
                    'end' => 6664,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6667,
              'end' => 6674,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6667,
                'end' => 6674,
              ),
              'value' => 'Product',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        18 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6678,
            'end' => 6711,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6678,
              'end' => 6691,
            ),
            'value' => 'addToWishlist',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6692,
                'end' => 6699,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6692,
                  'end' => 6694,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6696,
                  'end' => 6699,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6696,
                    'end' => 6699,
                  ),
                  'value' => 'Int',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6702,
              'end' => 6711,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6703,
                'end' => 6710,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6703,
                  'end' => 6710,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        19 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6715,
            'end' => 6752,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6715,
              'end' => 6729,
            ),
            'value' => 'removeWishlist',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6730,
                'end' => 6740,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6730,
                  'end' => 6732,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6734,
                  'end' => 6740,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6734,
                    'end' => 6740,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 6743,
              'end' => 6752,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 6744,
                'end' => 6751,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6744,
                  'end' => 6751,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        20 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6756,
            'end' => 6828,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6756,
              'end' => 6767,
            ),
            'value' => 'contactSend',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6768,
                'end' => 6780,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6768,
                  'end' => 6772,
                ),
                'value' => 'name',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6774,
                  'end' => 6780,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6774,
                    'end' => 6780,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6782,
                'end' => 6795,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6782,
                  'end' => 6787,
                ),
                'value' => 'email',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6789,
                  'end' => 6795,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6789,
                    'end' => 6795,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6797,
                'end' => 6812,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6797,
                  'end' => 6804,
                ),
                'value' => 'message',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6806,
                  'end' => 6812,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6806,
                    'end' => 6812,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6815,
              'end' => 6828,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6815,
                'end' => 6828,
              ),
              'value' => 'ContactResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    44 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 6835,
        'end' => 8471,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 6840,
          'end' => 6853,
        ),
        'value' => 'RootQueryType',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6859,
            'end' => 6875,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6859,
              'end' => 6863,
            ),
            'value' => 'home',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6865,
              'end' => 6875,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6865,
                'end' => 6875,
              ),
              'value' => 'HomeResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6879,
            'end' => 6898,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6879,
              'end' => 6883,
            ),
            'value' => 'zone',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6884,
                'end' => 6891,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6884,
                  'end' => 6886,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6888,
                  'end' => 6891,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6888,
                    'end' => 6891,
                  ),
                  'value' => 'Int',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 6894,
              'end' => 6898,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 6894,
                'end' => 6898,
              ),
              'value' => 'Zone',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 6902,
            'end' => 7037,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 6902,
              'end' => 6911,
            ),
            'value' => 'zonesList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6912,
                'end' => 6925,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6912,
                  'end' => 6916,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6918,
                  'end' => 6921,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6918,
                    'end' => 6921,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6924,
                  'end' => 6925,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6927,
                'end' => 6941,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6927,
                  'end' => 6931,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6933,
                  'end' => 6936,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6933,
                    'end' => 6936,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 6939,
                  'end' => 6941,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6943,
                'end' => 6957,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6943,
                  'end' => 6949,
                ),
                'value' => 'search',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6951,
                  'end' => 6957,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6951,
                    'end' => 6957,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6959,
                'end' => 6977,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6959,
                  'end' => 6969,
                ),
                'value' => 'country_id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6971,
                  'end' => 6977,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6971,
                    'end' => 6977,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 6979,
                'end' => 7000,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 6979,
                  'end' => 6983,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 6985,
                  'end' => 6991,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 6985,
                    'end' => 6991,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 6994,
                  'end' => 7000,
                ),
                'value' => 'name',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            5 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7002,
                'end' => 7023,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7002,
                  'end' => 7007,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7009,
                  'end' => 7015,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7009,
                    'end' => 7015,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7018,
                  'end' => 7023,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7026,
              'end' => 7037,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7026,
                'end' => 7037,
              ),
              'value' => 'ZonesResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7041,
            'end' => 7066,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7041,
              'end' => 7048,
            ),
            'value' => 'country',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7049,
                'end' => 7056,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7049,
                  'end' => 7051,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7053,
                  'end' => 7056,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7053,
                    'end' => 7056,
                  ),
                  'value' => 'Int',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7059,
              'end' => 7066,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7059,
                'end' => 7066,
              ),
              'value' => 'Country',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7070,
            'end' => 7193,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7070,
              'end' => 7083,
            ),
            'value' => 'countriesList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7084,
                'end' => 7097,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7084,
                  'end' => 7088,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7090,
                  'end' => 7093,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7090,
                    'end' => 7093,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7096,
                  'end' => 7097,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7099,
                'end' => 7113,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7099,
                  'end' => 7103,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7105,
                  'end' => 7108,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7105,
                    'end' => 7108,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7111,
                  'end' => 7113,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7115,
                'end' => 7129,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7115,
                  'end' => 7121,
                ),
                'value' => 'search',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7123,
                  'end' => 7129,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7123,
                    'end' => 7129,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7131,
                'end' => 7152,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7131,
                  'end' => 7135,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7137,
                  'end' => 7143,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7137,
                    'end' => 7143,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7146,
                  'end' => 7152,
                ),
                'value' => 'name',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7154,
                'end' => 7175,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7154,
                  'end' => 7159,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7161,
                  'end' => 7167,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7161,
                    'end' => 7167,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7170,
                  'end' => 7175,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7178,
              'end' => 7193,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7178,
                'end' => 7193,
              ),
              'value' => 'CountriesResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7197,
            'end' => 7235,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7197,
              'end' => 7209,
            ),
            'value' => 'categoryBlog',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7210,
                'end' => 7220,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7210,
                  'end' => 7212,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7214,
                  'end' => 7220,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7214,
                    'end' => 7220,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7223,
              'end' => 7235,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7223,
                'end' => 7235,
              ),
              'value' => 'categoryBlog',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7239,
            'end' => 7394,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7239,
              'end' => 7257,
            ),
            'value' => 'categoriesBlogList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7258,
                'end' => 7271,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7258,
                  'end' => 7262,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7264,
                  'end' => 7267,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7264,
                    'end' => 7267,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7270,
                  'end' => 7271,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7273,
                'end' => 7287,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7273,
                  'end' => 7277,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7279,
                  'end' => 7282,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7279,
                    'end' => 7282,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7285,
                  'end' => 7287,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7289,
                'end' => 7303,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7289,
                  'end' => 7295,
                ),
                'value' => 'filter',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7297,
                  'end' => 7303,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7297,
                    'end' => 7303,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7305,
                'end' => 7321,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7305,
                  'end' => 7311,
                ),
                'value' => 'parent',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7313,
                  'end' => 7316,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7313,
                    'end' => 7316,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7319,
                  'end' => 7321,
                ),
                'value' => '-1',
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7323,
                'end' => 7350,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7323,
                  'end' => 7327,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7329,
                  'end' => 7335,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7329,
                    'end' => 7335,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7338,
                  'end' => 7350,
                ),
                'value' => 'sort_order',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            5 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7352,
                'end' => 7373,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7352,
                  'end' => 7357,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7359,
                  'end' => 7365,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7359,
                    'end' => 7365,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7368,
                  'end' => 7373,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7376,
              'end' => 7394,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7376,
                'end' => 7394,
              ),
              'value' => 'categoryBlogResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        7 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7398,
            'end' => 7420,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7398,
              'end' => 7402,
            ),
            'value' => 'post',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7403,
                'end' => 7413,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7403,
                  'end' => 7405,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7407,
                  'end' => 7413,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7407,
                    'end' => 7413,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7416,
              'end' => 7420,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7416,
                'end' => 7420,
              ),
              'value' => 'Post',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        8 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7424,
            'end' => 7586,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7424,
              'end' => 7433,
            ),
            'value' => 'postsList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7434,
                'end' => 7447,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7434,
                  'end' => 7438,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7440,
                  'end' => 7443,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7440,
                    'end' => 7443,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7446,
                  'end' => 7447,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7449,
                'end' => 7463,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7449,
                  'end' => 7453,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7455,
                  'end' => 7458,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7455,
                    'end' => 7458,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7461,
                  'end' => 7463,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7465,
                'end' => 7479,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7465,
                  'end' => 7471,
                ),
                'value' => 'filter',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7473,
                  'end' => 7479,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7473,
                    'end' => 7479,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7481,
                'end' => 7495,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7481,
                  'end' => 7487,
                ),
                'value' => 'search',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7489,
                  'end' => 7495,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7489,
                    'end' => 7495,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7497,
                'end' => 7521,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7497,
                  'end' => 7508,
                ),
                'value' => 'category_id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7510,
                  'end' => 7516,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7510,
                    'end' => 7516,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7519,
                  'end' => 7521,
                ),
                'value' => '',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            5 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7523,
                'end' => 7550,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7523,
                  'end' => 7527,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7529,
                  'end' => 7535,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7529,
                    'end' => 7535,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7538,
                  'end' => 7550,
                ),
                'value' => 'sort_order',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            6 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7552,
                'end' => 7573,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7552,
                  'end' => 7557,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7559,
                  'end' => 7565,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7559,
                    'end' => 7565,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7568,
                  'end' => 7573,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7576,
              'end' => 7586,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7576,
                'end' => 7586,
              ),
              'value' => 'PostResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        9 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7590,
            'end' => 7600,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7590,
              'end' => 7594,
            ),
            'value' => 'cart',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7596,
              'end' => 7600,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7596,
                'end' => 7600,
              ),
              'value' => 'Cart',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        10 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7604,
            'end' => 7634,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7604,
              'end' => 7612,
            ),
            'value' => 'category',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7613,
                'end' => 7623,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7613,
                  'end' => 7615,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7617,
                  'end' => 7623,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7617,
                    'end' => 7623,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7626,
              'end' => 7634,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7626,
                'end' => 7634,
              ),
              'value' => 'Category',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        11 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7638,
            'end' => 7785,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7638,
              'end' => 7652,
            ),
            'value' => 'categoriesList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7653,
                'end' => 7666,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7653,
                  'end' => 7657,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7659,
                  'end' => 7662,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7659,
                    'end' => 7662,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7665,
                  'end' => 7666,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7668,
                'end' => 7682,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7668,
                  'end' => 7672,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7674,
                  'end' => 7677,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7674,
                    'end' => 7677,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7680,
                  'end' => 7682,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7684,
                'end' => 7698,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7684,
                  'end' => 7690,
                ),
                'value' => 'filter',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7692,
                  'end' => 7698,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7692,
                    'end' => 7698,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7700,
                'end' => 7716,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7700,
                  'end' => 7706,
                ),
                'value' => 'parent',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7708,
                  'end' => 7711,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7708,
                    'end' => 7711,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7714,
                  'end' => 7716,
                ),
                'value' => '-1',
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7718,
                'end' => 7745,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7718,
                  'end' => 7722,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7724,
                  'end' => 7730,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7724,
                    'end' => 7730,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7733,
                  'end' => 7745,
                ),
                'value' => 'sort_order',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            5 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7747,
                'end' => 7768,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7747,
                  'end' => 7752,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7754,
                  'end' => 7760,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7754,
                    'end' => 7760,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7763,
                  'end' => 7768,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7771,
              'end' => 7785,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7771,
                'end' => 7785,
              ),
              'value' => 'CategoryResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        12 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7789,
            'end' => 7807,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7789,
              'end' => 7796,
            ),
            'value' => 'compare',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 7798,
              'end' => 7807,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 7799,
                'end' => 7806,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7799,
                  'end' => 7806,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        13 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7811,
            'end' => 7831,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7811,
              'end' => 7819,
            ),
            'value' => 'currency',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 7821,
              'end' => 7831,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 7822,
                'end' => 7830,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7822,
                  'end' => 7830,
                ),
                'value' => 'Currency',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        14 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7835,
            'end' => 7855,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7835,
              'end' => 7843,
            ),
            'value' => 'language',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 7845,
              'end' => 7855,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 7846,
                'end' => 7854,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7846,
                  'end' => 7854,
                ),
                'value' => 'Language',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        15 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7859,
            'end' => 7881,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7859,
              'end' => 7863,
            ),
            'value' => 'page',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7864,
                'end' => 7874,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7864,
                  'end' => 7866,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7868,
                  'end' => 7874,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7868,
                    'end' => 7874,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 7877,
              'end' => 7881,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 7877,
                'end' => 7881,
              ),
              'value' => 'Page',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        16 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 7885,
            'end' => 8010,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 7885,
              'end' => 7894,
            ),
            'value' => 'pagesList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7895,
                'end' => 7908,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7895,
                  'end' => 7899,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7901,
                  'end' => 7904,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7901,
                    'end' => 7904,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7907,
                  'end' => 7908,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7910,
                'end' => 7924,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7910,
                  'end' => 7914,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7916,
                  'end' => 7919,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7916,
                    'end' => 7919,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 7922,
                  'end' => 7924,
                ),
                'value' => '10',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7926,
                'end' => 7945,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7926,
                  'end' => 7932,
                ),
                'value' => 'search',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7934,
                  'end' => 7940,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7934,
                    'end' => 7940,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7943,
                  'end' => 7945,
                ),
                'value' => '',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7947,
                'end' => 7974,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7947,
                  'end' => 7951,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7953,
                  'end' => 7959,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7953,
                    'end' => 7959,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7962,
                  'end' => 7974,
                ),
                'value' => 'sort_order',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 7976,
                'end' => 7997,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 7976,
                  'end' => 7981,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 7983,
                  'end' => 7989,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 7983,
                    'end' => 7989,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 7992,
                  'end' => 7997,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8000,
              'end' => 8010,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8000,
                'end' => 8010,
              ),
              'value' => 'PageResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        17 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8014,
            'end' => 8235,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8014,
              'end' => 8026,
            ),
            'value' => 'productsList',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8027,
                'end' => 8040,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8027,
                  'end' => 8031,
                ),
                'value' => 'page',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8033,
                  'end' => 8036,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8033,
                    'end' => 8036,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 8039,
                  'end' => 8040,
                ),
                'value' => '1',
              ),
              'directives' => 
              array (
              ),
            ),
            1 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8042,
                'end' => 8056,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8042,
                  'end' => 8046,
                ),
                'value' => 'size',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8048,
                  'end' => 8051,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8048,
                    'end' => 8051,
                  ),
                  'value' => 'Int',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'IntValue',
                'loc' => 
                array (
                  'start' => 8054,
                  'end' => 8056,
                ),
                'value' => '15',
              ),
              'directives' => 
              array (
              ),
            ),
            2 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8058,
                'end' => 8077,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8058,
                  'end' => 8064,
                ),
                'value' => 'filter',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8066,
                  'end' => 8072,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8066,
                    'end' => 8072,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 8075,
                  'end' => 8077,
                ),
                'value' => '',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            3 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8079,
                'end' => 8103,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8079,
                  'end' => 8086,
                ),
                'value' => 'special',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8088,
                  'end' => 8095,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8088,
                    'end' => 8095,
                  ),
                  'value' => 'Boolean',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'BooleanValue',
                'loc' => 
                array (
                  'start' => 8098,
                  'end' => 8103,
                ),
                'value' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            4 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8105,
                'end' => 8124,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8105,
                  'end' => 8111,
                ),
                'value' => 'search',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8113,
                  'end' => 8119,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8113,
                    'end' => 8119,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 8122,
                  'end' => 8124,
                ),
                'value' => '',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            5 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8126,
                'end' => 8141,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8126,
                  'end' => 8129,
                ),
                'value' => 'ids',
              ),
              'type' => 
              array (
                'kind' => 'ListType',
                'loc' => 
                array (
                  'start' => 8131,
                  'end' => 8136,
                ),
                'type' => 
                array (
                  'kind' => 'NamedType',
                  'loc' => 
                  array (
                    'start' => 8132,
                    'end' => 8135,
                  ),
                  'name' => 
                  array (
                    'kind' => 'Name',
                    'loc' => 
                    array (
                      'start' => 8132,
                      'end' => 8135,
                    ),
                    'value' => 'Int',
                  ),
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'ListValue',
                'loc' => 
                array (
                  'start' => 8139,
                  'end' => 8141,
                ),
                'values' => 
                array (
                ),
              ),
              'directives' => 
              array (
              ),
            ),
            6 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8143,
                'end' => 8167,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8143,
                  'end' => 8154,
                ),
                'value' => 'category_id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8156,
                  'end' => 8162,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8156,
                    'end' => 8162,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 8165,
                  'end' => 8167,
                ),
                'value' => '',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            7 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8169,
                'end' => 8196,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8169,
                  'end' => 8173,
                ),
                'value' => 'sort',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8175,
                  'end' => 8181,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8175,
                    'end' => 8181,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 8184,
                  'end' => 8196,
                ),
                'value' => 'sort_order',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
            8 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8198,
                'end' => 8219,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8198,
                  'end' => 8203,
                ),
                'value' => 'order',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8205,
                  'end' => 8211,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8205,
                    'end' => 8211,
                  ),
                  'value' => 'String',
                ),
              ),
              'defaultValue' => 
              array (
                'kind' => 'StringValue',
                'loc' => 
                array (
                  'start' => 8214,
                  'end' => 8219,
                ),
                'value' => 'ASC',
                'block' => false,
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8222,
              'end' => 8235,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8222,
                'end' => 8235,
              ),
              'value' => 'ProductResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        18 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8239,
            'end' => 8267,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8239,
              'end' => 8246,
            ),
            'value' => 'product',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8247,
                'end' => 8257,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8247,
                  'end' => 8249,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8251,
                  'end' => 8257,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8251,
                    'end' => 8257,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8260,
              'end' => 8267,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8260,
                'end' => 8267,
              ),
              'value' => 'Product',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        19 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8271,
            'end' => 8290,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8271,
              'end' => 8279,
            ),
            'value' => 'wishlist',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 8281,
              'end' => 8290,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 8282,
                'end' => 8289,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8282,
                  'end' => 8289,
                ),
                'value' => 'Product',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        20 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8294,
            'end' => 8310,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8294,
              'end' => 8301,
            ),
            'value' => 'contact',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8303,
              'end' => 8310,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8303,
                'end' => 8310,
              ),
              'value' => 'Contact',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        21 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8314,
            'end' => 8346,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8314,
              'end' => 8332,
            ),
            'value' => 'accountCheckLogged',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8334,
              'end' => 8346,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8334,
                'end' => 8346,
              ),
              'value' => 'LoggedResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        22 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8350,
            'end' => 8386,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8350,
              'end' => 8368,
            ),
            'value' => 'accountAddressList',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 8370,
              'end' => 8386,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 8371,
                'end' => 8385,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8371,
                  'end' => 8385,
                ),
                'value' => 'AccountAddress',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        23 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8390,
            'end' => 8432,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8390,
              'end' => 8404,
            ),
            'value' => 'accountAddress',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 8405,
                'end' => 8415,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 8405,
                  'end' => 8407,
                ),
                'value' => 'id',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 8409,
                  'end' => 8415,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 8409,
                    'end' => 8415,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8418,
              'end' => 8432,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8418,
                'end' => 8432,
              ),
              'value' => 'AccountAddress',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        24 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 8436,
            'end' => 8468,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 8436,
              'end' => 8448,
            ),
            'value' => 'checkoutLink',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 8450,
              'end' => 8468,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 8450,
                'end' => 8468,
              ),
              'value' => 'CheckoutLinkResult',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
  ),
);
