<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Public (patient facing) links
    |--------------------------------------------------------------------------
    |
    | Links that are sent to patients - registration, cosmetic registration,
    | remote parent signature, appointment messages and the deposit page - are
    | built from this domain together with a workspace prefix taken from the
    | role that owns the record, for example:
    |
    |   https://clinicalforms.net/minor-surgery/r/abc123
    |
    | Leave PUBLIC_LINKS_ENABLED unset/false until the domain resolves and has
    | an SSL certificate. While it is disabled every link keeps using the normal
    | application URL, so links that were already sent keep working.
    |
    */

    'enabled' => env('PUBLIC_LINKS_ENABLED', false),

    'domain' => env('PUBLIC_LINKS_DOMAIN', 'clinicalforms.net'),

    'scheme' => env('PUBLIC_LINKS_SCHEME', 'https'),

    /*
    | Optional domain per workspace, keyed by the lower case role name.
    | '*' is used for every role without its own entry.
    |
    |   'domains' => [
    |       'circumcision' => 'circumcisionclinic.net',
    |       '*'            => 'clinicalforms.net',
    |   ],
    |
    */
    'domains' => [
        // '*' => 'clinicalforms.net',
    ],

    /*
    | Optional path prefix per workspace, keyed by the lower case role name.
    | An empty string removes the prefix for that role. Roles without an entry
    | use the slug of their name (for example "Minor Surgery" => "minor-surgery").
    |
    |   'prefixes' => [
    |       'circumcision' => 'circumcision',
    |       'minor surgery' => 'minor-surgery',
    |   ],
    |
    */
    'prefixes' => [
        // 'circumcision' => 'circumcision',
    ],

    /*
    | Prefix used when the role cannot be resolved.
    | Null means "no prefix" for unknown roles and "slug of the role name" for
    | known ones. Set it only when you want one single prefix everywhere.
    */
    'default_prefix' => env('PUBLIC_LINKS_DEFAULT_PREFIX'),
];
