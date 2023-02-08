<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifier
 */
/**
 * Smarty date_format modifier plugin
 * Type:     modifier
 * Name:     date_format
 * Purpose:  format datestamps via strftime
 * Input:
 *          - string: input date string
 *          - format: strftime format for output
 *          - default_date: default date if $string is empty
 *
 * @link   http://www.smarty.net/manual/en/language.modifier.date.format.php date_format (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 *
 * @param string $string       input date string
 * @param string $format       strftime format for output
 * @param string $default_date default date if $string is empty
 * @param string $formatter    either 'strftime' or 'auto'
 *
 * @return string |void
 * @uses   smarty_make_timestamp()
 */
function smarty_modifier_date_format(
    $string,
    $format = null,
    $default_date = '',
    $formatter = 'auto'
) {
    $phpDateFormat = $format;
    if ($format === null) {
        $phpDateFormat = Smarty::$_DATE_FORMAT;
    }
    /**
     * require_once the {@link shared.make_timestamp.php} plugin
     */
    static $is_loaded = false;
    if (!$is_loaded) {
        if (!is_callable('smarty_make_timestamp')) {
            include_once SMARTY_PLUGINS_DIR . 'shared.make_timestamp.php';
        }
        $is_loaded = true;
    }
    if (
      !empty($string)
      && $string !== '0000-00-00'
      && $string !== '0000-00-00 00:00:00'
    ) {
        $timestamp = smarty_make_timestamp($string);
    } elseif (!empty($default_date)) {
        $timestamp = smarty_make_timestamp($default_date);
    } else {
        return;
    }
    if (
        $formatter === 'strftime'
        || (
            $formatter === 'auto'
            && strpos($phpDateFormat, '%') !== false
        )
    ) {
        // if (Smarty::$_IS_WINDOWS) {
        //     $_win_from = array(
        //         '%D',
        //         '%h',
        //         '%n',
        //         '%r',
        //         '%R',
        //         '%t',
        //         '%T'
        //     );
        //     $_win_to = array(
        //         '%m/%d/%y',
        //         '%b',
        //         "\n",
        //         '%I:%M:%S %p',
        //         '%H:%M',
        //         "\t",
        //         '%H:%M:%S'
        //     );
        //     if (strpos($format, '%e') !== false) {
        //         $_win_from[] = '%e';
        //         $_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
        //     }
        //     if (strpos($format, '%l') !== false) {
        //         $_win_from[] = '%l';
        //         $_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
        //     }
        //     $format = str_replace($_win_from, $_win_to, $format);
        // }
        // return strftime($format, $timestamp);
        $phpDateFormat = strftime_format_to_date_format($phpDateFormat);
    }
    return date($phpDateFormat, $timestamp);
}

/**
 * Convert strftime format to php date format
 * @param $strftimeFormat
 * @return string|string[]
 * @throws Exception
 * @author User @relipse at https://stackoverflow.com/a/62781773/15494353
 */
function strftime_format_to_date_format($strftimeFormat) {
    $unsupportedFormats = ['%U', '%V', '%C', '%g', '%G'];
    $foundUnsupportedFormats = [];
    foreach ($unsupportedFormats as $unsupported) {
        if (strpos($strftimeFormat, $unsupported) !== false) {
            $foundUnsupportedFormats[] = $unsupported;
        }
    }
    if (!empty($foundUnsupportedFormats)) {
        throw new \Exception(
            "Found these unsupported chars: "
            . implode(",", $foundUnsupportedFormats)
            . ' in '
            . $strftimeFormat
        );
    }
    // It is important to note that some do not translate accurately
    // ie. lowercase L is supposed to convert to number with a preceding space
    // if it is under 10, there is no accurate conversion so we just use 'g'
    $phpDateFormat = str_replace(
        [
            '%a', '%A', '%d', '%e', '%u', '%w', '%W', '%b', '%h', '%B', '%m', '%y',
            '%Y', '%D',   '%F',    '%x',    '%n', '%t', '%H', '%k', '%I', '%l',
            '%M', '%p', '%P', '%r' /* %I:%M:%S %p */, '%R' /* %H:%M */, '%S',
            '%T' /* %H:%M:%S */, '%X',    '%z', '%Z',
            '%c',                                        '%s', '%%'
        ],
        [
            'D',  'l',  'd',  'j',  'N',  'w',  'W',  'M',  'M',  'F',  'm',  'y',
            'Y', 'm/d/y', 'Y-m-d', 'm/d/y', "\n", "\t", 'H',  'G',  'h',  'g',
            'i',  'A',  'a',  'h:i:s A',              'H:i',            's',
            'H:i:s',             'H:i:s', 'O',  'T',
            'D M j H:i:s Y' /*Tue Feb 5 00:45:10 2009*/, 'U',  '%'
        ],
        $strftimeFormat
    );
    return $phpDateFormat;
}
