<?php

return [
    'enabled' => env('SHAREPOINT_ENABLED', false),

    // Microsoft Graph / SharePoint connection
    'tenant_id' => env('SHAREPOINT_TENANT_ID'),
    'client_id' => env('SHAREPOINT_CLIENT_ID'),
    'client_secret' => env('SHAREPOINT_CLIENT_SECRET'),
    'site_id' => env('SHAREPOINT_SITE_ID'),

    // Path in SharePoint where files should be uploaded relative to the site drive root.
    // Do not include the document library name (Shared Documents / Documents) here.
    // Example: PatientReports
    'folder' => env('SHAREPOINT_FOLDER_PATH', 'PatientReports'),
];
