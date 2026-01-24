<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AutoTranslate extends Command
{
    protected $signature = 'translate:missing';
    protected $description = 'Genera las claves faltantes en los archivos de idioma (sin traducción automática)';

    public function handle()
    {
        $this->info('Buscando textos en las vistas...');

        $strings = $this->findTranslationKeys();
        $this->info('Se encontraron ' . count($strings) . ' cadenas.');

        // Idiomas que quieres gestionar
        $languages = ['es', 'fr', 'en'];

        foreach ($languages as $lang) {
            $this->processLanguage($lang, $strings);
        }

        $this->info('¡Listo! Revisa tus archivos en /lang y traduce los textos nuevos.');
    }

    private function findTranslationKeys()
    {
        $keys = [];
        $files = File::allFiles(resource_path('views'));

        foreach ($files as $file) {
            if (preg_match_all("/__\(['\"]([^'\"]+)['\"]\)/", $file->getContents(), $matches)) {
                foreach ($matches[1] as $match) {
                    $keys[] = $match;
                }
            }
        }
        return array_unique($keys);
    }

    private function processLanguage($lang, $allKeys)
    {
        // Asegurar que existe la carpeta lang
        if (!File::exists(lang_path())) {
            File::makeDirectory(lang_path());
        }

        $path = lang_path("$lang.json");

        $currentTranslations = File::exists($path)
            ? json_decode(File::get($path), true)
            : [];

        if (!$currentTranslations) $currentTranslations = [];

        $newCount = 0;

        foreach ($allKeys as $key) {
            if (!array_key_exists($key, $currentTranslations)) {
                // AQUÍ ESTÁ EL CAMBIO:
                // En lugar de traducir, ponemos el mismo texto original o un prefijo TODO
                if ($lang === 'en') {
                    $currentTranslations[$key] = $key;
                } else {
                    // Ponemos el texto original para que no rompa, pero tú lo editas luego
                    $currentTranslations[$key] = $key;
                }
                $newCount++;
            }
        }

        ksort($currentTranslations);
        File::put($path, json_encode($currentTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        if ($newCount > 0) {
            $this->info("[$lang] Se añadieron $newCount claves nuevas a $lang.json");
        }
    }
}
