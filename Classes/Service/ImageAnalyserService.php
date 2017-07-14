<?php
namespace MH\MhAwsImageAnalyser\Service;

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

use Aws\Rekognition\RekognitionClient;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ImageAnalyserService
 *
 * @author Markus Hölzle <typo3@markus-hoelzle.de>
 * @package MH\MhAwsImageAnalyser\Service
 */
class ImageAnalyserService implements SingletonInterface
{
    const EXTENSION_KEY = 'mh_aws_image_analyser';

    /**
     * @var RekognitionClient
     */
    protected $rekognitionClient = null;

    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * ImageAnalyserService constructor.
     */
    public function __construct()
    {
        $this->initializeConfiguration();
        $this->initializeRekognitionClient();
    }

    /**
     * @param File $file
     * @param int $minConfidence
     * @param string $separator
     * @return string
     */
    public function getAnalysedImageKeywords(File $file, $minConfidence = 50, $separator = ', ')
    {
        $keywords = [];
        $result = $this->rekognitionClient->detectLabels([
            'Image' => [
                'Bytes' => $file->getContents(),
            ],
        ]);

        foreach ($result->get('Labels') as $label) {
            if ($label['Confidence'] >= $minConfidence) {
                $keywords[] = $label['Name'];
            }
        }

        return implode($separator, $keywords);
    }

    /**
     * Initialize the AWS SDK client
     */
    protected function initializeRekognitionClient()
    {
        $arguments = &$this->configuration['AwsRekognitionClient.']['arguments.'];
        $this->rekognitionClient = GeneralUtility::makeInstance(
            RekognitionClient::class,
            [
                'version' => '2016-06-27',
                'region' => $arguments['region'],
                'credentials' => [
                    'key' => $arguments['credentials.']['key'],
                    'secret' => $arguments['credentials.']['secret'],
                ],
            ]
        );
    }

    /**
     * Initialize the extension configuration
     */
    protected function initializeConfiguration()
    {
        $this->configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][ImageAnalyserService::EXTENSION_KEY]);
    }
}
