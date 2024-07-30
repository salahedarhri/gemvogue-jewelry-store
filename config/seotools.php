<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'GemVogue', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Chez GemVogue, Nous proposons différents types de bijoux: Colliers, bracelets, boucles d'oreilles et bagues. Design classique au style moderne, nous avons quelque chose pour chacun.",
            'separator'    => ' | ',
            'keywords'     => ['gemvogue','GemVogue','gemvogue.fr','bijouterie','maroc','anneau','bague','collier','boucles','boutique','bijoux'],
            'canonical'    => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'GemVogue', // set false to total remove
            'description'  => "Chez GemVogue, Nous proposons différents types de bijoux: Colliers, bracelets, boucles d'oreilles et bagues. Design classique au style moderne, nous avons quelque chose pour chacun.",
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [ 
                public_path('images/composants/compressed/landing-redhead.png'),
                public_path('images/composants/landing-earrings.png'),
                public_path('images/composants/landing-necklace.png'),
                public_path('images/composants/landing-ring.png'),
            ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'GemVogue', // set false to total remove
            'description'  => "Chez GemVogue, Nous proposons différents types de bijoux: Colliers, bracelets, boucles d'oreilles et bagues. Design classique au style moderne, nous avons quelque chose pour chacun.",
            'url'         => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [                
                public_path('images/composants/compressed/landing-redhead.png'),
                public_path('images/composants/landing-earrings.png'),
                public_path('images/composants/landing-necklace.png'),
                public_path('images/composants/landing-ring.png'),
            ],
        ],
    ],
];
