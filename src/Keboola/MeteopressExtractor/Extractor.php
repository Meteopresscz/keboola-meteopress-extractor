<?php declare(strict_types = 1);

namespace Keboola\MeteopressExtractor;

use Keboola\Component\Manifest\ManifestManager;

class Extractor
{

    /**
     * @var ManifestManager
     */
    private $manifestManager;

    /**
     * Extractor constructor.
     *
     * @param ManifestManager $manifestManager
     */
    public function __construct(ManifestManager $manifestManager)
    {
        $this->manifestManager = $manifestManager;
    }

    /**
     * @param string $dataDir
     */
    public function extractFile(string $dataDir) : void
    {
        $data = file_get_contents('https://storage.googleapis.com/meteopressdatahub/public/heureka/synopy/synopy-cz-2018.csv');

        file_put_contents($dataDir . '/out/tables/data.csv.gz', $data);

        $this->manifestManager->writeTableManifest(
            $dataDir . '/out/tables/data.csv.gz',
            'out.c-meteopress.weather-data',
            ['datetime','station']
        );
    }

}
