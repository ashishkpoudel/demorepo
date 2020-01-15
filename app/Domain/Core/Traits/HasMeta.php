<?php

namespace App\Domain\Core\Traits;

trait HasMeta
{
    public function hasMeta($name)
    {
        return $this->metas->where('name', $name)->exists();
    }

    public function getMeta($name, $defaultValue = null)
    {
        return $this->load('metas')->metas->where('name', $name)->first()->value ?? $defaultValue;
    }

    public function addMetas(array $metas)
    {
        if (!count($metas)) {
            return $this;
        }

        $inserts = [];
        foreach ($metas as $name => $value) {
            array_push($inserts, [
               'name' => $name,
               'value' => $value
            ]);
        }

        $this->metas()->createMany($inserts);
        return $this;
    }

    public function updateMetas(array $metas)
    {
        if (!count($metas)) {
            return $this;
        }

        $this->deleteMetas(array_keys($metas))->addMetas($metas);
        return $this;
    }

    public function deleteMetas(array $metaNames)
    {
        if (!count($metaNames)) {
            return $this;
        }

        $this->metas()->whereIn('name', $metaNames)->delete();
        return $this;
    }
}
