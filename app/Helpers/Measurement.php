<?php

namespace App\Helpers;

use Cache;

class Measurement
{

    private $storage;

    public function __construct()
    {

        if (($this->storage = Cache::get('measurement')) == NULL) {

            $this->storage = (object)[

                'records' => [],
                'stats' => [

                    'avg' => 0,
                    'max' => 0,
                    'min' => 0,
                    'time-start' => date('c'),
                    'time-end' => date('c'),
                ]
            ];

            Cache::forever('measurement', $this->storage);
        }
    }

    public function stats()
    {

        return (array)$this->storage->stats;
    }

    public function update($data)
    {

        $record = [

            'value' => $data,
            'timestamp' => date('c'),
        ];

        $this->storage->records[] = $record;
        $this->calculate();

        Cache::forever('measurement', $this->storage);

        return $record;

    }

    protected function calculate()
    {

        $this->storage->stats['max'] = max(array_column($this->storage->records, 'value'));
        $this->storage->stats['min'] = min(array_column($this->storage->records, 'value'));
        $this->storage->stats['avg'] = array_sum(array_column($this->storage->records, 'value')) / count($this->storage->records);
        $this->storage->stats['time-start'] = min(array_column($this->storage->records, 'timestamp'));
        $this->storage->stats['time-end'] = max(array_column($this->storage->records, 'timestamp'));
    }

}