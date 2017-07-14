<?php
namespace MH\MhAwsImageAnalyser\Override;

/***
 *
 * This file is part of an Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2017 Markus Hölzle <typo3@markus-hoelzle.de>
 *
 ***/

use MH\MhAwsImageAnalyser\Service\ImageAnalyserService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FileReference
 *
 * @author Markus Hölzle <typo3@markus-hoelzle.de>
 * @package MH\MhAwsImageAnalyser\Override
 */
class FileReference extends \TYPO3\CMS\Core\Resource\FileReference
{
    /**
     * Gets a property, falling back to values of the parent.
     *
     * @param string $key The property to be looked up
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getProperty($key)
    {
        $property = parent::getProperty($key);
        if ($key === 'alternative' && $property === '' && !empty($this->propertiesOfFileReference['tx_autofill_alternative'])) {
            /** @var ImageAnalyserService $imageAnalyserService */
            $imageAnalyserService = GeneralUtility::makeInstance(ImageAnalyserService::class);
            $property = $imageAnalyserService->getAnalysedImageKeywords($this->originalFile);
            $this->propertiesOfFileReference['alternative'] = $property;
            $this->mergedProperties['alternative'] = $property;
        }
        return $property;
    }
}
