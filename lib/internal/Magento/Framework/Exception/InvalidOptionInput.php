<?php
/**
 * InvalidOptionInput Exception
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Framework\Exception;

use Magento\Framework\Phrase;

/**
 * InvalidOptionInput exception
 *
 * @api
 */
class InvalidOptionInput extends LocalizedException
{
    /**
     * Default message
     */
    private const DEFAULT_MESSAGE =
        'The product\'s required option(s) weren\'t entered. Make sure the options are entered and try again.';

    /**
     * InvalidOptionInput constructor.
     *
     * @param \Magento\Framework\Phrase $phrase
     * @param \Exception|null $cause
     * @param int $code
     */
    public function __construct(Phrase $phrase = null, \Exception $cause = null, int $code = 0)
    {
        if ($phrase === null) {
            $phrase = new Phrase(__(self::DEFAULT_MESSAGE));
        }
        parent::__construct($phrase, $cause, $code);
    }

    /**
     * @param array $messages
     * @param array $extendedData
     * @param \Exception|null $cause
     *
     * @return \Magento\Framework\Exception\InvalidOptionInput
     */
    public static function getExtendedMessage(array $messages, array $extendedData, \Exception $cause = null)
    {
        foreach ($messages as $key => &$value) {
            // @codingStandardsIgnoreLine
            $value .= " Please check input data: Product SKU - '{$extendedData[$key]['sku']}', Option ID - '{$extendedData[$key]['optionId']}'";
        }

        return new self(
            new Phrase(
                __(implode("\n", $messages))
            ),
            $cause
        );
    }
}
