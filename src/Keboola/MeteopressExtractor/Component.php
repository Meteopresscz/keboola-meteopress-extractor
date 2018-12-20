<?php

namespace Keboola\MeteopressExtractor;

use Keboola\Component\BaseComponent;

class Component extends BaseComponent
{

    /**
     * @return string
     */
    protected function getConfigDefinitionClass(): string
    {
        return ConfigDefinition::class;
    }

    /**
     * @return Extractor
     */
    public function initExtractor(): Extractor
    {
        return new Extractor($this->getManifestManager());
    }

    /**
     *
     */
    public function run() : void
    {
        $extractor = $this->initExtractor();

        //$fileParameters = $this->getConfig()->getParameters();

        $extractor->extractFile($this->getDataDir());
    }

}
