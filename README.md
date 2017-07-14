[![Packagist Release](https://img.shields.io/packagist/v/different-technology/mh-aws-image-analyser.svg)](https://packagist.org/packages/different-technology/mh-aws-image-analyser)
[![GitHub License](https://img.shields.io/github/license/different-technology/mh-aws-image-analyser.svg)](https://github.com/different-technology/mh-aws-image-analyser/blob/master/LICENSE.txt)

# TYPO3 Extension: Amazon AWS Image Analyser

TYPO3 extension to auto fill your 'alternative'-Tags of your images with Amazon Rekognition image detection.

Requires TYPO3 8.7 - 9.x


Issues:  [GitHub issue tracking: Amazon AWS Image Analyser](https://github.com/different-technology/mh-aws-image-analyser/issues)

Packagist: [different-technology/mh-aws-image-analyser](https://packagist.org/packages/different-technology/mh-aws-image-analyser)


## Installation

1.  Install the TYPO3 extension via composer

> Composer installation:
>
> ```bash
> composer require different-technology/mh-aws-image-analyser
> ```

2.  Install the extension in TYPO3 extension manager
3.  Configure in TYPO3 extension manager

## Configuration

### Driver Configuration

Add the following configurations:

-   Region: The region of the Amazon Web Service
-   Key and secret key of your AWS account

## Usage
If you add an image to a content element just activate the option: Auto fill "Alternative Text"
