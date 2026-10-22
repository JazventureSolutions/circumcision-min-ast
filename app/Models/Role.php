<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'header_html', 'footer_html'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getHeaderLogoAttribute(): ?string
    {
        if (empty($this->header_html)) {
            return null;
        }

        $document = new \DOMDocument();
        $previousState = libxml_use_internal_errors(true);
        $document->loadHTML('<!doctype html><html><body>' . $this->header_html . '</body></html>');
        libxml_clear_errors();
        libxml_use_internal_errors($previousState);

        $images = $document->getElementsByTagName('img');
        if ($images->length === 0) {
            return null;
        }

        $source = trim($images->item(0)->getAttribute('src'));

        return $source !== '' ? $source : null;
    }
}
